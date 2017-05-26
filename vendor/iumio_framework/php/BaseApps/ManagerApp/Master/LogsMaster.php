<?php

namespace ManagerApp\Master;
use iumioFramework\Core\Base\Debug\Debug;
use iumioFramework\Core\Base\Http\Response\Response;
use iumioFramework\Masters\iumioUltimaMaster as Master;
use iumioFramework\Core\Base\Json\JsonListener as JL;

/**
 * Class LogsMaster
 * @package iumioFramework\Core\Manager
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class LogsMaster extends Master
{
    /**
     * Start FGM dashboard
     */
    public function logctivity()
    {
        $file = JL::open(CONFIG_DIR.'initial.json');
        $date =  new \DateTime($file->installation->date);
        $file->installation = $date->format('Y/m/d');

        return($this->render("logs", array("selected" => "logs")));
    }

    /** Get the last debug logs (unlimited)
     * @return int JSON response log list
     */
    public function getlogActivity():int
    {
        $last = array_values(array_reverse(Debug::getLogs()));
        $lastn = array();
        for($i = 0; $i < count($last); $i++)
          array_push($lastn, $last[$i]);

        return ((new Response())->JSON_RENDER(array("code" => 200, "results" => $lastn)));
    }


}