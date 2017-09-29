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

namespace iumioFramework\Core\Console\Module\Cache;

use iumioFramework\Core\Additionnal\Server\ServerManager as Server;
use iumioFramework\Core\Console\CoreManager;
use iumioFramework\Core\Console\Display\OutputManager as Output;
use iumioFramework\Core\Console\Module\ModuleManager;

/**
 * Class CacheManager
 * @package iumioFramework\Core\Console\Module\Cache
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <danyrafina@gmail.com>
 */

class CacheManager implements ModuleManager
{
    protected $options;

    public function __render()
    {
        if (empty($this->options)) {
            Output::displayAsError("Cache Manager Module Error : You must to specify an option\n");
        }
        $opt = $this->options[2] ?? null;
        if ($opt == "--clear") {
            $opt = $this->options[3] ?? null;
            if ($opt == null) {
                $this->deleteCache("dev");
            } elseif ($opt == "--env=dev" || $opt == "--env=DEV") {
                $this->deleteCache("dev", "yes");
            } elseif ($opt == "--env=prod" || $opt == "--env=PROD") {
                $this->deleteCache("prod", "yes");
            } elseif ($opt == "--env=all" || $opt == "--env=ALL") {
                $this->deleteAllCache();
            } else {
                Output::displayAsError("Cache Manager Module Error : Bad option\n");
            }
        } else {
            Output::displayAsError("Cache Manager Module Error : Option is not exist. 
            Referer to help command to get options list\n");
        }
    }

    /** Delete a cache from a specific environment
     * @param string $env Environment name
     * @param string $isdefault If no environment option
     */
    private function deleteCache(string $env, string $isdefault = null)
    {
        Output::displayAsSuccess("Hey, I delete cache from $env environment ", "none");
        $this->callDelCreaServer($env);
        Output::displayAsNormal("Cache delete for $env environment is successfull.");
    }

    /** Call Server delete and create function
     * @param string $env Environment name
     */
    private function callDelCreaServer(string $env)
    {
        Server::delete(ROOT_CACHE.$env, 'directory');
        Server::create(ROOT_CACHE.$env, 'directory');
    }

    /** Delete a cache for all environment
     */
    private function deleteAllCache()
    {
        $a = array("dev", "prod");
        Output::displayAsSuccess("Hey, I delete cache for all environment", "none");
        for ($i = 0; $i < count($a); $i++) {
            $this->callDelCreaServer($a[$i]);
        }
        Output::displayAsNormal("Cache was deleted for all environment.");
    }

    public function __alter()
    {
        // TODO: Implement __alter() method.
    }

    public function __construct(array $options = array())
    {
        CoreManager::setCurrentModule("Cache Manager");
        if (empty($options)) {
            $this->__render();
        } else {
            $this->options = $options;
            $this->__render();
        }
    }
}
