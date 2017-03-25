<?php

namespace iumioFramework\Core\Requirement;

/**
 * Abstract Class iumioAppBaseModel
 * @package iumioFramework\Core\Requirement
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

abstract class iumioAppBaseModel
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
    abstract static public function on():int;

    /** Stop base app
     * @return int app status
     */
    abstract static public function off():int;

    /** Get base app status
     * @return int Status
     */
    abstract static public function baseStatus():int;
}