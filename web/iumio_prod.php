<?php

$loader = require __DIR__.'/../vendor/iumio_framework/php/Core/Requirement/iumoEngineAutoloader.php';
iumoEngineAutoloader::$env = "PROD";

use iumioFramework\Core\Base\{iumioEnvironment, Debug\Debug, Http\HttpListener};
use iumioFramework\Apps\AppCore;
use ManagerApp\ManagerApp as GManager;

/**
 * Class iumioProd
 * iumio Class for production environment
 * @author RAFINA Dany <danyrafina@gmail.com>
 */
class iumioProd extends iumioEnvironment
{

    /** Start Application
     * @return int Is Ready
     */
    static public function start():int
    {

        parent::definer('PROD');
        // This check prevents access to debug front controllers that are deployed by accident to production servers.
        // Feel free to remove this, extend it, or make something more sophisticated.
        if (isset($_SERVER['HTTP_CLIENT_IP'])
            || isset($_SERVER['HTTP_X_FORWARDED_FOR'])
            || (in_array(@$_SERVER['REMOTE_ADDR'], array('127.0.0.1', 'fe80::1', '::1'))
                || php_sapi_name() === 'cli-server'))
        {
            parent::displayError(array("solution" => 'Check '.basename(__FILE__).' for more information.'));
            return (1);
        }

        $core = new AppCore('PROD', true);
        Debug::enabled();
        GManager::off();
        $request = HttpListener::createFromGlobals();
        $core->dispatch($request);
        //  array('127.0.0.2', 'fe80::1', '::1')

        return (1);
    }
}

// Enable the application
iumioProd::start();
