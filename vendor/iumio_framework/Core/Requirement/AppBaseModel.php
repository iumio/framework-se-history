<?php

/**
 *
 *  * This is an iumio Framework component
 *  *
 *  * (c) RAFINA DANY <dany.rafina@iumio.com>
 *  *
 *  * iumio Framework - iumio Components
 *  *
 *  * To get more information about licence, please check the licence file
 *
 */

namespace iumioFramework\Core\Requirement;

/**
 * Abstract Class AppBaseModel
 * @package iumioFramework\Core\Requirement
 * @author RAFINA Dany <dany.rafina@iumio.com>
 */

abstract class AppBaseModel
{
    private $app;
    protected $coname;
    private $is_base;
    protected static $start = 0;

    /** Set if app is a base app
     * @param int $status Number to change if it's a base app or not
     * @return int Is a base app
     */
    public function setBaseApp(int $status):int
    {
        $this->is_base = $status;
        return ($this->is_base);
    }

    /** Return if a base app
     * @return int is base app status
     */
    public function getIsBaseApp():int
    {
        return ($this->is_base);
    }

    /**
     *  Get router
     */
    public function routingGet()
    {
        return ;
    }

    /**
     * Get controller
     */
    protected function getController()
    {
    }

    /** Start base app
     * @return int app status
     */
    abstract public static function on():int;

    /** Stop base app
     * @return int app status
     */
    abstract public static function off():int;

    /** Get base app status
     * @return int Status
     */
    abstract public static function baseStatus():int;
}
