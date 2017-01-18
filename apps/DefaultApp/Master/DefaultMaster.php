<?php

namespace DefaultApp\Master;

use IumioFramework\Masters\IumioUltimaMaster;

/**
 * Class DefaultMaster
 * @package DefaultApp\Master
 */

class DefaultMaster extends IumioUltimaMaster
{

    public function __construct()
    {
        $this->mastering($this);
    }

    /**
     * Going to index page
     */
    public function indexGo()
    {
        //return ($this->render("index", array("hello" => "Hello World")));
        $this->changeRenderExtention(".ium");
        return ($this->render("index", array("hello" => "IUM VIEW")));
    }

    /**
     * Going to render page
     */
    public function renderGo()
    {
        return ($this->render("index", array("hello" => "HTML IUM")));
    }
}