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

$loader = require __DIR__.'/../vendor/iumio_framework/php/Core/Requirement/EngineAutoloader.php';
EngineAutoloader::$env = "DEV";

use iumioFramework\Core\Base\{iumioEnvironment, Debug\Debug, Http\HttpListener};
use iumioFramework\Apps\AppCore;
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
