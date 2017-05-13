<?php

namespace ManagerApp\Master;
use iumioFramework\Masters\iumioUltimaMaster as Master;

/**
 * Class DashboardMaster
 * @package iumioFramework\Core\Manager
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class DashboardMaster extends Master
{
    /**
     * Start FGM dashboard
     */
    public function indexActivity()
    {
        $this->render("index");
    }

}