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

    public static function open($filepath):\stdClass
    {
        if ($filepath == self::$filepath && self::$file != NULL)
            return (self::$file);
        $a = json_decode(file_get_contents($filepath));
        return ($a == NULL ? new \stdClass() : $a);
    }

    public static function close($filepath):int
    {
        if (self::$file != NULL) {
            $filepath = NULL;
            $file = NULL;
        }
        return (1);
    }

}