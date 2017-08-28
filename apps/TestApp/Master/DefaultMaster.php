<?php

namespace TestApp\Masters;

use iumioFramework\Masters\MasterCore;

/**
 * Class DefaultMaster
 * @package TestApp\Masters
 */

class DefaultMaster extends MasterCore
{


    /**
     * Go to index page
     * @param string $hi Element to show
     */
    public function indexActivity(string $hi, string $mike)
    {
        return ($this->render("index2", array("sent" => $hi." - ".$mike)));
    }

    /** show hello
     */
    public function show_indexActivity()
    {
        return ($this->render("index"));
    }
}