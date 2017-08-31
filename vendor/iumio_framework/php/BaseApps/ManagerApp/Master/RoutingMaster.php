<?php

/*
 * This is an iumio Framework component
 *
 * (c) RAFINA DANY <danyrafina@gmail.com>
 *
 * iumio Framework - iumio Components
 *
 * To get more information about licence, please check the licence file
 */


namespace ManagerApp\Masters;
use iumioFramework\Core\Additionnal\Server\iumioServerManager;
use iumioFramework\Exception\Server\Server500;
use iumioFramework\HttpRoutes\JsRouting;
use iumioFramework\Masters\MasterCore;
use iumioFramework\Core\Base\Json\JsonListener as JL;
use iumioFramework\Core\Base\Http\Response\Response;

/**
 * Class RoutingMaster
 * @package iumioFramework\Core\Manager
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class RoutingMaster extends MasterCore
{

    private $methodsReq = array("GET", "PUT", "DELETE", "POST",
        "PATH", "ALL", "OPTIONS", "TRACE", "HEAD", "CONNECT");
    private $keywords = array("name", "path", "activity", "m_allow", "route", "endroute", "visibility");
    /**
     * Going to app manager
     */
    public function routingActivity()
    {
        return ($this->render("routingmanager", array("selected" => "routingmanager")));
    }

    /**
     * A version of in_array() that does a sub string match on $needle
     *
     * @param  mixed   $needle    The searched value
     * @param  array   $haystack  The array to search in
     * @return bool False for unknown value or the value is founded
     */

    private function strlike_in_array($needle, array $haystack):bool
    {
        foreach ($haystack as $one => $value)
        {
            if (preg_match("/$value/", $needle) === 1)
                return (true);
        }
        return (false);
    }

    /** Detect any parameters in path
     * @param string $path URI path
     * @return array All parameters
     */
    private function detectParameters(string $path):array
    {
        $params = array();

        for ($i = 0; $i < strlen($path); $i++)
        {
            if ($path[$i] == "{")
            {
                $param = "";
                for(($p = $i + 1); $p < strlen($path); $p++)
                {
                    if ($path[$p] == "}") {
                        $p = strlen($path);
                        array_push($params, $param);
                    }
                    else
                        $param = $param.$path[$p];
                }
            }
        }
        return ($params);
    }

    /** Get routing statistics
     * @return array Routing statistics
     */
    public function getStatisticsRouting():array
    {

        $f = $this->getallRouting();
        $fc = 0;
        $fdisabled = 0;
        $fpublic = 0;

        foreach ($f as $one)
        {
            $fc += $one['count_route'];
            $z = $this-> getRtContent($one['name'], $one['app']);
            foreach ($z as $two)
            {
                if ($two['visibility'] == "disabled")
                    $fdisabled++;
                else if ($two['visibility'] == "public")
                    $fpublic++;
            }
        }

        return (array("number" => $fc, "disabled" => $fdisabled, "public" => $fpublic));
    }

    /**
     * @param string $filename
     * @param string $appname
     * @return array
     */
    public function getRtContent(string $filename, string $appname):array
    {
        $scope = NULL;
        $routingArray = array();
        $pattern = '/\s*/m';
        $replace = '';
        $rt = array();
        $prefix = "";

        if (($router = fopen((ROOT . "/apps/") . $appname . "/Routing/" . $filename, "r"))) {
            $appc = $this->getMaster("Apps");
            $apps = $appc->getAllApps();
            foreach ($apps as $o)
            {
                if ($o->name === $appname)
                    $prefix = $o->prefix;
            }

            $rtarray = array("activity" => "", "path" => "", "name" => "", "visibility" => "private", "m_allow" => "ALL");
            $start = 0;
            $end = 0;
            $croute = 0;
            while ($listen = fgets($router, 1024)) {
                $listen = preg_replace($pattern, $replace, $listen);

                if ($listen === "")
                    continue;
                if ($listen === "route:" && $start == 0 && $end === 0) {
                    $start = 1;
                    continue;
                } else if ($listen === "endroute" && $start === 1 & $end === 0) {
                    $end = 1;
                    array_push($routingArray, $rtarray);
                }

                else if ($this->strlike_in_array(trim($listen), $this->keywords))
                {
                    $listen = explode(':', $listen);
                    if (!in_array($listen[0], $this->keywords))
                        new Server500(new \ArrayObject(array("explain" =>
                            "Unknown keyword '$listen[0]' in $filename : ".$appname,
                            "solution" => "Please add the correct keyword : ".json_encode($this->keywords))));
                    $rtarray[$listen[0]] = $listen[1];
                }
                if ($start === 1 && $end === 1) {
                    $rtarray = array("activity" => "", "path" => "", "name" => "", "visibility" => "private", "m_allow" => "ALL");
                    $start = $end = 0;
                    $croute++;
                }

            }
        }

        for ($i = 0; $i < count($routingArray); $i++) {

            $method = explode('%', $routingArray[$i]['activity']);
            $controller = $method[0];
            $function = $method[1];
            $params = $this->detectParameters($routingArray[$i]['path']);

            $route_gen = "";

           if (empty($params))
             $route_gen = $this->generateRoute($routingArray[$i]['name'], null, $appname);

            if (!empty($params))
                array_push($rt, array("routename" =>  $routingArray[$i]['name'], "path" => $routingArray[$i]['path'], "controller" => $controller, "method" => $function . "Activity", "visibility" => $routingArray[$i]['visibility'], "params" => $params, "m_allow" => $this->methodAllowedTransform($routingArray[$i]['m_allow'])));
            else
                array_push($rt, array("routename" =>  $routingArray[$i]['name'], "path" =>  $routingArray[$i]['path'], "controller" => $controller, "method" => $function . "Activity", "route_gen" => $route_gen, "visibility" => $routingArray[$i]['visibility'], "m_allow" => $this->methodAllowedTransform($routingArray[$i]['m_allow'])));


        }
        return ($rt);
    }


    /**
     * Transform method allowed argument to array
     * @param string $methods Method allowed
     * @return array Method allowed array format
     * @throws Server500
     */
    private function methodAllowedTransform(string $methods):array
    {
        if (is_string($methods) || $this->IS_JSON_RT_FORMAT($methods))
        {
            switch ($methods)
            {
                case $this->IS_JSON_RT_FORMAT($methods) == 1:
                    $r = $this->TRS_JSON_RT_TO_ARRAY($methods);
                    foreach ($r as $one) {
                        if ($this->checkMethodExist($one)) continue;
                    }
                    return ($r);
                    break;
                case is_string($methods):
                    if ($this->checkMethodExist($methods))
                        return (array($methods));
                    break;
                default :
                     new Server500(new \ArrayObject(
                        array("explain" => "Invalid format for Allowed methods request (m_allow)",
                            "solution" => "Please check the 'm_allow' tag format")));
            }
        }
        else
             new Server500(new \ArrayObject(
                array("explain" => "Invalid format for Allowed methods request (m_allow)",
                    "solution" => "Please check the 'm_allow' tag format")));
        return (array());
    }



    /**
     * Check if request method exist
     * @param string $method Method request
     * @return int If method exist
     * @throws Server500
     */
    private function checkMethodExist(string $method):int
    {
        if (in_array($method, $this->methodsReq)) return (1);
        else
             new Server500(new \ArrayObject(array("explain" => "Unknown method $method for Allowed method request",
                "solution" => "Allowed methods request must be ".json_encode($this->methodsReq))));
    }

    /** Check if string is a JSON RT
     * @param string $string string methods request
     * @return int If it's a json rt or not
     */
    private function IS_JSON_RT_FORMAT(string $string):int
    {
        $len =  strlen($string);

        if ($len > 3 && ($string[0] == "{" && $string[$len - 1] == "}"))
        {
            $string = str_replace("{", "", $string);
            $string = str_replace("}", "", $string);
            $r = explode(',', $string);
            return (!in_array(" ", $r))? 1 : 0;
        }
        return (0);
    }


    /** Transform JSON RT Format to array
     * @param string $string string methods request
     * @return array Array contains allowed methods
     */
    private function TRS_JSON_RT_TO_ARRAY(string $string):array
    {
        $len =  strlen($string);

        if ($len > 3 && ($string[0] == "{" && $string[$len - 1] == "}"))
        {
            $string = str_replace("{", "", $string);
            $string = str_replace("}", "", $string);
            $r = explode(',', $string);
            return (!in_array(" ", $r))? $r : array();
        }
        return (array());
    }


    /**
     * Get all routings
     * @return array $routing get all routing contains
     */
    public function getallRouting():array
    {
        $routings = array();
        $appc = $this->getMaster("Apps");
        $apps = $appc->getAllApps();

        $routingArray = array();
        $pattern = '/\s*/m';
        $replace = '';
        $rt = array();

        foreach ($apps as $one) {
            $routers = scandir(ROOT . "/apps/" . $one->name . "/Routing");
            foreach ($routers as $file) {
                $scope = NULL;
                if ($file == "." || $file == "..")
                    continue;
                if (($router = fopen((ROOT . "/apps/") . $one->name . "/Routing/" . $file, "r"))) {

                    $rtarray = array("activity" => "", "path" => "", "name" => "");
                    $start = 0;
                    $end = 0;
                    $croute = 0;
                    while ($listen = fgets($router, 1024)) {

                        $listen = preg_replace($pattern, $replace, $listen);

                        if ($listen === "")
                            continue;
                        if ($listen === "route:" && $start == 0 && $end === 0) {
                            $start = 1;
                            continue;
                        } else if ($listen === "endroute" && $start === 1 & $end === 0) {
                            $end = 1;
                            array_push($routingArray, $rtarray);
                        } else if (($this->strlike_in_array($listen, array("activity", "path", "name")) !== false) ||
                            ($this->strlike_in_array($listen, array("activity", "path", "name", "visibility")) !== false)) {

                            $listen = explode(':', $listen);
                            $rtarray[$listen[0]] = $listen[1];
                        }

                        if ($start === 1 && $end === 1) {
                            $rtarray = array("method" => "", "path" => "", "name" => "", "visibility" => "private");
                            $start = $end = 0;
                            $croute++;
                        }

                    }
                    $view = $this->generateRoute('iumio_manager_routing_manager_get_one', array("filename" => $file, "appname" => $one->name));
                    $remove = $this->generateRoute('iumio_manager_routing_manager_remove_one', array("filename" => $file, "appname" => $one->name));
                    array_push($routings, array("name" => $file, "count_route" => $croute, "app" => $one->name, 'view' => $view, 'remove' => $remove));

                }
            }
        }

        return ($routings);
    }

    /**
     * @return int
     */
    public function getallActivity()
    {

        return ((new Response())->JSON_RENDER(array("code" => 200, "msg" => "OK", "results" => $this->getallRouting())));
    }

    /**
     * @param string $filename
     * @param string $appname
     * @return int
     */
    public function removeActivity(string $filename, string $appname)
    {
        iumioServerManager::delete(ROOT."/apps/$appname/Routing/$filename", "file");
        return ((new Response())->JSON_RENDER(array("code" => 200, "msg" => "OK")));
    }

    /** Rebuild Js routing file
     * @return int
     */
    public function rebuildjsActivity()
    {
        $rt = new JsRouting();
        $rt->build();
        return ((new Response())->JSON_RENDER(array("code" => 200, "msg" => "OK")));
    }

    /**
     * @param string $filename
     * @param string $appname
     * @return int
     */
    public function getOneActivity(string $filename, string $appname)
    {
        return ((new Response())->JSON_RENDER(array("code" => 200, "msg" => "OK", "results" => $this->getRtContent($filename, $appname))));
    }

}