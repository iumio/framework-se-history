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
        Output::displayAsSuccess("Hey, this is all available commands", "none");
        foreach ($commands as $command => $val)
            Output::displayAsSuccess($command.": ".$val->desc, "none");
    }

    public function __alter()
    {
        // TODO: Implement __alter() method.
    }


    public function __construct(array $options = array())
    {
        if (empty($options))
            $this->__render();

    }

}