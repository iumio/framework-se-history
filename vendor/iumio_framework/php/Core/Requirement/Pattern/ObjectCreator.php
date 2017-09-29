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

namespace iumioFramework\Core\Requirement\Patterns;

/**
 * Class ObjectCreator
 * This class is a Factory Pattern Implementation
 * @package iumioFramework\Core\Requirement\Patterns
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <danyrafina@gmail.com>
 */
class ObjectCreator
{

    /** Create an object with specific class name
     * @param string $classname Class name
     * @param mixed $options If constructor have somes parameters
     * @return mixed The class instance
     */
    final public static function create(string $classname, $options)
    {
        return (new $classname($options));
    }
}
