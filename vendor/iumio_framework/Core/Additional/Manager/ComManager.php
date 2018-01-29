<?php

/**
 *
 *  * This is an iumio Framework component
 *  *
 *  * (c) RAFINA DANY <danyrafina@gmail.com>
 *  *
 *  * iumio Framework - iumio Components
 *  *
 *  * To get more information about licence, please check the licence file
 *
 */

namespace iumioFramework\Core\Console;

/**
 * Class ComManager
 * @package iumioFramework\Core\Console
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */

class ComManager
{
    static private $fileCommand;

    /** Get command file content
     * @return \stdClass File content
     */
    public static function getFileCommand():\stdClass
    {
        return ((self::$fileCommand == null)? self::$fileCommand = json_decode(file_get_contents(getcwd().
            '/vendor/iumio_framework/Core/Additional/Manager/Configs/commands.json')) : self::$fileCommand);
    }
}
