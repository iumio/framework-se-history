<?php

$loader = require __DIR__.'/../vendor/iumio_framework/php/Core/Requirement/iumoEngineAutoloader.php';
iumoEngineAutoloader::$env = "DEV";

use iumioFramework\Core\Base\{iumioEnvironment, Debug\Debug, Http\HttpListener};
use iumioFramework\Apps\AppCore;
use ManagerApp\ManagerApp as GManager;
use iumioFramework\Core\Additionnal\TaskBar\iumioTaskBar as TB;

/**
 * Class Dev
 * iumio Class for development environment
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class Dev extends iumioEnvironment
{

    /** Start Application
     * @return int Is Ready
     */
    static public function start():int
    {
        parent::definer('DEV');
        if (self::hostAllowed() == 1) {
            $core = new AppCore('DEV', true);
            Debug::enabled();
            GManager::on();
            TB::switchStatus("on");
            $request = HttpListener::createFromGlobals();
            $core->dispatch($request);
            return (1);
        }
        return (0);
    }
}

// Enable the application
Dev::start();
