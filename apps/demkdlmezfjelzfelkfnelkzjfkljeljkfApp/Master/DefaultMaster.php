<?php

namespace demkdlmezfjelzfelkfnelkzjfkljeljkfApp\Masters;

use iumioFramework\Masters\MasterCore;
use iumioFramework\Base\Renderer\Renderer;

/**
 * Class DefaultMaster
 * @package demkdlmezfjelzfelkfnelkzjfkljeljkfApp\Masters
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
