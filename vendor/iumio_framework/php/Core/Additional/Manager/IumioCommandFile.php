<?php

namespace IumioFramework\Core\Additionnal\Console\Manager;

/**
 * Class IumioCommandFile
 * @package IumioFramework\Core\Additionnal\Console\Manager
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class IumioCommandFile
{
    static private $fileCommand;

    /** Get command file content
     * @return \stdClass File content
     */
    static public function getFileCommand():\stdClass
    {
        return ((self::$fileCommand == NULL)? self::$fileCommand = json_decode(file_get_contents(getcwd().'/vendor/iumio_framework/php/Core/Additional/Manager/command.json')) : self::$fileCommand);
    }
}