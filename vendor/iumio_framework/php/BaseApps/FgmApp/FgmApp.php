<?php

namespace FgmApp;

use iumioFramework\Core\Requirement\iumioAppBaseModel as BaseApp;

/**
 * Class FgmApp
 * @package FgmApp
 */

class FgmApp extends BaseApp
{

    /** Enable iumio FGM
     * @return int FGM status
     */
    static public final function on():int
    {
        if (self::$start == 0) self::$start = 1;
        return (self::$start);
    }

    /** Disable iumio FGM
     * @return int FGM status
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
