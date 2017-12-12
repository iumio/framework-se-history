<?php

namespace WhdeerzfrzzApp\Masters;

use iumioFramework\Masters\MasterCore;
use iumioFramework\Base\Renderer\Renderer;

/**
 * Class DefaultMaster
 * @package WhdeerzfrzzApp\Masters
 */

class DefaultMaster extends MasterCore
{

    /**
     * Go to index page
     */
    public function indexActivity()
    {
        return ((new Renderer())->jsonRenderer(array("code" => 200, "name" => "First App")));
    }

}
