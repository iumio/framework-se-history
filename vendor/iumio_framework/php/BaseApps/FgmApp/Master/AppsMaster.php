<?php

namespace FgmApp\Master;
use iumioFramework\Masters\iumioUltimaMaster as Master;

/**
 * Class AppsMaster
 * @package iumioFramework\Core\Fgm
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class AppsMaster extends Master
{

    /**
     * Going to app manager
     */
    public function appsGo()
    {
        $this->render("appmanager");
    }
}