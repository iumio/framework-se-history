<?php

namespace iumioFramework\Core\Base\Json;

/**
 * Class iumioDatabaseAccess
 * @package iumioFramework\Core\Base\Json
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class JsonListener implements JsonInterface
{
    static private $file = NULL;
    static private $filepath = NULL;

    /** Open file configuration
     * @param $filepath string Filepath
     * @return \stdClass File content
     */
    public static function open(string $filepath):\stdClass
    {
        if ($filepath == self::$filepath && self::$file != NULL)
            return (self::$file);
        $a = json_decode(file_get_contents($filepath));
        self::$file = ($a == NULL ? new \stdClass() : $a);
        return ($a == NULL ? new \stdClass() : $a);
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
        if (self::$file != NULL) {
            $filepath = NULL;
            $file = NULL;
        }
        return (1);
    }

}