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

namespace iumioFramework\Masters;
use iumioFramework\HttpRoutes\Routing;
use iumioFramework\Core\Base\Http\ParameterRequest;
use iumioFramework\Core\Additionnal\Template\iumioSmarty;
use iumioFramework\Core\Base\iumioEnvironment;
use iumioFramework\Core\Requirement\{iumioCore, FrameworkServices\GlobalCoreService};
use iumioFramework\Core\Base\Database\iumioDatabaseAccess as IDA;
use iumioFramework\Exception\Server\{Server500, Server404};
use iumioFramework\Core\Base\Http\Session\iumioSession;
use iumioFramework\Core\Base\Json\JsonListener as JL;

/**
 * Class MasterCore
 * This is the parent master for all subclass
 * @package iumioFramework\Masters
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class MasterCore extends GlobalCoreService
{
    protected $masterFirst = NULL;
    protected $appMastering = NULL;


    /**
     * MasterCore constructor.
     */
    public function __construct()
    {
        self::setAppMaster($this);
    }

    /** Get a service
     * @param string $service
     * @return mixed
     */
    protected function get(string $service)
    {
        switch ($service)
        {
            case 'request':
                return (iumioCore::getRuntimeParameters())->request;
                break;
            case 'query':
                return (iumioCore::getRuntimeParameters())->query;
                break;
            case 'session':
                return (new iumioSession());
                break;
        }
        return (NULL);
    }

    /** Show a view
     * @param string $view View name
     * @param array $options options to view
     */
    final protected function render(string $view, array $options = array())
    {
        $this->appMastering = APP_CALL;
        $si = iumioSmarty::getSmartyInstance($this->appMastering);
        $si->assign($options);
        $si->display($view . iumioSmarty::$viewExtention);
    }



    /** Change views Render extension
     * @param string $ext new extention
     * @return bool
     */
    final protected function changeRenderExtention(string $ext):bool
    {
        iumioSmarty::$viewExtention = $ext;
        return (true);
    }

    /** Register a new view plugin
     * This plugin allow to use in your smarty view
     * @param string $type Method type (function or modifier)
     * @param string $name Method name
     * @param array $method This array contain class with namespace and class method array('Class with namespace', 'class method')
     * @return int Return the register success
     * @throws Server500
     */
    final public function registerViewPlugin(string $type, string $name, array $method):int
    {
        $si = iumioSmarty::getSmartyInstance($this->appMastering);
        if ($type !== "modifier" && $type != "function")
            throw new Server500(new \ArrayObject(array("explain" => "Undefined plugin type $type.",
                "solution" => "Allowed to modifier or function")));
        if (is_array($method) && count($method) == 2)
            $si->registerPlugin($type, $name, $method);
        else
            throw new Server500(new \ArrayObject(array("explain" => "You must enter a valid class method in this array",
                "solution" => "array('Class with namespace', 'class method')")));
        return (1);
    }

    /** Get Database service
     * @param string|null $name Database name
     * @return \PDO PDO instance (Connection instance)
     */
    final protected function getConnection(string $name = '#none'):\PDO
    {
        return (IDA::getDbInstance($name));
    }


    /** Generate route url
     * @param string $routename route name in routing file
     * @param array $parameters Parameters for dynamic parameters in url
     * @param string $app_called App name
     * @param bool $component Is a application component
     * @return string|NULL The generated route
     * @throws Server404|Server500
     */

    final public function generateRoute(string $routename,  array $parameters = null, string $app_called = null,
                                        bool $component = false):string
    {
        $app = (($app_called != null)? $app_called : APP_CALL);

        $file = JL::open(CONFIG_DIR."core/apps.json");
        $prefix = null;
        foreach ($file as $one)
        {
            if ($one->name == $app && $one->prefix != "")
                $prefix = $one->prefix;
        }
        JL::close(CONFIG_DIR."core/apps.json");

        $iscomponent = (self::getCore())->detectAppType($app);

        $component = false;
        if ($iscomponent == 'base') $component = true;
        else if ($iscomponent == 'none')
            throw new Server500(new \ArrayObject(array("explain" => "Cannot determine app type of ".$app,
                "solution" => "Please check if your app exist")));
        $rt = new Routing($app, $prefix, $component);
        if (!$rt->routingRegister())
            throw new Server500(new \ArrayObject(array("solution" => "Please check all RT file",
                "explain" => "Cannot open your RT file")));

        foreach ($rt->routes() as $one)
        {
            if ($one['routename'] == $routename)
            {
                $one['path'] = $this->analysePath($one['routename'], $one['path'],
                    ((is_array($parameters))? $parameters : array()));
                $env = IUMIO_ENV;
                if ($env == "DEV")
                    $env = "Dev.php";
                else if ($env == "PROD")
                    $env = "Prod.php";

                if (strpos($_SERVER['REQUEST_URI'], $env) == false)
                    $env = "";
                else
                    $env = "/".$env;

                if (isset($one['path'][0]) && $one['path'][0] != "/")
                    $one['path'] = "/".$one['path'];
                $url = $env.$one['path'];

                $base = (isset($_SERVER['SCRIPT_NAME']) && $_SERVER['SCRIPT_NAME'] != "")? $_SERVER['SCRIPT_NAME'] : "";

                if (strpos($_SERVER['REQUEST_URI'], iumioEnvironment::getFileEnv(IUMIO_ENV)) == false)
                {
                    $rm = explode('/',$base);
                    $rm = array_values(Routing::removeEmptyData($rm));
                    $rm = array_values($rm);
                    $key = array_search(iumioEnvironment::getFileEnv(IUMIO_ENV), $rm);
                    unset($rm[$key]);
                    $rm = array_values($rm);
                    $base = implode("/", $rm);
                    if (isset($base[0]) && $base[0] != "/")
                        $base = "/".$base;
                }

                return ($base.$url);
            }
        }

        throw new Server404(new \ArrayObject(array("solution" => "Please check all RT file",
            "explain" => "No route for $routename")));
    }

    /** Analyse path to change dynamic parameters with specific parameters array
     * @param string $routename The route name
     * @param string $path The route path
     * @param array $parameters Parameters to change
     * @return string The new path
     * @throws Server500 If parameters count does not match or parameter missing
     */
    final protected function analysePath(string $routename, string $path, array $parameters):string
    {
        $arraypath = explode("/", $path);
        $arrayElem = array();
        $narray = array();
        foreach ($arraypath as $one)
        {
            if (preg_match("/{(.*?)}/", $one))
            {
                $nstr = str_replace("{", "", $one);
                $nstr = str_replace("}", "", $nstr);
                array_push($arrayElem, $nstr);
            }
        }

        $countchange = 0;
        if (count($parameters) != count($arrayElem))
            throw new Server500(new \ArrayObject(array("explain" =>
                "Parameters count does not matches for $routename route",
                "solution" => "Please check your parameters declaration")));


        foreach ($arrayElem as $uno)
        {
            if (isset($parameters[$uno]) && $parameters[$uno] != "")
            {
                $narray["{".$uno."}"] = $parameters[$uno];
                $countchange++;
            }
        }

        if (count($parameters) != $countchange)
            throw new Server500(new \ArrayObject(array("explain" => "Parameter missing for $routename route",
                "solution" => "Please check your parameters declaration")));


       for ($i = 0; $i < count($arraypath); $i++)
       {
            if (isset($narray[$arraypath[$i]]))
                $arraypath[$i] = $narray[$arraypath[$i]];
       }

       $path = implode("/", $arraypath);

        return ($path);
    }

    /** Return instance of specific master in current app
     * @param string $mastername master name
     * @return mixed Class instance
     * @throws Server500
     */
    final protected function getMaster(string $mastername)
    {
       if (IS_IUMIO_COMPONENT == 1)
           $file = JL::open(BASE_APPS."apps.json");
       else
           $file = JL::open(CONFIG_DIR."core/apps.json");

       $app = null;

       foreach ($file as $one => $val)
       {
           if (isset($val->name) && APP_CALL == $val->name)
           {
               $app = $val;
               break;
           }
       }

        if ($app != null)
        {
            $class = APP_CALL."\Masters\\".$mastername."Master";
            if (class_exists ($class))
                return (new $class);
            else
                throw new Server500(new \ArrayObject(array("explain" => "Master $mastername does not exist",
                    "solution" => "Please check masters declaration")));
        }
        else
            throw new Server500(new \ArrayObject(array("explain" =>
                ((IS_IUMIO_COMPONENT == 1)? "BaseApp" : "App" )." ".APP_CALL." does not exist in apps.json",
                "solution" => "Please check app declaration")));
    }

}