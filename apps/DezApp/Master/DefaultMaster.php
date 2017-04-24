<?php

namespace DezApp\Master;

use iumioFramework\Masters\iumioUltimaMaster as Master;
use iumioFramework\Core\Base\Http\Response\Response;

/**
 * Class DefaultMaster
 * @package DezApp\Master
 */

class DefaultMaster extends Master
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
        return ((new Response())->JSON_RENDER(array("name" => "First App")));
    }
}