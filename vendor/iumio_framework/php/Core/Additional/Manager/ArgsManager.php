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

namespace iumioFramework\Core\Console;

use iumioFramework\Core\Requirement\Relexion\FrameworkReflexion as Reflex;
use iumioFramework\Core\Console\ComManager as File;
use iumioFramework\Core\Console\Display\OutputManager as Output;

/**
 * Class ArgsManager
 * @package iumioFramework\Core\Console
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <danyrafina@gmail.com>
 */

class ArgsManager
{

    static public $option = array();
    protected $fileCommand = null;

    /**
     * ArgsManager constructor.
     */
    public function __construct()
    {
        $this->fileCommand = File::getFileCommand();
    }

    /** Get prompt arguments
     * @param int $argc Argument number
     * @param array $argv Arguments
     */
    public function getArgs(int $argc, array $argv)
    {
        if ($argc == 1) {
            Output::displayAsNotice("Welcome to the Framework Console Manager \n  
            I noticed that you didn't enter any parameters. \n  
            For more information, you can use the help command to get a command list.");
        }

        $c = $this->searchCommand($argv[1]);
        if (empty($c)) {
            Output::displayAsError("Framework Console Manager Error : Command not found.\n
             For more information, you can use the help command to get a command list.");
        }

        $ref = new Reflex();
        $ref->__simple($c['class'], (($argc >= 3)? $argv : array()));
    }


    /** Search a command name
     * @param string $name Command name
     * @return array Search result as an array
     * @throws \Exception Exception will generate of is an empty file
     */
    protected function searchCommand(string $name):array
    {
        $f = $this->fileCommand;
        $finalC = array();
        if ($f == null) {
            throw new \Exception("Framework Console Arguments Error : Command File is empty ");
        }
        $commands = $f->commands;

        foreach ($commands as $command => $val) {
            if ($command == $name) {
                return (array("name" => $command, "class" => $val->class, "desc" => $val->desc));
            }
        }
        return ($finalC);
    }
}
