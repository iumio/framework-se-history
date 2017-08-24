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

namespace iumioFramework\Core\Requirement;
use iumioFramework\Core\Additionnal\Server\iumioServerManager;
use iumioFramework\Core\Base\Http\HttpListener;
use iumioFramework\HttpRoutes\Routing;
use iumioFramework\Core\Requirement\{Relexion\iumioReflexion, FrameworkServices\GlobalCoreService};
use iumioFramework\Exception\Server\{Server500, Server404, Server000};
use iumioFramework\Core\Base\Json\JsonListener as JL;

/**
 * Class iumioCore
 * @package iumioFramework\Core\Requirement;
 *
 * The Core is the heart of the iumio system.
 *
 * It manages an environment made of app.
 *
 * @author Dany Rafina <danyrafina@gmail.com>
 */

abstract class iumioCore extends GlobalCoreService
{

    protected $apps = array();
    protected $debug;
    protected $environment;
    private static $runtime_parameters = null;

    const VERSION = '0.4.1';
    const VERSION_EDITION = 'iumio Framework Standard Edition';
    const VERSION_EDITION_SHORT = 'SE';
    const VERSION_STAGE = 'BETA';
    const VERSION_BUILD = 201741;
    const UIDIE = "NULL";


    /**
     * Constructor.
     *
     * @param string $environment The app environment
     * @param bool   $debug       Enable debug
     */

    public function __construct(string $environment, bool $debug)
    {
        $this->environment = $environment;
        $this->debug = (bool) $debug;
        self::detectFirstInstallation();

        if ($this->debug) {
            $this->startTime = microtime(true);
        }

        self::setCore($this);
        $defClass = new \ReflectionMethod($this, '__construct');

        $defClass = $defClass->getDeclaringClass()->name;
    }

    /** Set debug mode
     * @return bool
     */
    public function isDebug()
    {
        return $this->debug;
    }


    /** Get runtime parameters request
     * @return null|array
     */
    final static public function getRuntimeParameters()
    {
        return self::$runtime_parameters;
    }

    /** Get application environment
     * @return string
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * Check the correct permission in directory :
     * /elements
     * /apps
     * @return int Correct permissions or not
     * @throws Server500 Permissions are incorrect
     */
    public function checkPermission():int
    {
        if (!iumioServerManager::checkIsExecutable(ROOT."elements/") || !iumioServerManager::checkIsReadable(ROOT."elements/") || !iumioServerManager::checkIsWritable(ROOT."elements/"))
        {
            throw new Server500(new \ArrayObject(array("explain" =>"Core Error : Folder /elements does not have correct permission", "solution" => "Must be read, write, executable permission")));
            return (0);
        }

        if (!iumioServerManager::checkIsExecutable(ROOT."apps/") || !iumioServerManager::checkIsReadable(ROOT."apps/") || !iumioServerManager::checkIsWritable(ROOT."apps/"))
        {
            throw new Server500(new \ArrayObject(array("explain" =>"Core Error : Folder /apps does not have correct permission", "solution" => "Must be read, write, executable permission")));
            return (0);
        }
        return (1);

    }


    /** Detect the default app
     * @param array $apps App list
     * @return array The default app
     * @deprecated  Will remove next major release
     * @throws \Exception When does not have a default app
     */
    protected function detectDefaultApp(array $apps):array
    {
        foreach ($apps as $oneapp => $val)
            if ($val['isdefault'] == "yes") return (array("name" => $oneapp, "value" => $val));

        throw new Server500(new \ArrayObject(array("explain" => "No Default app is detected", "solution" => "Please edit apps.json to set a default app")));

    }

    /** Detect the app type
     * @param string $appname App name
     * @return string The type of app called. Possibility to return a << none >> app when appname not detected
     */
    final public function detectAppType(string $appname):string
    {
        $apptype = 'none';
        $appsp = self::registerApps();
        $appbs = self::registerBaseApps();

        foreach ($appsp as $one => $val)
        {
            if ($one == $appname) return ('simple');
        }

        foreach ($appbs as $one => $val)
        {
            if ($val['name'] == $appname) return ('base');
        }

        return ($apptype);
    }

    /**
     * Detect url matches

     * @param HttpListener $request
     * @param array $routes
     * @param string $baseurl Contain base url if it's a component is calling
     * @return mixed
     */
    protected function manage(HttpListener $request, array $routes, string $baseurl = "")
    {
        $controller = NULL;
        $baseSimilar = 0;
        $path = $request->server->get('REQUEST_URI');

        if ($path == "") $path = "/";

        foreach ($routes as $route)
        {
            $mat = Routing::matches($baseurl.$route['path'], $path, $route);
            if (($mat['similar'] > $baseSimilar))
            {
                $baseSimilar = $mat['similar'];
                $controller = $route;
                if (isset($controller['params']) && count($controller['params']) > 0)
                {
                    $pval = $this->assembly($controller['params'], $mat['result']);

                    if ($pval != false)
                    {
                        $controller['pval'] = $pval;
                        unset($controller['params']);
                    }
                }
            }
        }
        return ($controller);
    }

    /** Merge two simple array to key/value array
     * @param array $keys array with all key
     * @param array $values value array
     * @return mixed Merged array or false
     */
    final protected function assembly(array $keys, array $values)
    {
        return (@array_combine($keys, $values));
    }


    /** getSimpleAppFormat
     * @param array $apps App list
     * @return array getSimpleAppFormat
     */
    protected function getSimpleAppFormat(array $apps):array
    {
        $narray = array();
        foreach ($apps as $oneapp => $val)
            array_push($narray, array("name" => $oneapp, "value" => $val));
        return ($narray);

    }


    /** Get real app name
     * @param string $fullAppName Full app name
     * @return string the real app name
     */
    final protected function getRealAppName(string $fullAppName):string
    {
        return (substr($fullAppName, 0, (strlen($fullAppName) - 3)));
    }


    /** Go to controller
     * @param HttpListener $request parameters
     * @return int Return as success
     * @throws Server404 Url not found
     * @throws Server500 Class or method does not exist or router failed
     */
    public function dispatching(HttpListener $request):int
    {
        self::$runtime_parameters = $request;
        $apps = $this->registerApps();
        $bapps = $this->registerBaseApps();
        $great = false;
        if ($this->isComponentCall($bapps, $request)) return (1);

        $values = $this->getSimpleAppFormat($apps);

        foreach ($values as $one => $def) {
            if ($great)
                return (1);

           if ($def["value"]["enabled"] == "no")
               continue;
            $rt = new Routing($def['name'], $def['value']['prefix']);
            if ($rt->routingRegister() == true) {
                $callback = $this->manage($request, $rt->routes());
                if ($callback != NULL) {
                    $method = $callback['method'];
                    $controller = $callback['controller'];

                    $defname = $def['name'];
                    $master = "\\$defname\\Masters\\{$controller}Master";
                    try {
                        $call = new iumioReflexion();
                        define("APP_CALL", $def['name']);
                        define("IS_IUMIO_COMPONENT", false);
                        if (isset($callback['pval']))
                            $call->__named($master, $method, $callback['pval']);
                        else
                            $call->__named($master, $method);
                        $great = true;
                    } catch (\Exception $exception) {
                        throw new Server500(new \ArrayObject(array("explain" => $exception->getMessage())));
                    }
                }
            } else
                throw new Server500(new \ArrayObject(array("explain" => "Router register failed  ", "solution" => "Please check your app configuration")));
        }
        if ($great == false)
            throw new Server404(new \ArrayObject(array("solution" => "Please check your URI")));

        return (1);
    }

    /** Check if it's component is calling
     * @param array $bases Base Apps
     * @param HttpListener $request Current request
     * @return bool If component is calling
     * @throws Server500 Generate error server
     * @throws \Exception
     */
    public function isComponentCall(array $bases, HttpListener $request): bool
    {
        foreach ($bases as $def) {
            if (isset($def['appclass'])) {
                if (method_exists($def['appclass'], 'off') == true) {
                    if (($def['appclass'])::baseStatus() == 0) return (false);
                    $rt = new Routing($def['name'], null, true);
                    if ($rt->routingRegister() == true) {
                        $callback = $this->manage($request, $rt->routes());
                        if ($callback == NULL) return (false);
                        $method = $callback['method'];
                        $controller = $callback['controller'];

                        $defname = $def['name'];
                        $master = "\\$defname\\Masters\\{$controller}Master";
                        try {
                            $call = new iumioReflexion();
                            define("APP_CALL", $def['name']);
                            define("IS_IUMIO_COMPONENT", true);
                            if (isset($callback['pval']))
                                $call->__named($master, $method, $callback['pval']);
                            else
                                $call->__named($master, $method);
                        } catch (\Exception $exception) {
                            throw new Server500(new \ArrayObject(array("explain" => $exception->getMessage())));
                        }
                    } else
                        throw new Server500(new \ArrayObject(array("explain" => $def['name'] . " component not contain a related router", "solution" => "Please check the if 'routingRegister' is present in your router")));
                } else
                    throw new Server500(new \ArrayObject(array("explain" => $def['name'] . " component doesn't contain 'off' method ", "solution" => "Please add off method to your component")));
            }
            else
                throw new Server500(new \ArrayObject(array("explain" => "Component doesn't exist ", "solution" => "Check apps.json file in base app")));
        }
        return (true);
    }

    /** Get all app register on apps.json
     * @return array Apps register
     * @throws Server000
     */

    public function registerApps():array
    {
        $classes = $this->getClassFile();
        if (count((array)$classes) == 0)  throw new Server000(new \ArrayObject(array()));
        $apps = array();
        foreach ($classes as $class => $val) {
            $val = (array)$val;
            $apps[$val['name']] =  array("appclass" => new $val['class']());
        }
        return $apps;
    }

    /** Get all app register on apps.json
     * @return array Apps register
     */

    public function registerBaseApps():array
    {
        $classes = $this->getBaseClassFile();

        $apps = array();
        foreach ($classes as $class => $val) {
            $val = (array)$val;
            $apps[$val['name']] =  array("name" => $val['name'], "appclass" => new $val['class'](), "base_url" =>$val['base_url']);
        }
        return $apps;
    }

    /** Return app declaration file
     * @return \stdClass File result
     */
    final protected function getClassFile():\stdClass
    {
        $a = json_decode(file_get_contents(ELEMS.'config_files/apps.json'));
        return ($a == NULL ? new \stdClass() : $a);
    }

    /** Return base app declaration file
     * @return \stdClass File result
     */
    final protected function getBaseClassFile():\stdClass
    {
        $a = json_decode(file_get_contents(BASE_APPS.'apps.json'));
        return ($a == NULL ? new \stdClass() : $a);
    }

    /** Get info about iumio framework
     * @param string $infoname info name
     * @return string info result
     * @throws Server500 Error generate
     */
    final static public function getInfo(string $infoname):string
    {
        $rs = 'none';
        switch ($infoname)
        {
            case 'VERSION':
                $rs = self::VERSION;
                break;
            case 'VERSION_EDITION':
                $rs = self::VERSION_EDITION;
                break;
            case 'VERSION_EDITION_SHORT':
                $rs = self::VERSION_EDITION_SHORT;
                break;
            case 'VERSION_ID':
                $rs = self::VERSION_BUILD;
                break;
            case 'VERSION_STAGE':
                $rs = self::VERSION_STAGE;
                break;
            case 'PHP_VERSION':
                $rs = phpversion();
                break;
        }
        return ($rs);
    }

    /** Get info about current server
     * @param string $infoname info name
     * @return string info result
     * @throws Server500 Error generate
     */
    final static public function getServerInfo(string $infoname):string
    {
        $rs = 'none';
        switch ($infoname)
        {
            case 'PHP_VERSION':
                $rs = phpversion();
                break;
            case 'SERVER_NAME':
                $rs = $_SERVER['SERVER_NAME'];
                break;
            case 'VERSION_ID':
                $rs = self::VERSION_BUILD;
                break;
            case 'VERSION_STAGE':
                $rs = self::VERSION_STAGE;
                break;
            default:
                try
                {
                    $rs = $_SERVER[$infoname];
                }
                catch (\Exception $e)
                {
                    throw new Server500(new \ArrayObject(array("explain" => "Core Error: The server info $infoname does not exist", "solution" => "Check your keyword")));
                }

                break;
        }
        return ($rs);
    }


    /** Detect if it is a first install
     * @return int The success or failure
     * @throws Server500 File installer.php not exists
     */
    final private function detectFirstInstallation():int
    {
        $file = JL::open(CONFIG_DIR.'initial.json');
        if (empty( (array) $file))
        {
            if (file_exists(ROOT.'web/setup/setup.php'))
            {
                header('Location: '.HOST_CURRENT.'/setup/setup.php');
                exit(1);
            }
            else
                throw new \RuntimeException("(Setup components does not exist in web directory => Please download the setup components on iumio Framework Website to fix this error and put him in web directory)");

        }
        return (0);
    }
}