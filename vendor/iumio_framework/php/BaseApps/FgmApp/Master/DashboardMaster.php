<?php

namespace FgmApp\Master;
use IumioFramework\Masters\IumioUltimaMaster as Master;

/**
 * Class DashboardMaster
 * @package IumioFramework\Core\Fgm
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class DashboardMaster extends Master
{
    /**
     * Start FGM dashboard
     */
    public function indexGo()
    {
        $this->render("index3");
    }
}