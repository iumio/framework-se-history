<?php

namespace DistApp\Masters;

use iumioFramework\Core\Requirement\Patterns\ObjectCreator;
use iumioFramework\Core\Units\PatternsUnits;
use iumioFramework\Masters\MasterCore;

/**
 * Class DefaultMaster
 * @package DistApp\Masters
 */

class DefaultMaster extends MasterCore
{

    /**
     * Go to index page
     * @param string $hi Element to show
     */
    public function indexActivity(string $hi, string $ho)
    {
        return ($this->render("index2", array("sent" => $hi, "d" => $ho)));
    }

    /** show hello
     */
    public function show_indexActivity()
    {
        return ($this->render("index"));
    }

    public function factory(string $dz)
    {
        echo $dz;
    }
}
