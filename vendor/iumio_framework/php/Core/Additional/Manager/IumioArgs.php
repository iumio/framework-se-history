<?php

namespace IumioFramework\Core\Additionnal\Console\Manager;
use IumioFramework\Core\Base\Debug\Debug;
use IumioFramework\Core\Additionnal\Console\Manager\Display\IumioManagerOutput as Output;


/**
 * Class IumioArgs
 * @package IumioFramework\Core\Additionnal\Console\Manager
 */

class IumioArgs
{

    /**
     * @param int $argc
     * @param array $argv
     */
    public function getArgs(int $argc, array $argv)
    {
        if ($argc == 1)
            Output::display("Hello World");
    }
}