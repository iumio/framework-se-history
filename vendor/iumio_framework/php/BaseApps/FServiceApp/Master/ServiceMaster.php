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
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <danyrafina@gmail.com>
 */

class ServiceMaster extends MasterCore
{
    /**
     * Get current app
     */
    public function getCAppActivity()
    {
        return ((new Response())->jsonRender(array("code" => 200, "app" => APP_CALL)));
    }
}
