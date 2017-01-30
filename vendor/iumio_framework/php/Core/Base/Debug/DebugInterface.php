<?php

namespace IumioFramework\Core\Base\Debug;

/**
 * Interface DebugInterface
 * @package IumioFramework\Core\Base\Debug
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

interface DebugInterface
{
    /**
     * @param string Log message
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