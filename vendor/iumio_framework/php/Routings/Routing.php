<?php


namespace IumioFramework\Masters;
use IumioFramework\Core\Base\Debug\Debug;
use IumioFramework\Core\Base\RtListener;

/**
 * Class Routing
 * @package IumioFramework\Masters
 */

class Routing //extends RtListener
{
    private $registered;
    private $routes = array();

    /**
     * Register a router to Iumio Core
     */
    public function routingRegister():bool
    {

        $this->registered = "DefaultApp";
        $app = str_replace('App', '', $this->registered);
        $files = scandir(ROOT."/apps/".$this->registered."/Routing");
        $routingArray = array();

        foreach($files as $file) {
            if(($router = fopen(ROOT."/apps/".$this->registered."/Routing/".$file, "r"))) {
                while ($listen = fgets($router, 1024))
                {
                    $listen = preg_replace('/\s+/', '', $listen);
                    $listen = explode(':', $listen);
                    array_push($routingArray,$listen);
                }
            }
            fclose($router);
        }

        if (isset($routingArray[0][0]) && $routingArray[0][0] === "routingRegister")
        {
            if ($app == $routingArray[0][1])
            {
                //Debug::output("APP", 'display');
                $routename = NULL;
                $path = NULL;
                $method = NULL;

                for($i = 2; $i < count($routingArray); $i++)
                {
                    if (isset($routingArray[$i][1]) && $routingArray[$i][1] != NULL) {
                        //echo $i.'<br>';
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
                                array_push($this->routes, array("routename" => $routename, "path" => $path, "controller" => $controller, "function" => $function . "Go"));
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
                            array_push($this->routes, array("routename" => $routename, "path" => $path, "controller" => $controller, "function" => $function . "Go"));
                            $routename = NULL;
                            $method = NULL;
                        }
                    }

                }
            }
        }
        print_r($this->routes);
        return true;
    }


}

