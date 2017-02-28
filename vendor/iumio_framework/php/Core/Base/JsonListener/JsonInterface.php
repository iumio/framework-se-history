<?php

namespace IumioFramework\Core\Base\Json;

/**
 * Interface
 * @package IumioFramework\Core\Base\Json
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

interface JsonInterface
{

    /** Open configuration file
     * @param $filepath string
     * @return \stdClass element of file
     */
    public static function open(string $filepath):\stdClass;

    /** Close configuration file
     * @param $filepath string File path
     * @return int Is closed
     */
    public static function close(string $filepath):int;


}