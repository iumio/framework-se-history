<?php

namespace IumioFramework\Core\Base\Json;

/**
 * Interface
 * @package IumioFramework\Core\Base\Json
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

interface JsonInterface
{

    /**
     * @param $filepath
     * @return \stdClass
     */
    public static function open($filepath):\stdClass;

    /**
     * @param $filepath
     * @return int
     */
    public static function close($filepath):int;


}