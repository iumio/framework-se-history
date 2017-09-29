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

namespace iumioFramework\Core\Console\Module\Help;

use iumioFramework\Core\Console\CoreManager;
use iumioFramework\Core\Console\Module\ModuleManager;
use iumioFramework\Core\Console\Display\OutputManager as Output;
use iumioFramework\Core\Console\ComManager as File;

/**
 * Class HelpManager
 * @package iumioFramework\Core\Console\Module\Help
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <danyrafina@gmail.com>
 */

class HelpManager implements ModuleManager
{
    protected $options;

    public function __render()
    {
        $f = File::getFileCommand();
        if ($f == null) {
            Output::displayAsError("Help Manager Error: Command File is empty ", "none");
        }
        $commands = $f->commands;
        if (empty($this->options)) {
            $str = "Hey, this is available commands\n";
            foreach ($commands as $command => $val) {
                $str = $str.$command . ": " . $val->desc."\n---------\n\n";
            }
            Output::displayAsSuccess($str, "none");
        } else {
            $opt = $this->options[2] ?? null;
            if ($opt == null) {
                throw new \Exception("Help Manager Error : No option are available");
            }

            $i = 0;

            foreach ($commands as $command => $val) {
                if ($opt == $command) {
                    Output::displayAsSuccess($command . ": " . $val->desc, "yes");
                    $i++;
                }
            }
            if ($i == 0) {
                Output::displayAsError("Command $opt not found", "yes");
            }
        }
    }

    public function __alter()
    {
        // TODO: Implement __alter() method.
    }


    public function __construct(array $options = array())
    {
        CoreManager::setCurrentModule("Help Manager");
        if (empty($options)) {
            $this->__render();
        } else {
            $this->options = $options;
            $this->__render();
        }
    }
}
