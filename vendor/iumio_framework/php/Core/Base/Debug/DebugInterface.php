<?php

namespace IumioFramework\Core\Base\Debug;

/**
 * Interface DebugInterface
 * @package IumioFramework\Core\Base\Debug
 */

interface DebugInterface
{
    /**
     * @param string Log message
     * @param string $interface Manner to output log
     * @return bool
     */
    static public function output($message, $interface = 'file'):bool;

    /**
     * @param $message Message for log
     * @return bool
     */
    static public function input($message):bool;

    /** Enable log feature
     * @return bool
     */
    static function enabled():bool;

    /** Disable log feature
     * @return bool
     */
    static function disabled():bool;
}