<?php

/*
 * This is an iumio Framework component
 *
 * (c) RAFINA DANY <danyrafina@gmail.com>
 *
 * iumio Framework - iumio Components
 *
 * To get more information about licence, please check the licence file
 */

namespace iumioFramework\Core\Base\Debug;

/**
 * Interface DebugInterface
 * @package iumioFramework\Core\Base\Debug
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

interface DebugInterface
{
    /**
     * @param string $message Log message
     * @param string $interface Manner to output log
     * @return bool
     */
    static public function output(string $message, string $interface = 'file'):bool;

    /**
     * @param string $message Message for log
     * @return bool
     */
    static public function input(string $message):bool;

    /** Enable log feature
     * @return bool
     */
    static function enabled():bool;

    /** Disable log feature
     * @return bool
     */
    static function disabled():bool;
}