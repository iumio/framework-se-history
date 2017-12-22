<?php

namespace testApp\Masters;

use iumioFramework\Masters\MasterCore;
use iumioFramework\Base\Renderer\Renderer;

/**
 * Class DefaultMaster
 * @package testApp\Masters
 */

class DefaultMaster extends MasterCore
{

    /**
     * Go to index page
     */
    public function indexActivity()
    {
        return ((new Renderer())->graphicRenderer("index.html"));
    }

}
