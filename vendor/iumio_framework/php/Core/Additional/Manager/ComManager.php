<?php

namespace iumioFramework\Core\Console;

/**
 * Class ComManager
 * @package iumioFramework\Core\Console
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class ComManager
{
    static private $fileCommand;

    /** Get command file content
     * @return \stdClass File content
     */
    static public function getFileCommand():\stdClass
    {
        return ((self::$fileCommand == NULL)? self::$fileCommand = json_decode(file_get_contents(getcwd().'/vendor/iumio_framework/php/Core/Additional/Manager/Configs/commands.json')) : self::$fileCommand);
    }
}