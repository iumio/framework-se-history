<?php

namespace Default2App\Master;

use IumioFramework\Masters\IumioUltimaMaster;

/**
 * Class DefaultMaster
 * @package Default2App\Master
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
     * @param string $hi Element to show
     */
    public function indexGo(string $hi)
    {
        return ($this->render("index2", array("sent" => $hi)));
    }

    /** show hello
     */
    public function show_helloGo()
    {
        return ($this->render("index"));
    }
}