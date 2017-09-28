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
use function PHPSTORM_META\type;

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
     * @var array $methodsReq Methods allowed for HTTP Communications
     */
    private $methodsReq = array("GET", "PUT", "DELETE", "POST",
        "PATH", "ALL", "OPTIONS", "TRACE", "HEAD", "CONNECT");
    /**
     * @var array $keywords Keywords allowed in RT
     */
    private $keywords = array("name", "path", "activity", "m_allow", "route", "endroute", "visibility", "parameters");

    /**
     * @var array $scalar The scalar type for parameters
     */
    protected $scalar = array("string", "bool", "int", "float");

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
                $rtarray = array("activity" => "", "path" => "", "name" => "", "visibility" => "private", "m_allow" => "ALL", "r_parameters" => array());
                $start = 0;
                $end = 0;
                while ($listen = fgets($router, 1024)) {

                    $listen = preg_replace($pattern, $replace, $listen);

                    if ($listen === "")
                        continue;
                    if ($listen === "route:" && $start == 0 && $end === 0)
                    {
                        $start = 1;
                        continue;
                    }
                    else if ($listen === "endroute" && $start === 1 & $end === 0) {
                        $end = 1;
                        array_push($routingArray, $rtarray);
                    }
                    else if ($this->strlike_in_array(trim($listen), $this->keywords))
                    {
                        $exline = $listen;
                        $listen = explode(':', $listen);
                        if (!in_array($listen[0], $this->keywords))
                            throw new Server500(new \ArrayObject(array("explain" =>
                                "Unknown keyword '$listen[0]' in $file : ".$this->appName,
                                "solution" => "Please add the correct keyword : ".json_encode($this->keywords))));
                       if (count($listen) > 1)
                           $rtarray['r_parameters'] = $this->detectParametersType($exline, $listen[0]);
                        $rtarray[$listen[0]] = $listen[1];
                    }
                    if ($start === 1 && $end === 1) {
                        if ($this->checkIfKeyExist($rtarray, $file, $this->appName) != 1) exit();
                        $rtarray = array("method" => "", "path" => "", "name" => "", "visibility" => "private", "m_allow" => "ALL", "r_parameters" => array());
                        $start = $end = 0;
                    }

                }
                $this->close($router);
            }
        }

        for ($i = 0; $i < count($routingArray); $i++) {

            $routingArray[$i]['path'] = (($this->prefix == null || $this->prefix == "") ? "" : $this->prefix) . $routingArray[$i]['path'];

            $method = explode('%', $routingArray[$i]['activity']);
            if (count($method) == 2) {
                $controller = $method[0];
                $function = $method[1];
                $params = $this->detectParameters($routingArray[$i]['path']);
                try
                {
                    $reflect = new \ReflectionClass("\\".$this->appName."\\Masters\\".$controller."Master");
                }
                catch (\ReflectionException $e)
                {
                    throw new  Server500(new \ArrayObject(array("explain" => "Cannot instanciate "."\\".$this->appName."\\Masters\\".$controller."Master => ".$e->getMessage(), "solution" => "Please check your master configuration : ")));
                }

                if (!method_exists($reflect->newInstance(), $function."Activity") || !is_callable(array($reflect->newInstance(), $function."Activity")))
                    throw new Server500(new \ArrayObject(array("explain" => "Activity is not callable : '".$controller.":".$function."Activity"."' : ".$this->appName, "solution" => "Please check your controller activity")));
                if (!empty($params))
                    array_push($this->router, array("routename" =>  $routingArray[$i]['name'], "path" => $routingArray[$i]['path'], "controller" => $controller, "method" => $function . "Activity", "visibility" => $routingArray[$i]['visibility'], "params" => $params, "m_allow" => $this->methodAllowedTransform($routingArray[$i]['m_allow']), "r_parameters" => $routingArray[$i]['r_parameters']));
                else
                    array_push($this->router, array("routename" =>  $routingArray[$i]['name'], "path" =>  $routingArray[$i]['path'], "controller" => $controller, "method" => $function . "Activity", "visibility" => $routingArray[$i]['visibility'], "m_allow" => $this->methodAllowedTransform($routingArray[$i]['m_allow']), "r_parameters" => $routingArray[$i]['r_parameters']));
            }
            else
                throw new Server500(new \ArrayObject(array("explain" => "Missing delimiter '%' to detect Activity' for  ".strtoupper($routingArray[$i]['name'])." route : ".$this->appName, "solution" => "Please add the correct delimiter")));
        }

        return (1);
    }

    /**
     * Detect parameters type for a specific route
     * @param string $parameters Line this parameters contains
     * @param string $keyword_ft keyword for instruction : Check if parameters
     * @return array Return the parameters formatted
     * @throws Server500 If a delimiter is missing
     */
    private function detectParametersType(string $parameters, string $keyword_ft):array
    {
        if ($keyword_ft != "parameters")
            return (array());
        $parameters = str_replace("parameters:", "", $parameters);
        if (!(isset($parameters[0]) && $parameters[0] == "{"))
            throw new Server500(new \ArrayObject(array("explain" => "Delimiter '{' is missing for parameters keyword",
                "solution" => "Please check RT file")));
        if (!(isset($parameters[strlen($parameters) - 1 ]) && $parameters[strlen($parameters) - 1] == "}"))
            throw new Server500(new \ArrayObject(array("explain" => "Delimiter '}' is missing for parameters keyword",
                "solution" => "Please check RT file")));

        $parameters[strlen($parameters) - 1] = $parameters[0] = "" ;
        $e = explode(',', $parameters);

        $param = $this->splitParameters($e);
        if (count($param) == 0)
            throw new Server500(new \ArrayObject(array("explain" => "Unknow error on parameters in RT file",
                "solution" => "Please check RT file")));
        return ($param);
    }

    /**
     * Split required parameters to have the parameters name and parameters type in array
     * array (paramName => paramType)
     * @param array $params Parameters required
     * @return array Parameters formatted
     * @throws Server500 If delimiter ':' does not exist
     */
    private final function splitParameters(array $params):array
    {
        $a = array();
        foreach ($params as $one)
        {
            if (strpos($one, ":") !== FALSE)
            {
                $u = explode(":", $one);
                if (count ($u) < 2)
                    throw new Server500(new \ArrayObject(array("explain" => "Delimiter ':' is missing ",
                        "solution" => "Please check RT file")));
                $this->checkScalarValue($u[1]);
                array_push($a, $u);
            }
            else
                throw new Server500(new \ArrayObject(array("explain" => "Delimiter ':' is missing ",
                    "solution" => "Please check RT file")));
        }
        return ($a);
    }

    /**
     * Check if the scalar type exist in RT
     * @param string $scalar Scalar type
     * @return bool The result of test
     * @throws Server500 If the scalar does not exist
     */
    private final function checkScalarValue(string $scalar):bool
    {
        if ($this->strlike_in_array($scalar, $this->scalar) !== FALSE)
            return (true);
        else
            throw new Server500(new \ArrayObject(array("explain" => "Unknow type $scalar in RT",
                "solution" => "Type must be : ".json_encode($this->scalar))));
        return (false);
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
                    throw new Server500(new \ArrayObject(
                        array("explain" => "Invalid format for Allowed methods request (m_allow)",
                            "solution" => "Please check the 'm_allow' tag format")));
            }
        }
        else
            throw new Server500(new \ArrayObject(
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
            throw new Server500(new \ArrayObject(array("explain" => "Unknown method $method for Allowed method request",
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

    /** Check if key exist
     * @param array $resource Resource array
     * @param string $filename File name
     * @param string $appname App name
     * @return int Return if all keys existed
     * @throws Server500 If a key not exist
     */
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

        if (isset($resource["visibility"]) && !in_array($resource["visibility"], array("public", "private", "disabled")))
            throw new  Server500(new \ArrayObject(array("explain" => "Tag 'visibility' is empty or parameter for 'visibility' is not recognized in ".strtoupper($filename)." routing file - ".$appname, "solution" => "Check contain of this tag (Visibility must be private, public or disabled)")));

        return (1);
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

    protected final function scalarTest(string $value, string $type):bool
    {
        switch ($type)
        {
            case "int":
                return (is_numeric($value));
                break;
            case "bool":
                return (is_bool($value));
                break;
            case "float":
                return (is_float($value));
                break;
            case "string":
                return (is_string($value));
                break;
        }
        throw new Server500(new \ArrayObject(array("explain" =>
            "Undefined scalar type $type", "solution"
        => "Please check your RT file")));
    }

    protected final function scalarConvert(string $value, string $type)
    {
        switch ($type)
        {
            case "int":
                return ((int)($value));
                break;
            case "bool":
                return ((bool)($value));
                break;
            case "float":
                return ((float)($value));
                break;
            case "string":
                return ((string)($value));
                break;
        }
        throw new Server500(new \ArrayObject(array("explain" =>
            "Undefined scalar type $type", "solution"
        => "Please check your RT file")));
    }
}