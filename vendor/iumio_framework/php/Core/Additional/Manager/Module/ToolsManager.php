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

namespace iumioFramework\Additional\Manager\Module;

/**
 * Class ToolsManager
 * @package iumioFramework\Core\Console\Module
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <danyrafina@gmail.com>
 */
class ToolsManager
{
    /**
     * A version of in_array() that does a sub string match on $needle
     *
     * @param  mixed   $needle    The searched value
     * @param  array   $haystack  The array to search in
     * @return mixed
     */
    protected function strlikeInArray($needle, array $haystack)
    {
        foreach ($haystack as $one => $value) {
            if (strpos($value, $needle) !== false) {
                return ($value);
            }
        }
        return (null);
    }
}