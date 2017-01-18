<?php

namespace DefaultApp\Master;

use IumioFramework\Masters\IumioUltimaMaster;
use IumioFramework\Core\Base\Http\Response\Response;

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
        return ((new Response())->JSON_RENDER(array("hello" => "indexGO")));
    }

    /**
     * Going to render page
     */
    public function renderGo()
    {
        echo "render";
        // return ;
    }
}