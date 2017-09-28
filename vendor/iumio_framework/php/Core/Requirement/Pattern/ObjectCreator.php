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
 */
class ObjectCreator
{

    /** Create an object with specific class name
     * @param string $classname Class name
     * @param mixed $options If constructor have somes parameters
     * @return mixed The class instance
     */
    final static public function create(string $classname, $options)
    {
        return (new $classname($options));
    }
}