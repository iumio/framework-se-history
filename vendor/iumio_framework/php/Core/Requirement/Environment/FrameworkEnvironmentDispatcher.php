<?php


/**
 *
 *  * This is an iumio Framework component
 *  *
 *  * (c) RAFINA DANY <dany.rafina@iumio.com>
 *  *
 *  * iumio Framework - iumio Components
 *  *
 *  * To get more information about licence, please check the licence file
 *
 */


namespace iumioFramework\Core\Requirement\Environment;

use iumioFramework\Core\Requirement\EngineAutoloader;


/**
 * Class FrameworkEnvironmentDispatcher
 * Class for dispatch to correct environment
 *
 * @package  iumioFramework\Core\Requirement
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */
class FrameworkEnvironmentDispatcher
{

    /** Dispatch a client to a specific environment
     * Environment is based on framework.config.json => default_env [dev, prod]
     * @return int Dispatch is a success
     * @throws \Exception Environment is not valid or file framework.config.json is empty or not valid
     * @throws \iumioFramework\Exception\Server\Server500
     */
    public static function dispatch():int
    {
        // Require the iumio Framework Engine Autoloader
        $autoload = require __DIR__.
            '/../../../../../../vendor/iumio_framework/php/Core/Requirement/EngineAutoloader.php';

        // Getting File config
        $config = file_get_contents(__DIR__ .
            "/../../../../../../elements/config_files/core/framework.config.json");
        if (!$config) {
            throw new \Exception("Cannot dispatch to specific environment : 
            framework.config.json File is empty or not valid");
        }
        $config = json_decode($config);
        $env = $config->default_env;
        if (!in_array($env, array("dev", "prod"))) {
            throw new \Exception("Cannot dispatch to specific environment : 
            environment is not valid : $env");
        }

        if ($env === "dev") {
            EngineAutoloader::$env =  "DEV";
            return (DevEnvironment::start());
        }
        else {
            EngineAutoloader::$env =  "PROD";
            return (ProdEnvironment::start());
        }
    }


}