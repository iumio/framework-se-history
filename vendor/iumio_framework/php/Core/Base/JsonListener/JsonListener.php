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

namespace iumioFramework\Core\Base\Json;

/**
 * Class iumioDatabaseAccess
 * @package iumioFramework\Core\Base\Json
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <danyrafina@gmail.com>
 */

class JsonListener implements JsonInterface
{
    static private $file = null;
    static private $filepath = null;

    /** Open file configuration
     * @param $filepath string Filepath
     * @return \stdClass File content
     */
    public static function open(string $filepath):\stdClass
    {
        if ($filepath == self::$filepath && self::$file != null) {
            return (self::$file);
        }
        $a = json_decode(file_get_contents($filepath));
        self::$file = ($a == null ? new \stdClass() : $a);
        return ($a == null ? new \stdClass() : $a);
    }

    /** Put content in configuration file
     * @param $filepath string File path
     * @param $content string new file content
     * @return int success
     */
    public static function put(string $filepath, string $content):int
    {
        file_put_contents($filepath, $content);
        self::open($filepath);
        return (1);
    }

    /** Close file configuration
     * @param string $filepath File path
     * @return int Is file closed
     */
    public static function close(string $filepath):int
    {
        if (self::$file != null) {
            $filepath = null;
            $file = null;
        }
        return (1);
    }
}
