<?php

namespace FgmApp\Master;
use iumioFramework\Masters\iumioUltimaMaster as Master;

/**
 * Class DashboardMaster
 * @package iumioFramework\Core\Fgm
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class DashboardMaster extends Master
{
    /**
     * Start FGM dashboard
     */
    public function indexGo()
    {
        $this->render("index");
    }

}