<?php

namespace iumioFramework\Core\Requirement;

/**
 * Abstract Class iumioAppModel
 * @package iumioFramework\Core\Requirement
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

abstract class iumioAppModel
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