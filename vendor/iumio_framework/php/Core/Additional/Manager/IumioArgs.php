<?php

namespace IumioFramework\Core\Additionnal\Console\Manager;
use IumioFramework\Core\Base\Debug\Debug;
use IumioFramework\Core\Additionnal\Console\Manager\Display\IumioManagerOutput as Output;
use IumioFramework\Core\Requirement\Relexion\IumioReflexion as Reflex;
use IumioFramework\Core\Additionnal\Console\Manager\IumioCommandFile as File;
use IumioFramework\Core\Requirement\Relexion\IumioReflexion;

/**
 * Class IumioArgs
 * @package IumioFramework\Core\Additionnal\Console\Manager
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class IumioArgs
{

    static public $option = array();
    protected $fileCommand = NULL;

    /**
     * IumioArgs constructor.
     * Make
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
        if ($argc == 1)
            Output::displayAsNotice("Welcome to Iumio Console Manager \n I noticed that you didn't enter any parameters. \n For more information, you can use the help command to get a command list.", "red", "black");

        $c = $this->searchCommand($argv[1]);
        if (empty($c))
            Output::displayAsError("Iumio Command Error : Command not found.\n For more information, you can use the help command to get a command list.");

        $ref = new IumioReflexion();
        $ref->__simple($c['class'], (($argc >= 3)? $argv : array()));

    }

    /** Get matches arguments
     * @param int $argc Argument number
     * @param array $argv Arguments
     */
    protected function matches(int $argc, array $argv)
    {
        // TO DO
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
        if ($f == NULL)
            throw new \Exception("Iumio Args Error : Command File is empty ");
        $commands = $f->commands;

        foreach ($commands as $command => $val) {
            if ($command == $name)
                // print_r($command);
                return (array("name" => $command, "class" => $val->class, "desc" => $val->desc));
        }
        return ($finalC);
    }


}