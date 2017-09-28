<?php

namespace sqApp\Masters;

use iumioFramework\Masters\MasterCore;

/**
 * Class DefaultMaster
 * @package sqApp\Masters
 */

class DefaultMaster extends MasterCore
{


    /**
     * Go to index page
     * @param string $hi Element to show
     */
    public function indexActivity(string $hi)
    {
        return ($this->render("index2", array("sent" => $hi)));
    }

    /** show hello
     */
    public function showIndexActivity()
    {
        return ($this->render("index"));
    }
}
