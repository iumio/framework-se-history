<?php

namespace IumioFramework\Core\Requirement;

/**
 * Abstract Class IumioAppModel
 * @package IumioFramework\Core\Requirement
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

abstract class IumioAppModel
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