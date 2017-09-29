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


namespace ManagerApp;

use iumioFramework\Core\Requirement\AppBaseModel as BaseApp;

/**
 * Class ManagerApp
 * @package FgmApp
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <danyrafina@gmail.com>
 */

class ManagerApp extends BaseApp
{

    /** Enable iumio Manager
     * @return int Manager status
     */
    final public static function on():int
    {
        if (self::$start == 0) {
            self::$start = 1;
        }
        return (self::$start);
    }

    /** Disable iumio Manager
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
