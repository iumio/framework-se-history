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

namespace iumioFramework\Core\Base;

$loader = require __DIR__.'/../vendor/iumio_framework/php/Core/Requirement/EngineAutoloader.php';
\EngineAutoloader::$env = "PROD";

use iumioFramework\Core\Base\iumioEnvironment;
use iumioFramework\Core\Base\Debug\Debug;
use iumioFramework\Core\Base\Http\HttpListener;
use iumioFramework\Apps\AppCore;
use iumioFramework\Core\Additionnal\TaskBar\iumioTaskBar as TB;

/**
 * Class Prod
 * iumio Class for production environment
 *
 * @package  Prod
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <danyrafina@gmail.com>
 */
class Prod extends iumioEnvironment
{

    /** Start Application
     * @return int Is Ready
     */
    public static function start():int
    {
        parent::definer('PROD');
        if (self::hostAllowed() == 1) {
            $core = new AppCore('PROD', true);
            Debug::enabled();
            TB::switchStatus("off");
            $request = HttpListener::createFromGlobals();
            $core->dispatch($request);
            return (1);
        }
        return (0);
    }
}
// Enable the application
Prod::start();
