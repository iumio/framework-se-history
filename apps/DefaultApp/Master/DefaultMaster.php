<?php

namespace DefaultApp\Master;

use IumioFramework\Masters\IumioUltimaMaster;

/**
 * Class DefaultMaster
 * @package DefaultApp\Master
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class DefaultMaster extends IumioUltimaMaster
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
     */
    public function indexGo()
    {
        //return ($this->render("index", array("hello" => "Hello World")));
        $this->changeRenderExtention(".ium");
        return ($this->render("index", array("hello" => "INDEX")));
    }

    /** Get to render page
     * @param string $param Options
     */
    public function renderGo(string $param)
    {
        $this->changeRenderExtention(".ium");
        return ($this->render("index", array("hello" => $param)));
    }
}