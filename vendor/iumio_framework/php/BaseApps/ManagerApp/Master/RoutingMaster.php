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


namespace ManagerApp\Master;
use iumioFramework\Core\Additionnal\Server\iumioServerManager;
use iumioFramework\Masters\iumioUltimaMaster as Master;
use iumioFramework\Core\Base\Json\JsonListener as JL;
use iumioFramework\Core\Base\Http\Response\Response;

/**
 * Class RoutingMaster
 * @package iumioFramework\Core\Manager
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class RoutingMaster extends Master
{

    /**
     * Going to app manager
     */
    public function routingActivity()
    {
        return ($this->render("routingmanager", array("selected" => "routingmanager")));
    }

}