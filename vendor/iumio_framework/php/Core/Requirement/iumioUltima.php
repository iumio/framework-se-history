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

namespace iumioFramework\Core\Requirement\Ultima;

/**
 * Class iumioUltima
 * @package iumioFramework\Core\Requirement\Ultima
 * @author DANY RAFINA <danyrafina@gmail.com>
 */


abstract class iumioUltima
{
    protected static $core;
    protected static $app_master;

    /**
     * @return mixed
     */
    public static function getCore()
    {
        return self::$core;
    }

    /**
     * @param mixed $core
     */
    public static function setCore($core)
    {
        self::$core = $core;
    }

    /**
     * @return mixed
     */
    public static function getAppMaster()
    {
        return self::$app_master;
    }

    /**
     * @param $app_master
     */
    public static function setAppMaster($app_master)
    {
        self::$app_master = $app_master;
    }

}