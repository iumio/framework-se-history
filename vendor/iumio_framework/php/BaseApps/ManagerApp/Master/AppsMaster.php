<?php

namespace ManagerApp\Master;
use iumioFramework\Masters\iumioUltimaMaster as Master;
use iumioFramework\Core\Base\Json\JsonListener;

/**
 * Class AppsMaster
 * @package iumioFramework\Core\Manager
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class AppsMaster extends Master
{

    /**
     * Going to app manager
     */
    public function appsActivity()
    {
        $this->render("appmanager");
    }

    /**
     * Going to base app manager
     */
    public function baseAppsActivity()
    {
        $this->render("baseappmanager");
    }


    /**
     * Get All simple App
     */
    final private function getAllSimpleApp()
    {

    }

}