<?php

namespace IumioFramework\Core\Additionnal\Console\Manager;
use IumioFramework\Core\Base\Debug\Debug;
use IumioFramework\Core\Additionnal\Console\Manager\Display\IumioManagerOutput as Output;


/**
 * Class IumioArgs
 * @package IumioFramework\Core\Additionnal\Console\Manager
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class IumioArgs
{

   static public $option = array();

    /** Get prompt arguments
     * @param int $argc Argument number
     * @param array $argv Arguments
     */
    public function getArgs(int $argc, array $argv)
    {
        if ($argc == 1)
            Output::displayAsNotice("Welcome to Iumio Console Manager \n I noticed that you didn't enter any parameters. \n For more information, you can use the --help command to get a command list.", "red", "black");
    }

    /** Get matches arguments
     * @param int $argc Argument number
     * @param array $argv Arguments
     */
    protected function matches(int $argc, array $argv)
    {
        // TO DO
    }
}