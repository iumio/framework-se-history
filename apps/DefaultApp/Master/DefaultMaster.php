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
     *
     */
    public function indexGo()
    {
        //return ($this->render("index", array("hello" => "Hello World")));
        $this->changeRenderExtention(".ium");
        return ($this->render("index", array("hello" => "INDEX")));
    }

    /**
     * @param string $param
     */
    public function renderGo(string $param)
    {
        $this->changeRenderExtention(".ium");
        return ($this->render("index", array("hello" => $param)));
    }
}