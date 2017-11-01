<?php

namespace demkdlmezfjelzfelkfnelkzjfkljeljkfApp\Masters;

use iumioFramework\Masters\MasterCore;
use iumioFramework\Core\Base\Http\Response\Response;

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
        return ((new Response())->jsonRender(array("code" => 200, "name" => "First App")));
    }

}
