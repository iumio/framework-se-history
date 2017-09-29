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

namespace iumioFramework\Core\Requirement;

/**
 * Abstract Class AppModel
 * @package iumioFramework\Core\Requirement
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <danyrafina@gmail.com>
 */

abstract class AppModel
{
    private $app;
    protected $coname;

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
}
