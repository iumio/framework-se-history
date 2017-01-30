<?php

namespace IumioFramework\Manager\Console\Module\Help;
use IumioFramework\Core\Additionnal\Console\Manager\IumioCommandFile as File;
use IumioFramework\Core\Additionnal\Console\Manager\Display\IumioManagerOutput as Output;
use IumioFramework\Manager\Console\Module\IumioManagerModule as ModuleInterface;

/**
 * Class IumioManagerHelp
 * @package IumioFramework\Core\Additionnal\Console\Manager\Help
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class IumioManagerHelp implements ModuleInterface
{
    protected $options;

    public function __render()
    {
        $f = File::getFileCommand();
        if ($f == NULL)
            throw new \Exception("Iumio Args Error : Command File is empty ");
        $commands = $f->commands;
        if (empty($this->options)) {
            Output::displayAsSuccess("Hey, this is all available commands", "none");
            foreach ($commands as $command => $val)
                Output::displayAsSuccess($command . ": " . $val->desc, "none");
        }
        else
        {
            $opt = $this->options[2] ?? null;
            if ($opt == null)
                throw new \Exception("Iumio Module Manager Help Error : No option are available");

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