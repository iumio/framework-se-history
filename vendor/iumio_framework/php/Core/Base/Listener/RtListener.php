<?php


namespace IumioFramework\Core\Base;

/**
 * Class RtListener
 * @package IumioFramework\Core\Base
 */

class RtListener implements Listener
{
    protected $routers;
    protected $appName;
    private $router = array();
    protected $partNameApp;

    /**
     * RtListener constructor.
     * @param string $appName
     */
    public function __construct(string $appName)
    {
        $this->appName = $appName;
    }

    /**
     * @return int
     */
    public function open():int
    {
        if ($this->listingRouters() == 0)
            return (0);

        $routingArray = array();

        foreach($this->routers as $file) {
            if(($router = fopen(ROOT."/apps/".$this->appName."/Routing/".$file, "r"))) {
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
                                array_push($this->router, array("routename" => $routename, "path" => $path, "controller" => $controller, "function" => $function . "Go"));
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
                            array_push($this->router, array("routename" => $routename, "path" => $path, "controller" => $controller, "function" => $function . "Go"));
                            $routename = NULL;
                            $method = NULL;
                        }
                    }

                }
            }
        }
        return (1);

    }

    /**
     * @return int
     */
    public function listingRouters():int
    {
        if ($this->appWording() == 1) {
            $this->routers = scandir(ROOT . "/apps/" . $this->appName . "/Routing");
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

    /**
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
    public function close(\Resource $oneRouter):int
    {
        fclose($oneRouter);
        return (1);
    }


}