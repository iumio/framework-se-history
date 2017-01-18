<?php

namespace IumioFramework\Apps;
use DefaultApp\Master\DefaultMaster;
use IumioFramework\Core\Requirement\IumioUltimaCore;
use IumioFramework\Core\Base\Http\HttpListener;
use IumioFramework\Masters\Routing;

/**
 * Class AppCore
 */

class AppCore extends IumioUltimaCore
{
    /**
     * AppCore constructor.
     * @param $env
     * @param $debug
     */

    public function __construct($env, $debug)
    {
        date_default_timezone_set('Europe/Paris');
        parent::__construct($env, $debug);
    }

    /**
     * @return array
     */

    public function registerApps()
    {
        $apps = array(
            "DefaultApp" => array("hasdefault" => new \DefaultApp\DefaultApp())
        );
        return $apps;
    }

    public function getPrimary()
    {

    }


    /**
     * @param HttpListener $request
     * @return int
     * @throws \Exception
     */
    public function dispatch(HttpListener $request):int
    {
        $apps = $this->registerApps();
        $def = parent::detectDefaultApp($apps);

        $rt = new Routing($def['name'], 'iumio');
        if ($rt->routingRegister() == true)
        {
            $callback = parent::manage($request, $rt->routes());

            if ($callback == NULL)
                // REPLACE WITH THE FUTURE 404 EXCEPTION
                throw new \Exception("404 NOT FOUND");

            $method = $callback['method'];
            $controller = $callback['controller'];

            $defname = $def['name'];
            $master = "\\$defname\\Master\\{$controller}Master";
            try
            {
                $invoke = new \ReflectionMethod($master, $method);
            }
            catch (\Exception $exception)
            {
                throw new \Exception("Iumio Core Error : Class $master or method $master::$method doesn't exist");
            }

            $invoke->invoke(new $master());
        }
        else
            throw new \Exception("L'enregistrement du routeur a échoué");
        return (1);
    }

}