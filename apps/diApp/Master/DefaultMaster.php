<?php

namespace diApp\Masters;

use iumioFramework\Masters\MasterCore;
use iumioFramework\Base\Renderer\Renderer;

/**
 * Class DefaultMaster
 * @package diApp\Masters
 */

class DefaultMaster extends MasterCore
{

    /**
     * Show index page with dynamic parameter {$sent}
     * @param string $hi Element to show
     * @return Renderer
     * @throws \Exception
     */
    public function indexActivity(string $hi):Renderer
    {
        return ($this->render("index2", array("sent" => $hi)));
    }

    /**
     *  Show index page
     * @return Renderer The Renderer
     * @throws \Exception
     */
    public function showIndexActivity():Renderer
    {
        return ($this->render("index"));
    }
}
