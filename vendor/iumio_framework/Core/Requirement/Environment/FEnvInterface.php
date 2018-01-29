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

namespace iumioFramework\Requirement\Environment;

/**
 * Interface FEnvInterface
 * This interface allow to apply the function for the subclass
 * @package iumioFramework\Requirement\Environment;
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */
interface FEnvInterface
{
    /** Get a path value in framework_path
     * @param string $param Parameter name (index name)
     * @return mixed The path value
     * @throws Server500 If parameter name does not exist
     */
    public static function get(string $param);

    /**
     * Set or edit path value in framework_path
     * @param $index string The path name
     * @param $value mixed The path value (not only a string)
     * @return int The adding success
     */
    public static function set(string $index, $value):int;

    /**
     * Check if element is isset in path framework
     * @param string $index Element index
     * @return bool The result of isset (false : not isset; true : is isset)
     */
    public static function isset(string $index):bool;

    /**
     * Remove an element by index
     * @param string $index Element index
     * @return int If element is removed
     *
     */
    public static function remove(string $index):int;
}