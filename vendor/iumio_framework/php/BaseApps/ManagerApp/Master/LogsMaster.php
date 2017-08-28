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


namespace ManagerApp\Masters;
use iumioFramework\Core\Additionnal\Server\iumioServerManager;
use iumioFramework\Core\Base\Debug\Debug;
use iumioFramework\Core\Base\Http\Response\Response;
use iumioFramework\Exception\Server\AbstractServer;
use iumioFramework\Exception\Server\Server404;
use iumioFramework\Masters\MasterCore;
use iumioFramework\Core\Base\Json\JsonListener as JL;

/**
 * Class LogsMaster
 * @package iumioFramework\Core\Manager
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class LogsMaster extends MasterCore
{
    /**
     * Start FGM dashboard
     */
    public function logsActivity()
    {
        $file = JL::open(CONFIG_DIR.'core/initial.json');
        $date =  new \DateTime($file->installation->date);
        $file->installation = $date->format('Y/m/d');

        return($this->render("logs", array("selected" => "logsmanager", "env" => strtolower(IUMIO_ENV))));
    }

    /** Get log details
     * @param string $uidie Unique identifier of iumio Exception
     * @throws Server404 If uidie does not exist
     */
    public function logsdetailsActivity(string $uidie)
    {
        $onelogs = null;
        $logs = JL::open(ROOT_LOGS.strtolower(IUMIO_ENV).".log.json");
        foreach ($logs as $one)
        {
            if ($uidie == $one->uidie)
            {
                $onelogs = $one;
                break;
            }
        }
       // print_r($onelogs);

        if ($onelogs == null)
            throw new Server404(new \ArrayObject(array("explain" => "The error with uidie [".$uidie."] does not exist", "solution" => "Check the UIDIE")));

        return($this->render("logsdetails", array("details" => $onelogs, "selected" => "logsmanager", "env" => strtolower(IUMIO_ENV))));
    }

    /** Get the last debug logs (unlimited)
     * @return int JSON response log list
     */
    public function getlogActivity():int
    {
        $last = array_values(array_reverse(AbstractServer::getLogs()));
        $lastn = array();
        for($i = 0; $i < count($last); $i++)
        {
            $one = $last[$i];
            $last[$i]->log_url = $this->generateRoute("iumio_manager_logs_manager_get_one", array("uidie" => $one->uidie));
            array_push($lastn, $last[$i]);
        }
        return ((new Response())->JSON_RENDER(array("code" => 200, "results" => $lastn)));
    }

    /** clear log of current environment
     * @return int JSON response
     */
    public function clearActivity():int
    {
        iumioServerManager::delete(ROOT_LOGS.strtolower(IUMIO_ENV).".log.json", 'file');
        @iumioServerManager::create(ROOT_LOGS.strtolower(IUMIO_ENV).".log.json", 'file');

        return ((new Response())->JSON_RENDER(array("code" => 200, "msg" => "OK")));
    }



}