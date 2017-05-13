<?php


namespace iumioFramework\Core\Base;
use iumioFramework\Core\Base\Debug\Debug;
use Resource;
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

    /**
     * RtListener constructor.
     * @param string $appName
     */
    public function __construct(string $appName)
    {
        $this->appName = $appName;
    }

    /** Open a file
     * @param bool $isbase Open routing for base app
     * @return int Is success
     */
    public function open(bool $isbase = false):int
    {
        if ($this->listingRouters($isbase) == 0)
            return (0);

        $routingArray = array();

        foreach($this->routers as $file) {
            if(($router = fopen(((!$isbase)? ROOT."/apps/" : BASE_APPS).$this->appName."/Routing/".$file, "r"))) {
                while ($listen = fgets($router, 1024))
                {
                    $listen = preg_replace('/\s+/', '', $listen);
                    $listen = explode(':', $listen);
                    array_push($routingArray, $listen);
                }
            }
            $this->close($router);
        }

        if (isset($routingArray[0][0]) && $routingArray[0][0] === "routingRegister")
        {
            if ($this->appName == $routingArray[0][1])
            {
                $routename = NULL;
                $path = NULL;
                $method = NULL;

                for($i = 2; $i < count($routingArray); $i++)
                {
                    if (isset($routingArray[$i][1]) && $routingArray[$i][1] != NULL) {
                        if (isset($routingArray[$i][0]) && $routingArray[$i][0] == "name")
                            $routename = $routingArray[$i][1];
                        else if (isset($routingArray[$i][0]) && $routingArray[$i][0] == "method")
                            $method = $routingArray[$i][1];
                        else if (isset($routingArray[$i][0]) && $routingArray[$i][0] == "path")
                            $path = $routingArray[$i][1];
                    }
                    else
                    {
                        if ($method != '' || $method == NULL) {
                            $method = explode('%', $method);
                            if (count($method) == 2) {
                                $controller = $method[0];
                                $function = $method[1];
                                $params = $this->detectParameters($path);
                                if (!empty($params))
                                    array_push($this->router, array("routename" => $routename, "path" => $path, "controller" => $controller, "method" => $function . "Activity", "params" => $params));
                                else
                                    array_push($this->router, array("routename" => $routename, "path" => $path, "controller" => $controller, "method" => $function . "Activity"));
                            }
                        }
                        $routename = NULL;
                        $method = NULL;
                    }

                    if (($i + 1) === count($routingArray) && ($method != '' || $method == NULL)) {
                        $method = explode('%', $method);
                        if (count($method) == 2) {
                            $controller = $method[0];
                            $function = $method[1];
                            $params = $this->detectParameters($path);
                            if (!empty($params))
                                array_push($this->router, array("routename" => $routename, "path" => $path, "controller" => $controller, "method" => $function . "Activity", "params" => $params));
                            else
                                array_push($this->router, array("routename" => $routename, "path" => $path, "controller" => $controller, "method" => $function . "Activity"));
                            $routename = NULL;
                            $method = NULL;
                        }
                    }

                }
            }
        }
        return (1);

    }


    /** Return router list
     * @param bool $isbase Is a base app
     * @return int Is a successs
     */
    public function listingRouters(bool $isbase = false):int
    {
        if ($this->appWording() == 1) {
            $this->routers = scandir(((!$isbase)? ROOT . "/apps/" : BASE_APPS) . $this->appName . "/Routing");
            return (1);
        }
        return (0);
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