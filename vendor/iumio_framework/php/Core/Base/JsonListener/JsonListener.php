<?php

namespace IumioFramework\Core\Base\Json;

/**
 * Class IumioDatabaseAccess
 * @package IumioFramework\Core\Base\Json
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
        return ($a == NULL ? new \stdClass() : $a);
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