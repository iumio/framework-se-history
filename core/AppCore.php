<?php

namespace IumioFramework\Apps;
use IumioFramework\Core\Additionnal\Console\Manager\IumioCommandFile;
use IumioFramework\Core\Additionnal\Server\IumioServerManager;
use IumioFramework\Core\Requirement\IumioUltimaCore;
use IumioFramework\Core\Base\Http\HttpListener;
use IumioFramework\Theme\Server\Server;
use IumioFramework\Theme\Server\Server404;

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

    public function registerApps():array
    {
        $classes = $this->getClassFile();

        if (count((array)$classes) == 0)  new Server404(new \ArrayObject(array("code" => "000", "codeTitle" => "No app registered", "explain" => "No app was registered to apps.json", "solution" => "Please create an app with app-manager (php core/manager app-manager new-project)")));
        $apps = array();
        foreach ($classes as $class => $val) {
            $val = (array)$val;
            $apps[$val['name']] =  array("isdefault" =>$val['isdefault'],  "appclass" => new $val['class']());
        }
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