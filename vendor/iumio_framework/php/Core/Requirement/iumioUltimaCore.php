<?php

namespace iumioFramework\Core\Requirement;
use iumioFramework\Core\Base\Http\HttpListener;
use iumioFramework\Masters\Routing;
use iumioFramework\Core\Requirement\Relexion\iumioReflexion;
use iumioFramework\Exception\Server\{Server500, Server404, Server000};

/**
 * Class iumioUltimaCore
 * @package iumioFramework\Core\Requirement;
 *
 * The Core is the heart of the iumio system.
 *
 * It manages an environment made of ap.
 *
 * @author Dany Rafina <danyrafina@gmail.com>
 */

abstract class iumioUltimaCore
{

    protected $apps = array();


    protected $container;
    protected $rootDir;
    protected $env;
    protected $debug;
    protected $booted = false;
    protected $name;
    protected $startTime;
    protected $loadClassCache;

    const VERSION = '0.1.5';
    const VERSION_EDITION = 'iumio Framework Standard Edition';
    const VERSION_STAGE = 'PRE-BETA';
    const VERSION_ID = 201715;
    const MAJOR_VERSION = 1;
    const MINOR_VERSION = 0;
    const RELEASE_VERSION = 1;
    const EXTRA_VERSION = '';

    const END_OF_MAINTENANCE = 'END';
    const END_OF_LIFE = 'END';

    /**
     * Constructor.
     *
     * @param string $environment The environment
     * @param bool   $debug       Whether to enable debugging or not
     */

    public function __construct(string $environment, bool $debug)
    {
        $this->environment = $environment;
        $this->debug = (bool) $debug;
        $this->rootDir = $this->getRootDir();
        $this->name = $this->getName();

        if ($this->debug) {
            $this->startTime = microtime(true);
        }

        $defClass = new \ReflectionMethod($this, '__construct');
        $defClass = $defClass->getDeclaringClass()->name;
    }

    /**
     * {@inheritdoc}
     *
     **/

    public function isDebug()
    {
        return $this->debug;
    }

    /**
     * {@inheritdoc}
     *
     **/
    public function getRootDir()
    {
        if (null === $this->rootDir) {
            $r = new \ReflectionObject($this);
            $this->rootDir = dirname($r->getFileName());
        }

        return $this->rootDir;
    }

    /**
     * {@inheritdoc}
     **/

    public function getContainer()
    {
        return $this->container;
    }

    /**
     * {@inheritdoc}
     **/
    public function getName()
    {
        if (null === $this->name) {
            $this->name = preg_replace('/[^a-zA-Z0-9_]+/', '', basename($this->rootDir));
        }

        return $this->name;
    }

    /**
     * {@inheritdoc}
     **/
    public function getEnvironment()
    {
        return $this->environment;
    }


    /**
     * @param array $apps
     * @return array
     * @throws \Exception
     */
    protected function detectDefaultApp(array $apps):array
    {
        foreach ($apps as $oneapp => $val)
            if ($val['isdefault'] == "yes") return (array("name" => $oneapp, "value" => $val));

        throw new \Exception("No Default app is detected");
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
            $mat2 = Routing::matches($baseurl.$route['path']."/", $path, $route);

            if (($mat['similar'] > $baseSimilar) || $mat2['similar'] > $baseSimilar)
            {
               $baseSimilar = $mat['similar'];
                $controller = $route;
                if (isset($controller['params']) && count($controller['params']) > 0)
                {
                    $pval = $this->assembly($controller['params'], $mat['result']);
                    $controller['pval'] = $pval;
                    unset($controller['params']);
                }
            }
        }
        return ($controller);
    }

    /** Merge two simple array to key/value array
     * @param array $keys array with all key
     * @param array $values value array
     * @return array Merged array
     */
    final protected function assembly(array $keys, array $values):array
    {
        return (array_combine($keys, $values));
    }

    /**
     * @param string $fullAppName
     * @return string
     */
    final protected function getRealAppName(string $fullAppName):string
    {
        return (substr($fullAppName, 0, (strlen($fullAppName) - 3)));
    }


    /** Go to controller
     * @param HttpListener $request parameters
     * @return int Return as success
     * @throws Server404
     * @throws Server500
     */
    public function dispatching(HttpListener $request):int
    {

        $apps = $this->registerApps();
        $def = $this->detectDefaultApp($apps);

        $bapps = $this->registerBaseApps();

        if ($this->isComponentCall($bapps, $request)) return (1);

        $rt = new Routing($def['name'], 'iumio');
        if ($rt->routingRegister() == true)
        {
            $callback = $this->manage($request, $rt->routes());

            if ($callback == NULL)
                throw new Server404(new \ArrayObject(array("solution" => "Please check your URI")));

            $method = $callback['method'];
            $controller = $callback['controller'];

            $defname = $def['name'];
            $master = "\\$defname\\Master\\{$controller}Master";
            try
            {
                $call = new iumioReflexion();
                define("APP_CALL", $def['name']);
                define("IS_IUMIO_COMPONENT", false);
                if (isset($callback['pval']))
                    $call->__named($master, $method, $callback['pval']);
                else
                    $call->__named($master, $method);
            }
            catch (\Exception $exception)
            {
                new Server500(new \ArrayObject(array("explain" =>"iumio Core Error : Class $master or method $master::$method doesn't exist", "solution" => $exception->getMessage())));
            }

        }
        else
            throw new Server500(new \ArrayObject(array("explain" =>"iumio router register fail  ", "solution" => "Please check your app configuration")));
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
                    $rt = new Routing($def['name'], 'iumio', true);
                    if ($rt->routingRegister() == true) {
                        $callback = $this->manage($request, $rt->routes());
                        if ($callback == NULL) return (false);
                        $method = $callback['method'];
                        $controller = $callback['controller'];

                        $defname = $def['name'];
                        $master = "\\$defname\\Master\\{$controller}Master";
                        try {
                            $call = new iumioReflexion();
                            define("APP_CALL", $def['name']);
                            define("IS_IUMIO_COMPONENT", true);
                            if (isset($callback['pval']))
                                $call->__named($master, $method, $callback['pval']);
                            else
                                $call->__named($master, $method);
                        } catch (\Exception $exception) {
                            throw new \Exception("iumio Core Error : Class $master or method $master::$method doesn't exist => " . $exception->getMessage());
                        }
                    } else
                        throw new Server500(new \ArrayObject(array("explain" => $def['name'] . " component not contain a related router", "solution" => "Please check the if 'routingRegister' is present in your router")));
                } else
                    throw new Server500(new \ArrayObject(array("explain" => $def['name'] . " component doesn't contain 'off' method ", "solution" => "Please add off method to your component")));
            }
            else
                throw new Server500(new \ArrayObject(array("explain" => "Component doesn't exist ", "solution" => "Check apps.json file in base app")));
             $this->booted;
        }
       return (true);
    }

    /** Get all app register on apps.json
     * @return array Apps register
     */

    public function registerApps():array
    {
        $classes = $this->getClassFile();

        if (count((array)$classes) == 0)  new Server000(new \ArrayObject(array()));
        $apps = array();
        foreach ($classes as $class => $val) {
            $val = (array)$val;
            $apps[$val['name']] =  array("isdefault" =>$val['isdefault'],  "appclass" => new $val['class']());
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
            case 'VERSION_ID':
                $rs = self::VERSION_ID;
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
                $rs = self::VERSION_ID;
                break;
            case 'VERSION_STAGE':
                $rs = self::VERSION_STAGE;
                break;
        }
        return ($rs);
    }
}