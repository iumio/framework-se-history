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


namespace FServiceApp;

use iumioFramework\Core\Requirement\AppBaseModel as BaseApp;

/**
 * Class FServiceApp
 * @package FServiceAp
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */

class FServiceApp extends BaseApp
{

    /** Enable iumio Service Manager
     * @return int Manager status
     */
    final public static function on():int
    {
        if (self::$start == 0) {
            self::$start = 1;
        }
        return (self::$start);
    }

    /** Disable iumio Service Manager
     * @return int Manager status
     */
    final public static function off():int
    {
        if (self::$start == 1) {
            self::$start = 0;
        }
        return (self::$start);
    }

    /** Return if base app is started
     * @return int Status
     */
    final public static function baseStatus():int
    {
        return (self::$start);
    }

    public function __construct()
    {
        $this->setBaseApp(1);
    }
}
