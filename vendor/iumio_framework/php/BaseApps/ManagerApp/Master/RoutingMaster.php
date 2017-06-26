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


namespace ManagerApp\Master;
use iumioFramework\Core\Additionnal\Server\iumioServerManager;
use iumioFramework\Masters\iumioUltimaMaster as Master;
use iumioFramework\Core\Base\Json\JsonListener as JL;
use iumioFramework\Core\Base\Http\Response\Response;

/**
 * Class RoutingMaster
 * @package iumioFramework\Core\Manager
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class RoutingMaster extends Master
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
     * Get all routings
     * @return \stdClass $routing get all routing contains
     */
    public function getallRouting()
    {
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
                if (($router = fopen((ROOT . "/apps/") . $one->name . "/Routing/" . $file, "r"))) {
                    //if ($this->analyseRT($router, $file, $one->name) == 0) exit();
                    //rewind($router);
                    $rtarray = array("activity" => "", "path" => "", "name" => "");
                    $start = 0;
                    $end = 0;
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
                        } else if ($this->strlike_in_array($listen, array("activity", "path", "name")) !== false) {

                            $listen = explode(':', $listen);
                            $rtarray[$listen[0]] = $listen[1];
                        }

                        if ($start === 1 && $end === 1) {
                            $rtarray = array("method" => "", "path" => "", "name" => "");
                            $start = $end = 0;
                        }

                    }
                }
            }

            for ($i = 0; $i < count($routingArray); $i++) {

                $method = explode('%', $routingArray[$i]['activity']);
                    $controller = $method[0];
                    $function = $method[1];
                    $params = $this->detectParameters($routingArray[$i]['path']);

                    if (!empty($params))
                        array_push($rt, array($one->name => array("routename" => $routingArray[$i]['name'], "path" => $routingArray[$i]['path'], "controller" => $controller, "activity" => $function, "params" => $params)));
                    else
                        array_push($rt, array($one->name => array("routename" => $routingArray[$i]['name'], "path" => $routingArray[$i]['path'], "controller" => $controller, "activity" => $function)));

            }
        }

        return ($rt);
    }

    public function getallActivity()
    {
        print_r($this->getallRouting());
    }
}