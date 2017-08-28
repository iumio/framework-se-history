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
     * @return mixed
     */

    private function strlike_in_array($needle, array $haystack)
    {
        foreach ($haystack as $one => $value)
        {
            if (strpos($value, $needle) !== false)
            {
                return ($value);
            }
        }
        return (null);
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

            $rtarray = array("activity" => "", "path" => "", "name" => "", "visibility" => "private");
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
                } else if (($this->strlike_in_array($listen, array("activity", "path", "name", "visibility")) !== false) ||
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
                array_push($rt, array($appname => array("routename" => $routingArray[$i]['name'], "path" => $routingArray[$i]['path'], "controller" => $controller, "activity" => $function, "params" => $params, "visibility" => $routingArray[$i]['visibility'])));
            else
                array_push($rt, array($appname => array("routename" => $routingArray[$i]['name'], "path" => $routingArray[$i]['path'], "controller" => $controller, "activity" => $function, "route_gen" => $route_gen, "visibility" => $routingArray[$i]['visibility'])));

        }
        return ($rt);
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