<?php

namespace HelloApp\Masters;

use iumioFramework\Base\Renderer\Renderer;
use iumioFramework\Masters\MasterCore;

/**
 * Class DefaultMaster
 * @package HelloApp\Masters
 */

class DefaultMaster extends MasterCore
{


    /**
     * Go to index page
     * @param string $hi Element to show
     */
    public function indexActivity(string $hi):Renderer
    {
        return ($this->render("index2", array("sent" => $hi)));
    }

    /**
     * show hello
     */
    public function showIndexActivity():Renderer
    {
        //$this->get("service")->get("mailer");
        $a = array ("hello" => "world", "val" => "test", "mak" => array ("test1" => "TEST2"));
        //return ($this->render("index"));
        //return ((new Renderer())->textRenderer("testt"));
        return ((new Renderer())->csvRenderer($a));
    }
}
