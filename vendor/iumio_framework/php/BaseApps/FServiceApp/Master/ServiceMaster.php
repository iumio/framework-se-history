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


namespace FServiceApp\Masters;
use iumioFramework\Masters\MasterCore;
use iumioFramework\Core\Base\Http\Response\Response;

/**
 * Class ServiceMaster
 * @package FServiceApp\Masters
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class ServiceMaster extends MasterCore
{
    /**
     * Get current app
     */
    public function getCAppActivity()
    {
        return ((new Response())->JSON_RENDER(array("code" => 200, "app" => APP_CALL)));
    }

}