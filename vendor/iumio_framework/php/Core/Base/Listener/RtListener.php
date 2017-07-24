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

namespace iumioFramework\Core\Base;

use iumioFramework\Core\Base\Debug\Debug;
use iumioFramework\Exception\Server\Server500;

/**
 * Class RtListener
 * @package iumioFramework\Core\Base
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class RtListener implements Listener
{
    protected $routers;
    protected $appName;
    protected $router = array();
    protected $partNameApp;
    private $prefix;

    /**
     * RtListener constructor.
     * @param string
     * @param string $prefix
     */
    public function __construct(string $appName, $prefix)
    {
        $this->appName = $appName;
        $this->prefix = $prefix;
    }

    /** Open a file
     * @param bool $isbase pen routing for base app
     * @return int Is success
     * @throws Server500
     */

    public function open(bool $isbase = false):int
    {
        if ($this->listingRouters($isbase) == 0)
            return (0);

        $routingArray = array();
        $pattern = '/\s*/m';
        $replace = '';

        foreach ($this->routers as $file) {
            $scope = NULL;
            if (($router = fopen(((!$isbase) ? ROOT . "/apps/" : BASE_APPS) . $this->appName . "/Routing/" . $file, "r"))) {
                if ($this->analyseRT($router, $file, $this->appName) == 0) exit();
                rewind($router);
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
                        if ($this->checkIfKeyExist($rtarray, $file, $this->appName) != 1) exit();
                        $rtarray = array("method" => "", "path" => "", "name" => "");
                        $start = $end = 0;
                    }

                }
                $this->close($router);
            }
        }

        for ($i = 0; $i < count($routingArray); $i++) {

            $routingArray[$i]['path'] = (($this->prefix == null || $this->prefix == "") ? "" : "/".$this->prefix) . $routingArray[$i]['path'];

            $method = explode('%', $routingArray[$i]['activity']);
            if (count($method) == 2) {
                $controller = $method[0];
                $function = $method[1];
                $params = $this->detectParameters($routingArray[$i]['path']);
                try
                {
                    $reflect = new \ReflectionClass("\\".$this->appName."\\Master\\".$controller."Master");
                }
                catch (\ReflectionException $e)
                {
                    throw new  Server500(new \ArrayObject(array("explain" => "Cannot instanciate "."\\".$this->appName."\\Master\\".$controller."Master => ".$e->getMessage(), "solution" => "Please check your master configuration : ")));
                }

                if (!method_exists($reflect->newInstance(), $function."Activity") || !is_callable(array($reflect->newInstance(), $function."Activity")))
                    throw new Server500(new \ArrayObject(array("explain" => "Activity is not callable : '".$controller.":".$function."Activity"."' : ".$this->appName, "solution" => "Please check your controller activity")));
                if (!empty($params))
                    array_push($this->router, array("routename" =>  $routingArray[$i]['name'], "path" => $routingArray[$i]['path'], "controller" => $controller, "method" => $function . "Activity", "params" => $params));
                else
                    array_push($this->router, array("routename" =>  $routingArray[$i]['name'], "path" =>  $routingArray[$i]['path'], "controller" => $controller, "method" => $function . "Activity"));
            }
            else
                throw new  Server500(new \ArrayObject(array("explain" => "Missing delimiter '%' to detect Activity' for  ".strtoupper($routingArray[$i]['name'])." route : ".$this->appName, "solution" => "Please add the correct delimiter")));
        }

        return (1);
    }




    private function checkIfKeyExist(array $resource, string $filename, string $appname):int
    {
        if (!isset($resource["activity"]))
            throw new  Server500(new \ArrayObject(array("explain" => "Missing Tag 'activity' in ".strtoupper($filename)." routing file : ".$appname, "solution" => "Please add this tag")));
        if (!isset($resource["name"]))
            throw new  Server500(new \ArrayObject(array("explain" => "Missing Tag 'name' in ".strtoupper($filename)." routing file : ".$appname, "solution" => "Please add this tag")));
        if (!isset($resource["path"]))
            throw new  Server500(new \ArrayObject(array("explain" => "Missing Tag 'path' in ".strtoupper($filename)." routing file : ".$appname, "solution" => "Please add this tag")));

        if ($resource["name"] == "")
            throw new  Server500(new \ArrayObject(array("explain" => "Empty Tag 'name' in ".strtoupper($filename)." routing file : ".$appname, "solution" => "Check contain of this tag")));
        if ($resource["activity"] == "")
            throw new  Server500(new \ArrayObject(array("explain" => "Empty Tag 'activity' in ".strtoupper($filename)." routing file : ".$appname, "solution" => "Check contain of this tag")));
        if ($resource["path"] == "")
            throw new  Server500(new \ArrayObject(array("explain" => "Empty Tag 'path' in ".strtoupper($filename)." routing file : ".$appname, "solution" => "Check contain of this tag")));
        return (1);
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


    /** Return router list
     * @param bool $isbase Is a base app
     * @return int Is a successs
     */
    public function listingRouters(bool $isbase = false):int
    {
        if ($this->appWording() == 1) {
            $this->routers = scandir((($isbase == false)? ROOT . "/apps/" : BASE_APPS) . $this->appName . "/Routing");
            return (1);
        }
        return (0);
    }

    /** Analyse RT file to detect some errors
     * @param resource $file File resource
     * @param string $filename File name
     * @param string $appname App name
     * @return int If file have no error
     * @throws Server500 If file resource have some errors
     */
    protected function analyseRT($file, string $filename, string $appname):int
    {
        $start = 0;
        $end = 0;
        while ($listen = trim(fgets($file, 1024)))
        {
            if ($listen == "route:" || $listen == "route :") $start++;
            if ($listen == "endroute") $end++;
        }
        if ($start != $end)
        {
            if ($start < $end)
                throw new Server500(new \ArrayObject(array("explain" => "Missing tag 'route' in ".$filename. " Routing file : ".$appname , "solution" => "Please check your RT file")));
            if ($end < $start)
                throw new Server500(new \ArrayObject(array("explain" => "Missing tag 'endroute' in ".$filename. " Routing file : ".$appname, "solution" => "Please check your RT file")));
            return (0);
        }
        return (1);
    }

    /**
     * @return int
     */
    protected function appWording():int
    {
        $an = $this->appName;
        $end = substr($an, -3);
        if ($end === "App") {
            $this->partNameApp = str_replace('App', '', $this->appName);
            return (1);
        }
        return (0);
    }

    /** Render router
     * @return array
     */
    public function render():array
    {
        return $this->router;
    }

    /**
     * @param Resource $oneRouter
     * @return int
     */
    public function close($oneRouter):int
    {
        fclose($oneRouter);
        return (1);
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

}