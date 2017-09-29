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

namespace iumioFramework\Core\Console\Module\Autoloader;

use iumioFramework\Core\Additionnal\Server\ServerManager as Server;
use iumioFramework\Core\Console\CoreManager;
use iumioFramework\Core\Console\Display\OutputManager as Output;
use iumioFramework\Core\Console\Module\ModuleManager;
use iumioFramework\Core\Requirement\EngineAutoloader;

/**
 * Class AutoloaderManager
 * @package iumioFramework\Core\Console\Module\Autoloader
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <danyrafina@gmail.com>
 */

class AutoloaderManager implements ModuleManager
{
    protected $options;

    public function __render()
    {
        if (empty($this->options)) {
            Output::displayAsError("Autoloader Manager Module Error : You must to specify an option\n");
        }
        $opt = $this->options[2] ?? null;
        if ($opt == "--clear") {
            $opt = $this->options[3] ?? null;
            if ($opt == null || $opt == "--env=prod" || $opt == "--env=PROD") {
                $this->deleteClassMap();
            } else {
                Output::displayAsError("Autoloader Manager Module Error : Bad option\n");
            }
        } elseif ($opt == "--build") {
            $opt = $this->options[3] ?? null;
            if ($opt == null) {
                $this->buildClassMap("dev");
            } elseif ($opt == "--env=dev" || $opt == "--env=DEV") {
                $this->buildClassMap("dev");
            } elseif ($opt == "--env=prod" || $opt == "--env=PROD") {
                $this->buildClassMap("prod");
            } elseif ($opt == "--env=all" || $opt == "--env=ALL") {
                $this->buildClassMap("dev");
                $this->buildClassMap("prod");
            } else {
                Output::displayAsError("Cache Manager Module Error : Bad option\n");
            }
        } else {
            Output::displayAsError("Autoloader Manager Module Error : Option is not exist.
            Referer to help command to get options list\n");
        }
    }

    /** Delete the class map dedicated to autoloader for production environement
     */
    private function deleteClassMap()
    {
        Output::displayAsSuccess("Hey, I delete the class map from production environment ", "none");
        Server::delete(CONFIG_DIR."engine_autoloader/map_class.json", 'file');
        @Server::create(CONFIG_DIR."engine_autoloader/map_class.json", 'file');
        Output::displayAsNormal("Class map for production environment has been deleted.");
    }


    /** Build the class map dedicated to autoloader for production environement
     * @param $env string The environment name
     */
    private function buildClassMap(string $env)
    {
        Output::displayAsSuccess("Hey, I will build the class map from $env environment ", "none");
        $env = strtolower($env);
        EngineAutoloader::buildClassMap($env);
        Output::displayAsNormal("Class map for $env environment has been built.");
    }


    public function __alter()
    {
        // TODO: Implement __alter() method.
    }

    public function __construct(array $options = array())
    {
        CoreManager::setCurrentModule("Autoloader Manager");
        if (empty($options)) {
            $this->__render();
        } else {
            $this->options = $options;
            $this->__render();
        }
    }
}
