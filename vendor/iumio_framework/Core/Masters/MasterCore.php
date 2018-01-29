<?php

/**
 *
 *  * This is an iumio Framework component
 *  *
 *  * (c) RAFINA DANY <dany.rafina@iumio.com>
 *  *
 *  * iumio Framework - iumio Components
 *  *
 *  * To get more information about licence, please check the licence file
 *
 */

namespace iumioFramework\Masters;

use iumioFramework\Base\Renderer\Renderer;
use iumioFramework\Core\Additionnal\Template\SmartyEngineConfiguration;
use iumioFramework\Core\Requirement\Environment\FEnv;
use iumioFramework\Core\Requirement\Patterns\ObjectCreator;
use iumioFramework\HttpRoutes\Routing;
use iumioFramework\Core\Base\Http\ParameterRequest;
use iumioFramework\Core\Additionnal\Template\SmartyEngineTemplate;
use iumioFramework\Core\Requirement\Environment\FrameworkEnvironment;
use iumioFramework\Core\Requirement\FrameworkServices\Services;
use iumioFramework\Core\Requirement\FrameworkCore;
use iumioFramework\Core\Requirement\FrameworkServices\GlobalCoreService;
use iumioFramework\Core\Base\Database\DatabaseAccess as IDA;
use iumioFramework\Exception\Server\Server500;
use iumioFramework\Exception\Server\Server404;
use iumioFramework\Core\Base\Http\Session\HttpSession;
use iumioFramework\Core\Base\Json\JsonListener as JL;

/**
 * Class MasterCore
 * This is the parent master for all subclass
 * @package iumioFramework\Masters
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */

class MasterCore extends GlobalCoreService
{
    protected $masterFirst = null;
    protected $appMastering = null;


    /**
     * MasterCore constructor.
     */
    public function __construct()
    {
        self::setAppMaster($this);
    }

    /** Get a component
     * @param string $component
     * @return mixed
     * @throws Server500
     */
    protected function get(string $component)
    {
        switch ($component) {
            case 'request':
                return (FrameworkCore::getRuntimeParameters())->request;
                break;
            case 'query':
                return (FrameworkCore::getRuntimeParameters())->query;
                break;
            case 'session':
                return (new HttpSession());
                break;
            case 'service':
                return (Services::getInstance());
                break;
            default:
               throw new Server500(new \ArrayObject(array("explain" =>
                   "Cannot call component : Undefined component $component",
                   "solution" => "Call availables components")));
                break;
        }
    }



    /** Show a view
     * @param string $view View name
     * @param array $options options to view
     * @param bool $iscached By default to true, this option allows you to disable
     * or enable the cache for a page (Useful for dynamic content of a page)
     * @throws \Exception if class does not exist
     * @return Renderer
     */
    final protected function render(string $view, array $options = array(), bool $iscached = true):Renderer
    {
        $r = new Renderer();
        return ($r->graphicRenderer($view, $options, $iscached));
    }


    /** Change views Render extension
     * @param string $ext new extention
     * @return bool
     */
    final protected function changeRenderExtention(string $ext):bool
    {
        SmartyEngineTemplate::$viewExtention = $ext;
        return (true);
    }

    /** Register a new view plugin
     * This plugin allow to use in your smarty view
     * @param string $type Method type (function or modifier)
     * @param string $name Method name
     * @param array $method This array contain class with namespace and class method
     * array('Class with namespace', 'class method')
     * @return int Return the register success
     * @throws Server500
     * @throws \SmartyException
     */
    final public function registerViewPlugin(string $type, string $name, array $method):int
    {
        $si = SmartyEngineTemplate::getSmartyInstance($this->appMastering);
        if ($type !== "modifier" && $type != "function") {
            throw new Server500(new \ArrayObject(array("explain" => "Undefined plugin type $type.",
                "solution" => "Allowed to modifier or function")));
        }
        if (is_array($method) && count($method) == 2) {
            $si->registerPlugin($type, $name, $method);
        } else {
            throw new Server500(new \ArrayObject(array("explain" => "You must enter a valid class method in this array",
                "solution" => "array('Class with namespace', 'class method')")));
        }
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
     * @throws Server500
     * @throws \Exception
     */

    final public function generateRoute(string $routename, array $parameters = null, string $app_called = null,
        bool $component = false) :string {

        $app = (($app_called != null)? $app_called : FEnv::get("app.call"));

        $file = JL::open(FEnv::get("framework.config.core.apps.file"));
        $prefix = null;
        foreach ($file as $one) {
            if ($one->name == $app && $one->prefix != "") {
                $prefix = $one->prefix;
            }
        }
        JL::close(FEnv::get("framework.config.core.apps.file"));

        $iscomponent = (self::getCore())->detectAppType($app);

        $component = false;
        if ($iscomponent == 'base') {
            $component = true;
        } elseif ($iscomponent == 'none') {
            if (FEnv::isset("framework.smarty.called") && FEnv::get("framework.smarty.called") == 1) {
                throw new \Exception("Cannot determine app type of ".$app);
            }
            else {
                throw new Server500(new \ArrayObject(array("explain" => "Cannot determine app type of " . $app,
                    "solution" => "Please check if your app exist")));
            }
        }
        $rt = new Routing($app, $prefix, $component);
        if (!$rt->routingRegister()) {
            if (FEnv::isset("framework.smarty.called") && FEnv::get("framework.smarty.called") == 1) {
                throw new \Exception("Cannot open your RT file");
            }
            else {
                throw new Server500(new \ArrayObject(array("solution" => "Please check all RT file",
                    "explain" => "Cannot open your RT file")));
            }
        }

        foreach ($rt->routes() as $one) {
            if ($one['routename'] == $routename) {
                $one['path'] = $this->analysePath(
                    $one['routename'],
                    $one['path'],
                    ((is_array($parameters))? $parameters : array())
                );

                if (isset($one['path'][0]) && $one['path'][0] != "/") {
                    $one['path'] = "/".$one['path'];
                }
                $url = $one['path'];

                $base = (isset($_SERVER['SCRIPT_NAME']) && $_SERVER['SCRIPT_NAME'] != "")? $_SERVER['SCRIPT_NAME'] : "";

                if (strpos($_SERVER['REQUEST_URI'], FrameworkEnvironment::getFileEnv(IUMIO_ENV)) == false) {
                    $rm = explode('/', $base);
                    $rm = array_values(Routing::removeEmptyData($rm));
                    $rm = array_values($rm);
                    $key = array_search(FrameworkEnvironment::getFileEnv(FEnv::get("framework.env")), $rm);
                    unset($rm[$key]);
                    $rm = array_values($rm);
                    $base = implode("/", $rm);
                    if (isset($base[0]) && $base[0] != "/") {
                        $base = "/".$base;
                    }
                }

                return ($base.$url);
            }
        }

        if (FEnv::isset("framework.smarty.called") && FEnv::get("framework.smarty.called") == 1) {
            throw new \Exception("Unable to generate URL for route : $routename");
        }
        else {
            throw new Server500(new \ArrayObject(array("solution" => "Please check all RT file",
                "explain" => "Unable to generate URL for route : $routename")));
        }
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
        foreach ($arraypath as $one) {
            if (preg_match("/{(.*?)}/", $one)) {
                $nstr = str_replace("{", "", $one);
                $nstr = str_replace("}", "", $nstr);
                array_push($arrayElem, $nstr);
            }
        }

        $countchange = 0;
        if (count($parameters) != count($arrayElem)) {
            throw new Server500(new \ArrayObject(array("explain" =>
                "Parameters count does not matches for $routename route",
                "solution" => "Please check your parameters declaration")));
        }



        foreach ($arrayElem as $uno) {
            if (isset($parameters[$uno]) && $parameters[$uno] != "") {
                if (gettype($parameters[$uno]) == "object" || gettype($parameters[$uno]) == "array") {
                    throw new Server500(new \ArrayObject(array("explain" => "Cannot generate route [".
                        $routename."] :  Invalid type [".gettype($parameters[$uno])."] for route parameters",
                        "solution" => "Define a valid parameter type ([object] and [array] is not allowed)")));
                }

                $narray["{".$uno."}"] = $parameters[$uno];
                $countchange++;
            }
        }

        if (count($parameters) != $countchange) {
            throw new Server500(new \ArrayObject(array("explain" => "Parameter(s) missing for $routename route",
                "solution" => "Please check your parameters declaration")));
        }


        for ($i = 0; $i < count($arraypath); $i++) {
            if (isset($narray[$arraypath[$i]])) {
                $arraypath[$i] = $narray[$arraypath[$i]];
            }
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
        if (FEnv::get("app.is_components") == 1) {
            $file = JL::open(FEnv::get("framework.baseapps.apps.file"));
        } else {
            $file = JL::open(FEnv::get("framework.config.core.apps.file"));
        }

        $app = null;

        foreach ($file as $one => $val) {
            if (isset($val->name) && APP_CALL == $val->name) {
                $app = $val;
                break;
            }
        }

        if ($app != null) {
            $class = FEnv::get("app.call")."\Masters\\".$mastername."Master";
            if (class_exists($class)) {
                return (new $class);
            } else {
                throw new Server500(new \ArrayObject(array("explain" => "Master $mastername does not exist",
                    "solution" => "Please check masters declaration")));
            }
        } else {
            throw new Server500(new \ArrayObject(array("explain" =>
                ((FEnv::get("app.is_components") == 1)? "BaseApp" : "App" )." ".
                FEnv::get("app.call")." does not exist in apps.json",
                "solution" => "Please check app declaration")));
        }
    }
}
