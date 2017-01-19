<?php

namespace DefaultApp\Master;

use IumioFramework\Masters\IumioUltimaMaster;

/**
 * Class SigleMaster
 * @package DefaultApp\Master
 */

class SingleMaster extends IumioUltimaMaster
{

    /**
     * @param string $firstname
     * @param string $lastname
     */
    public function nameGo(string $firstname, string $lastname)
    {
        return ($this->render("index", array("fn" => $firstname, 'ln' => $lastname)));
    }

}