<?php

namespace ManagerApp;

use iumioFramework\Core\Requirement\iumioAppBaseModel as BaseApp;

/**
 * Class ManagerApp
 * @package FgmApp
 */

class ManagerApp extends BaseApp
{

    /** Enable iumio Manager
     * @return int Manager status
     */
    static public final function on():int
    {
        if (self::$start == 0) self::$start = 1;
        return (self::$start);
    }

    /** Disable iumio Manager
     * @return int Manager status
     */
    static public final function off():int
    {
        if (self::$start == 1) self::$start = 0;
        return (self::$start);
    }

    /** Return if base app is started
     * @return int Status
     */
    static public final function baseStatus():int
    {
        return (self::$start);
    }

    public function __construct()
    {
        $this->setBaseApp(1);
    }

}
