<?php

/*
 * This is an iumio Framework component
 *
 * (c) RAFINA DANY <dany.rafina@iumio.com>
 *
 * iumio Framework - iumio Components
 *
 * To get more information about licence, please check the licence file
 */

namespace iumioFramework\Core\Base\Debug;

/**
 * Interface DebugInterface
 * @package iumioFramework\Core\Base\Debug
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */

interface DebugInterface
{
    /**
     * @param string $message Log message
     * @param string $interface Manner to output log
     * @return bool
     */
    public static function output(string $message, string $interface = 'file'):bool;

    /**
     * @param string $message Message for log
     * @return bool
     */
    public static function input(string $message):bool;

    /** Enable log feature
     * @return bool
     */
    public static function enabled():bool;

    /** Disable log feature
     * @return bool
     */
    public static function disabled():bool;
}
