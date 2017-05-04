<?php

namespace GeekApp\Master;

use iumioFramework\Masters\iumioUltimaMaster as Master;

/**
 * Class DefaultMaster
 * @package GeekApp\Master
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
       // exit();
        return ($this->render("index"));
    }
}