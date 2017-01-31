<?php

namespace IumioFramework\Apps;
use IumioFramework\Core\Requirement\IumioUltimaCore;
use IumioFramework\Core\Base\Http\HttpListener;

/**
 * Class AppCore
 * @package IumioFramework\Apps
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
            "Default2App" => array("hasdefault" => new \Default2App\Default2App())
        );
        return $apps;
    }

    /*public function getPrimary()
    {

    }*/


    /**
     * @param HttpListener $request
     * @return int
     */
    public function dispatch(HttpListener $request):int
    {
        return (parent::dispatching($request));
    }
}