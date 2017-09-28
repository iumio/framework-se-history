<?php

/*
 *
 * This is an iumio Framework component
 *
 * (c) RAFINA DANY <danyrafina@gmail.com>
 *
 * iumio Framework - iumio Components
 *
 * To get more information about licence, please check the licence file
 *
 */

namespace iumioFramework\Core\Requirement\Patterns;

/**
 * Class SingletonPattern
 * This class is a Singleton Pattern
 * @package iumioFramework\Core\Requirement\Patterns
 */
abstract class SingletonPattern
{
    /** @var array List of Class instances */
    private static $_instances = array();

    /** Get an instance of the class
     *
     * @return SingletonPattern The new class instance
     */
    final static public function getInstance():self
    {
        $class = get_called_class();
        if (!isset(self::$_instances[$class]))
            self::$_instances[$class] = new $class();
        return (self::$_instances[$class]);
    }

    /**
     * Clone method has private to prevent the cloning instance
     * @return null
     */
    final private function __clone()
    {
        // UNUSED
        return (null);
    }
    /**
     * is declared as private to prevent unserializing
     * of an instance of the class via the global function unserialize()
     * @return null
     */
    final private function __wakeup()
    {
        // UNUSED
        return (null);
    }
}