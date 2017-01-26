<?php

namespace IumioFramework\Manager\Console\Module\Help;
use IumioFramework\Core\Additionnal\Console\Manager\IumioCommandFile as File;
use IumioFramework\Core\Additionnal\Console\Manager\Display\IumioManagerOutput as Output;

/**
 * Class IumioManagerHelp
 * @package IumioFramework\Core\Additionnal\Console\Manager\Help
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class IumioManagerHelp
{
    protected $options;

    public function commandListRender()
    {
        $f = File::getFileCommand();
        if ($f == NULL)
            throw new \Exception("Iumio Args Error : Command File is empty ");
        $commands = $f->commands;

        foreach ($commands as $command => $val) {
            print_r($command);
        }
    }

    public function __construct(array $options)
    {
        if (empty($options))
            $this->commandListRender();

    }

}