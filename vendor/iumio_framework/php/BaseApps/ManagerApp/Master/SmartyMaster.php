<?php

namespace ManagerApp\Master;
use iumioFramework\Masters\iumioUltimaMaster as Master;
use iumioFramework\Core\Base\Json\JsonListener;

/**
 * Class SmartyMaster
 * @package iumioFramework\Core\Manager
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class SmartyMaster extends Master
{

    /**
     * Going to smarty manager
     */
    public function smartyActivity()
    {
        return ($this->render("smartymanager"));
    }


}