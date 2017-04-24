<?php

namespace DzedApp\Master;

use iumioFramework\Masters\iumioUltimaMaster as Master;

/**
 * Class DefaultMaster
 * @package DzedApp\Master
 */

class DefaultMaster extends Master
{

    /**
     * DefaultMaster constructor.
     */
    public function __construct()
    {
        $this->mastering($this);
    }

    /**
     * Go to index page
     * @param string $hi Element to show
     */
    public function indexGo(string $hi)
    {
        return ($this->render("index2", array("sent" => $hi)));
    }

    /** show hello
     */
    public function show_indexGo()
    {
        return ($this->render("index"));
    }
}