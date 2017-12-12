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

use iumioFramework\Core\Additionnal\Server\ServerManager;
use iumioFramework\Core\Base\Debug\Debug;
use iumioFramework\Base\Renderer\Renderer;
use iumioFramework\Exception\Server\AbstractServer;
use iumioFramework\Exception\Server\Server404;
use iumioFramework\Exception\Server\Server500;
use iumioFramework\Masters\MasterCore;
use iumioFramework\Core\Base\Json\JsonListener as JL;

/**
 * Class LogsMaster
 * @package iumioFramework\Core\Manager
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <danyrafina@gmail.com>
 */

class LogsMaster extends MasterCore
{
    /**
     * Start FGM dashboard
     */
    public function logsActivity()
    {
        $file = JL::open(CONFIG_DIR.'core/framework.config.json');
        $date =  new \DateTime($file->installation->date);
        $file->installation = $date->format('Y/m/d');

        return($this->render("logs", array("selected" => "logsmanager", "env" => strtolower(IUMIO_ENV))));
    }

    /**
     * Get log details
     * @param string $uidie Unique identifier of iumio Exception
     * @param string $env Environment name
     * @throws Server404 If uidie does not exist
     * @throws Server500 If environement does not exist
     */
    public function logsdetailsActivity(string $uidie, string $env)
    {
        if (!in_array($env, array("dev", "prod"))) {
            throw new Server500(new \ArrayObject(array("explain" => "Bad environment name $env",
                "solution" => "Environment must be 'dev' or 'prod' ")));
        }
        $onelogs = null;
        $logs = JL::open(ROOT_LOGS.strtolower($env).".log.json");
        foreach ($logs as $one) {
            if ($uidie == $one->uidie) {
                $one->env = "DEV";
                $onelogs = $one;
                break;
            }
        }

        if ($onelogs == null) {
            throw new Server404(new \ArrayObject(array("explain" => "The error with uidie [".$uidie."] does not exist",
                "solution" => "Check the UIDIE")));
        }

        //print_r($onelogs);
        //exit();
        return($this->render("logsdetails", array("details" => $onelogs, "selected" =>
            "logsmanager", "env" => strtolower($env))));
    }

    /** Get logs statistics for all
     * @return array Logs statistics
     */
    public function getStatisticsLogs():array
    {
        return (array("dev" => $this->getStatisticsLogsDev(), "prod" => $this->getStatisticsLogsProd()));
    }

    /** Get logs statistics for dev
     * @return array Logs dev statistics
     */
    public function getStatisticsLogsDev():array
    {
        $last = array_values(array_reverse(AbstractServer::getLogs("dev")));
        $success = 0;
        $critical = 0;
        $others = 0;
        $errors = 0;
        for ($i = 0; $i < count($last); $i++) {
            $one = $last[$i];
            if ($one->code == 200) {
                $success++;
            } else {
                $errors++;
                if ($one->code == 500) {
                    $critical++;
                } else {
                    $others++;
                }
            }
        }
        return (array("errors" => $errors, "critical" => $critical,
            "success" => $success, "others" => $others));
    }

    /** Get logs statistics for prod
     * @return array Logs prod statistics
     */
    public function getStatisticsLogsProd():array
    {
        $last = array_values(array_reverse(AbstractServer::getLogs("prod")));
        $success = 0;
        $critical = 0;
        $others = 0;
        $errors = 0;
        for ($i = 0; $i < count($last); $i++) {
            $one = $last[$i];
            if ($one->code == 200) {
                $success++;
            } else {
                $errors++;
                if ($one->code == 500) {
                    $critical++;
                } else {
                    $others++;
                }
            }
        }
        return (array("errors" => $errors, "critical" => $critical,
            "success" => $success, "others" => $others));
    }

    /** Get the last debug logs (unlimited) with min and max position
     * @param $env string environment name
     * @return int JSON response log list
     */
    public function getlogActivity(string $env):Renderer
    {
        if (!in_array($env, array("dev", "prod"))) {
            throw new Server500(new \ArrayObject(array("explain" => "Bad environment name $env",
                "solution" => "Environment must be 'dev' or 'prod' ")));
        }
        $last = array_values(array_reverse(AbstractServer::getLogs($env)));
        $lastn = array();
        $request = $this->get('request');
        $loglastpos =  $request->get('pos');
        $orderby = 29;
        if ($loglastpos == null) {
            return ((new Renderer())->jsonRenderer(array("code" => 500, "results" => "Cannot get the last position")));
        }
        $loglastpos = (int)$loglastpos;
        $max = $loglastpos + $orderby;
        for ($i = $loglastpos; $i <= $max; $i++) {
            if (!isset($last[$i])) {
                continue;
            }
            $one = $last[$i];
            $last["env"] = strtoupper($env);
            $last[$i]->time = strtotime($last[$i]->time->date);
            $last[$i]->log_url = $this->generateRoute(
                "iumio_manager_logs_manager_get_one",
                array("uidie" => $one->uidie, "env" => $env)
            );
            array_push($lastn, $last[$i]);
        }
        return ((new Renderer())->jsonRenderer(array("code" => 200, "results" => $lastn)));
    }

    /** clear log of dev or prod environment
     * @param $env string Environment
     * @return int JSON response
     */
    public function clearActivity(string $env):Renderer
    {
        if (!in_array($env, array("dev", "prod"))) {
            throw new Server500(new \ArrayObject(array("explain" => "Bad environment name $env",
                "solution" => "Environment must be 'dev' or 'prod' ")));
        }
        ServerManager::delete(ROOT_LOGS.strtolower($env).".log.json", 'file');
        @ServerManager::create(ROOT_LOGS.strtolower($env).".log.json", 'file');

        return ((new Renderer())->jsonRenderer(array("code" => 200, "msg" => "OK")));
    }
}
