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

namespace iumioFramework\Core\Console\Module\Rt;

use iumioFramework\Additional\Manager\Module\ToolsManager;
use iumioFramework\Core\Console\CoreManager;
use iumioFramework\Core\Console\Display\OutputManager as Output;
use iumioFramework\Core\Console\Module\ModuleManager;
use iumioFramework\HttpRoutes\JsRouting;

/**
 * Class RtManager
 * @package iumioFramework\Core\Console\Module\Cache
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <danyrafina@gmail.com>
 */

class RtManager extends ToolsManager implements ModuleManager
{
    protected $options;

    public function __render()
    {
        if (empty($this->options)) {
            Output::displayAsError("Rt Manager Module Error : You must to specify an option\n");
        }
        $opt = $this->options[2] ?? null;
        if ($opt == "build") {
            $opt = $this->options[3] ?? null;
            $opt4 = $this->options[4] ?? null;
            if ($opt == "jsrouting" &&  $opt4 != "--baseapp") {
                $this->buildJsRouting();
            } elseif ($opt == "jsrouting" && $opt4 == "--baseapp") {
                $this->buildJsRouting(true);
            } else {
                Output::displayAsError("Rt Manager Module Error : Bad option\n");
            }
        } else {
            Output::displayAsError("RT Manager Module Error : Option is not exist.
             Referer to help command to get options list\n");
        }
    }

    /** Build the JS Routing file
     * @param bool $isbaseapp If a base app
     */
    private function buildJsRouting(bool $isbaseapp = false)
    {
        Output::displayAsSuccess("Hey, I will build the JS Routing file", "none");
        $rt = new JsRouting($isbaseapp);
        $rt->build();
        if ($this->strlikeInArray("--noexit", $this->options) != null) {
            Output::displayAsEndSuccess("Build the JS Routing File is a success.", "none");
        } else {
            Output::displayAsNormal("Build the JS Routing File is a success.");
        }
    }

    public function __alter()
    {
        // TODO: Implement __alter() method.
    }

    public function __construct(array $options = array())
    {
        CoreManager::setCurrentModule("Rt Manager");
        if (empty($options)) {
            $this->__render();
        } else {
            $this->options = $options;
            $this->__render();
        }
    }
}
