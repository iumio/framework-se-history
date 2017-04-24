<?php

namespace iumioFramework\Manager\Console\Module\Help;
use iumioFramework\Core\Additionnal\Console\Manager\iumioCommandFile as File;
use iumioFramework\Core\Additionnal\Console\Manager\Display\iumioManagerOutput as Output;
use iumioFramework\Manager\Console\Module\iumioManagerModule as ModuleInterface;

/**
 * Class HelpManager
 * @package iumioFramework\Core\Additionnal\Console\Manager\Help
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class HelpManager implements ModuleInterface
{
    protected $options;

    public function __render()
    {
        $f = File::getFileCommand();
        if ($f == NULL)
            Output::displayAsError("iumio Args Error : Command File is empty ", "none");
        $commands = $f->commands;
        if (empty($this->options)) {
            $str = "Hey, this is available commands\n";
            foreach ($commands as $command => $val)
                $str = $str.$command . ": " . $val->desc."\n---------\n";
            Output::displayAsSuccess($str, "none");
        }
        else
        {
            $opt = $this->options[2] ?? null;
            if ($opt == null)
                throw new \Exception("iumio Module Manager Help Error : No option are available");

            $i = 0;

            foreach ($commands as $command => $val)
            {
                if ($opt == $command) {
                    Output::displayAsSuccess($command . ": " . $val->desc, "yes");
                    $i++;
                }
            }
            if ($i == 0)
                Output::displayAsError("Command $opt not found", "yes");
        }
    }

    public function __alter()
    {
        // TODO: Implement __alter() method.
    }


    public function __construct(array $options = array())
    {
        if (empty($options))
            $this->__render();
        else
        {
            $this->options = $options;
            $this->__render();
        }

    }

}