<?php

/*
 * This is an iumio Framework component
 *
 * (c) RAFINA DANY <dany.rafina@iumio.com>
 *
 * iumio Framework - iumio Components
 *
 * To get more information about licence, please check the licence file
 */

namespace iumioFramework\Core\Base\Json;

use iumioFramework\Core\Additionnal\Server\ServerManager;
use iumioFramework\Exception\Server\Server500;

/**
 * Class JsonListener
 * @package iumioFramework\Core\Base\Json
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */

class JsonListener implements JsonInterface
{
    static private $file = null;
    static private $filepath = null;

    /** Open file configuration
     * @param $filepath string Filepath
     * @return \stdClass File content
     * @throws 5Server500 If file does not exist or not readable
     */
    public static function open(string $filepath):\stdClass
    {
        if ($filepath == self::$filepath && self::$file != null) {
            return (self::$file);
        }

        if (!file_exists($filepath)) {
            throw new Server500(new \ArrayObject(array("explain" => "Cannot open file $filepath : File does not exit",
                "solution" => "Please set the correct filepath")));
        }

        if (!is_readable($filepath)) {
            throw new Server500(new \ArrayObject(array("explain" => "Cannot open file $filepath : File not readable",
                "solution" => "Please set the correct permission")));
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
        if (!file_exists($filepath)) {
            ServerManager::create($filepath, "file");
        }
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
