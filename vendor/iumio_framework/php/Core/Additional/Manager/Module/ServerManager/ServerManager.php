<?php


/**
 *
 *  * This is an iumio Framework component
 *  *
 *  * (c) RAFINA DANY <danyrafina@gmail.com>
 *  *
 *  * iumio Framework - iumio Components
 *  *
 *  * To get more information about licence, please check the licence file
 *
 */

namespace iumioFramework\Core\Console\Module\Server;

use iumioFramework\Additional\Manager\Module\ToolsManager;
use iumioFramework\Core\Base\File\FileListener;
use iumioFramework\Core\Base\Json\JsonListener;
use iumioFramework\Core\Console\CoreManager;
use iumioFramework\Core\Console\Display\OutputManager as Output;
use iumioFramework\Core\Console\Module\ModuleManager;
use iumioFramework\HttpRoutes\JsRouting;

/**
 * Class ServerManager
 * @package iumioFramework\Core\Console\Module\Cache
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <danyrafina@gmail.com>
 */

class ServerManager extends ToolsManager implements ModuleManager
{
    protected $options;

    /**
     * @return mixed|void
     * @throws \iumioFramework\Exception\Server\Server500
     */
    public function __render()
    {
        if (empty($this->options)) {
            Output::displayAsError("Server Manager Module Error : You must to specify an option [start]\n");
        }
        $opt = $this->options[2] ?? null;
        if ($opt == "start") {
            return ($this->runServer());
        } else {
            Output::displayAsError("Server Manager Module Error : Option is not exist.
             Referer to help command to get options list\n");
        }
    }

    /**
     * Run the development server
     * @throws \iumioFramework\Exception\Server\Server500
     */
    private function runServer()
    {
        if ($this->getCurrentEnv() === "dev") {
            Output::displayAsSuccess("Running , I will build the JS Routing file", "none");
        }
        else {
            Output::displayAsError("Server Manager : Cannot run development server when production 
            environment was settled by default.\n Please set development environment to use server.");
        }
        /*Output::displayAsSuccess("Runni, I will build the JS Routing file", "none");
        $rt = new JsRouting($isbaseapp);
        $rt->build();
        if ($this->strlikeInArray("--noexit", $this->options) != null) {
            Output::displayAsEndSuccess("Build the JS Routing File is a success.", "none");
        } else {
            Output::displayAsNormal("Build the JS Routing File is a success.");
        }*/
    }

    public function __alter()
    {
        // TODO: Implement __alter() method.
    }

    public function __construct(array $options = array())
    {
        CoreManager::setCurrentModule("Server Manager");
        if (empty($options)) {
            $this->__render();
        } else {
            $this->options = $options;
            $this->__render();
        }
    }
}
