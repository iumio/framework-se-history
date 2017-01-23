<?php

namespace DefaultApp\Master;

use IumioFramework\Masters\IumioUltimaMaster;

/**
 * Class SingleMaster
 * @package DefaultApp\Master
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class SingleMaster extends IumioUltimaMaster
{

    /** Go to name page
     * @param string $firstname
     * @param string $lastname
     */
    public function nameGo(string $firstname, string $lastname)
    {
        return ($this->render("index", array("fn" => $firstname, 'ln' => $lastname)));
    }

}