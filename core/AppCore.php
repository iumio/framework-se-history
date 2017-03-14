<?php

namespace IumioFramework\Apps;
use IumioFramework\Core\Requirement\IumioUltimaCore;
use IumioFramework\Core\Base\Http\HttpListener;
use IumioFramework\Theme\Server\Server000;

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

    /**
     * @param HttpListener $request
     * @return int
     */
    public function dispatch(HttpListener $request):int
    {
        return (parent::dispatching($request));
    }
}