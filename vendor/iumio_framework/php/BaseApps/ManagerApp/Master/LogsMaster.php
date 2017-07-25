<?php

/*
 * This is an iumio Framework component
 *
 * (c) RAFINA DANY <danyrafina@gmail.com>
 *
 * iumio Framework - iumio Components
 *
 * To get more information about licence, please check the licence file
 */


namespace ManagerApp\Master;
use iumioFramework\Core\Additionnal\Server\iumioServerManager;
use iumioFramework\Core\Base\Debug\Debug;
use iumioFramework\Core\Base\Http\Response\Response;
use iumioFramework\Exception\Server\AbstractServer;
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
    public function logsActivity()
    {
        $file = JL::open(CONFIG_DIR.'initial.json');
        $date =  new \DateTime($file->installation->date);
        $file->installation = $date->format('Y/m/d');

        return($this->render("logs", array("selected" => "logsmanager", "env" => strtolower(ENVIRONMENT))));
    }

    /** Get the last debug logs (unlimited)
     * @return int JSON response log list
     */
    public function getlogActivity():int
    {
        $last = array_values(array_reverse(AbstractServer::getLogs()));
        $lastn = array();
        for($i = 0; $i < count($last); $i++)
          array_push($lastn, $last[$i]);

        return ((new Response())->JSON_RENDER(array("code" => 200, "results" => $lastn)));
    }

    /** clear log of current environment
     * @return int JSON response
     */
    public function clearActivity():int
    {
        iumioServerManager::delete(ROOT_LOGS.strtolower(ENVIRONMENT).".log.json", 'file');
        @iumioServerManager::create(ROOT_LOGS.strtolower(ENVIRONMENT).".log.json", 'file');

        return ((new Response())->JSON_RENDER(array("code" => 200, "msg" => "OK")));
    }



}