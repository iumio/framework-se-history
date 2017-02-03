<?php

namespace IumioFramework\Core\Requirement;
use IumioFramework\Core\Base\Http\HttpListener;
use IumioFramework\Masters\Routing;
use IumioFramework\Core\Requirement\Relexion\IumioReflexion;
use IumioFramework\Theme\Server\Server404;

/**
 * Class IumioUltimaCore
 * @package IumioFramework\Core\Requirement;
 *
 * The Core is the heart of the Iumio system.
 *
 * It manages an environment made of ap.
 *
 * @author Dany Rafina <danyrafina@gmail.com>
 */

abstract class IumioUltimaCore
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

    const VERSION = '0.1.0';
    const VERSION_ID = 201710;
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
     * @param HttpListener $request
     * @param array $routes
     * @return mixed
     */
    protected function manage(HttpListener $request, array $routes)
    {
        $controller = NULL;
        $baseSimilar = 0;
        $path = $request->server->get('PATH_INFO');
        if ($path == "") $path = "/";

        foreach ($routes as $route)
        {
            $mat = Routing::matches($route['path'], $path, $route);

            if ($mat['similar'] > $baseSimilar)
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
     * @throws \Exception
     */
    public function dispatching(HttpListener $request):int
    {

        $apps = $this->registerApps();
        $def = $this->detectDefaultApp($apps);

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
                $call = new IumioReflexion();
                define("APP_CALL", $def['name']);
                if (isset($callback['pval']))
                    $call->__named($master, $method, $callback['pval']);
                else
                    $call->__named($master, $method);
            }
            catch (\Exception $exception)
            {
                throw new \Exception("Iumio Core Error : Class $master or method $master::$method doesn't exist => ".$exception->getMessage());
            }

        }
        else
            throw new \Exception("L'enregistrement du routeur a échoué");
        return (1);
    }

    /** Return app declaration file
     * @return \stdClass File result
     */
    final protected function getClassFile():\stdClass
    {
        $a = json_decode(file_get_contents(CORE.'apps.json'));
        return ($a == NULL ? new \stdClass() : $a);
    }



}