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

use iumioFramework\Core\Base\Debug\Debug;
use iumioFramework\Core\Base\Http\Response\Response;
use iumioFramework\Exception\Server\AbstractServer;
use iumioFramework\Masters\MasterCore;
use iumioFramework\Core\Base\Json\JsonListener as JL;

/**
 * Class DashboardMaster
 * @package iumioFramework\Core\Manager
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <danyrafina@gmail.com>
 */

class DashboardMaster extends MasterCore
{
    /**
     * Start FGM dashboard
     */
    public function indexActivity()
    {
        $file = JL::open(CONFIG_DIR.'core/initial.json');
        $date =  new \DateTime($file->installation->date);
        $file->installation = $date->format('Y/m/d');

        return($this->render("index", array("env" => strtolower(IUMIO_ENV), "selected" => "dashboard",
            "fi" => $file, 'https' => isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on')));
    }

    /** Get the last debug logs (limited by 10)
     * @return int JSON response log list
     */
    public function getlastlogActivity():int
    {
        $last = array_values(array_reverse(AbstractServer::getLogs()));
        $lastn = array();
        for ($i = 0; $i < count($last); $i++) {
            if ($i == 10) {
                break;
            }
            $last[$i]->log_url = $this->generateRoute(
                "iumio_manager_logs_manager_get_one",
                array("uidie" => $last[$i]->uidie, "env" => strtolower(IUMIO_ENV))
            );
            $last[$i]->time =  strtotime($last[$i]->time->date);
            array_push($lastn, $last[$i]);
        }

        return ((new Response())->JSON_RENDER(array("code" => 200, "results" => $lastn)));
    }


    /**
     * Get default App
     */
    public function getDefaultAppActivity():int
    {
        $default = array();
        $file = (array) JL::open(CONFIG_DIR.'core/apps.json');
        foreach ($file as $one) {
            if ($one->isdefault == "yes") {
                $default = $one;
                break;
            }
        }
        return ((new Response())->JSON_RENDER(array("code" => 200, "results" => $default)));
    }

    /**
     * Get the framework statistics
     */
    public function getFrameworkStatisticsActivity()
    {

        $appmaster = $this->getMaster('Apps');
        $appstats = $appmaster->getStatisticsApp();

        $routiningmaster = $this->getMaster('Routing');
        $routingstats = $routiningmaster->getStatisticsRouting();

        $dbmaster = $this->getMaster('Databases');
        $dbstats = $dbmaster->getStatisticsDatabases();

        $logsmaster = $this->getMaster('Logs');
        $logsstats = $logsmaster->getStatisticsLogs();

        return ((new Response())->JSON_RENDER(array("code" => 200, "results" => array("apps" => $appstats,
            "routes" => $routingstats, "dbs" => $dbstats, "logs" => $logsstats))));
    }
}
