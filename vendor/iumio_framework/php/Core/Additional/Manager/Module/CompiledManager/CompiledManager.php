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

namespace iumioFramework\Core\Console\Module\Compiled;

use iumioFramework\Additional\Manager\Module\ToolsManager;
use iumioFramework\Core\Additionnal\Server\ServerManager as Server;
use iumioFramework\Core\Console\CoreManager;
use iumioFramework\Core\Console\Display\OutputManager as Output;
use iumioFramework\Core\Console\Module\ModuleManager;

/**
 * Class CompiledManager
 * @package iumioFramework\Core\Console\Module\Compiled
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */

class CompiledManager extends ToolsManager implements ModuleManager
{
    protected $options;

    public function __render()
    {
        if (empty($this->options)) {
            Output::displayAsError("Compiled Manager Module Error : You must to specify an option\n");
        }
        $opt = $this->options[2] ?? null;
        if ($opt == "--clear") {
            $opt = $this->options[3] ?? null;
            if ($opt == null) {
                $this->deleteCompiled("dev");
            } elseif ($opt == "--env=dev" || $opt == "--env=DEV") {
                $this->deleteCompiled("dev", "yes");
            } elseif ($opt == "--env=prod" || $opt == "--env=PROD") {
                $this->deleteCompiled("prod", "yes");
            } elseif ($opt == "--env=all" || $opt == "--env=ALL") {
                $this->deleteAllCompiled();
            } else {
                Output::displayAsError("Compiled Manager Module Error : Bad option\n");
            }
        } else {
            Output::displayAsError("Compiled Manager Module Error : Option is not exist. 
            Referer to help command to get options list\n");
        }
    }

    /** Delete a Compiled from a specific environment
     * @param string $env Environment name
     * @param string $isdefault If no environment option
     */
    private function deleteCompiled(string $env, string $isdefault = null)
    {
        Output::displayAsSuccess("Hey, I delete compiled from $env environment ", "none");
        $this->callDelCreaServer($env);
        if ($this->strlikeInArray("--noexit", $this->options) != null) {
            Output::displayAsEndSuccess("Compiled delete for $env environment(s) is successfull.", "none");
        } else {
            Output::displayAsNormal("Compiled delete for $env environment(s) is successfull.");
        }

    }

    /** Call Server delete and create function
     * @param string $env Environment name
     */
    private function callDelCreaServer(string $env)
    {
        Server::delete(ROOT_COMPILED.$env, 'directory');
        Server::create(ROOT_COMPILED.$env, 'directory');
    }

    /** Delete a compiled for all environment
     */
    private function deleteAllCompiled()
    {
        $a = array("dev", "prod");
        Output::displayAsSuccess("Hey, I delete compiled for all environment", "none");
        for ($i = 0; $i < count($a); $i++) {
            $this->callDelCreaServer($a[$i]);
        }
        if ($this->strlikeInArray("--noexit", $this->options) != null) {
            Output::displayAsEndSuccess("Compiled was deleted for all environment.", "none");
        } else {
            Output::displayAsNormal("Compiled was deleted for all environment.");
        }
    }



    public function __alter()
    {
        // TODO: Implement __alter() method.
    }

    public function __construct(array $options = array())
    {
        CoreManager::setCurrentModule("Compiled Manager");
        if (empty($options)) {
            $this->__render();
        } else {
            $this->options = $options;
            $this->__render();
        }
    }
}
