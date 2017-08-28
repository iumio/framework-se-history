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


namespace FServiceApp;

use iumioFramework\Core\Requirement\iumioAppBaseModel as BaseApp;

/**
 * Class FServiceApp
 * @package FServiceApp
 */

class FServiceApp extends BaseApp
{

    /** Enable iumio Service Manager
     * @return int Manager status
     */
    static public final function on():int
    {
        if (self::$start == 0) self::$start = 1;
        return (self::$start);
    }

    /** Disable iumio Service Manager
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
