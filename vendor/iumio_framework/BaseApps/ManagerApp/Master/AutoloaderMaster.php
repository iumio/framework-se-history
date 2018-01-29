<?php

/**
 *
 *  * This is an iumio Framework component
 *  *
 *  * (c) RAFINA DANY <dany.rafina@iumio.com>
 *  *
 *  * iumio Framework - iumio Components
 *  *
 *  * To get more information about licence, please check the licence file
 *
 */

namespace ManagerApp\Masters;

use iumioFramework\Core\Additionnal\Server\ServerManager;
use iumioFramework\Core\Base\Debug\Debug;
use iumioFramework\Base\Renderer\Renderer;
use iumioFramework\Core\Requirement\EngineAutoloader;
use iumioFramework\Core\Requirement\Environment\FEnv;
use iumioFramework\Exception\Server\AbstractServer;
use iumioFramework\Exception\Server\Server404;
use iumioFramework\Exception\Server\Server500;
use iumioFramework\Masters\MasterCore;
use iumioFramework\Core\Base\Json\JsonListener as JL;

/**
 * Class AutoloaderMaster
 * @package iumioFramework\Core\Manager
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */

class AutoloaderMaster extends MasterCore
{
    /**
     * Get autoloader manager page
     * @throws \Exception
     */
    public function autoloaderActivity()
    {
        return($this->render("autoloadermanager", array("selected" => "autoloadermanager",
            "env" => strtolower(FEnv::get("framework.env")), "loader_msg" => "Autoloader Manager")));
    }

    /** Get autoloader statistics
     * @return array Autoloader statistics
     * @throws Server500
     */
    public function getStatisticsAutoloader():array
    {
        $dev = (JL::open((FEnv::get("framework.config.autoloader.dev.file"))));
        $prod = (JL::open((FEnv::get("framework.config.autoloader.prod.file"))));

        $ccdev  = 0;
        $ccprod = 0;
        $appsclass = 0;
        $lastfile = null;
        $appsmaster = 0;
        $masterregex = '/\/apps\/\w*App\/Master\//';

        $lastbuilddev = $lastbuildprod =  "N/A";

        if (!empty($dev))
            $lastbuilddev = $dev->{"iumioFramework\\Core\\Requirement\\Environment\\DevEnvironment"}[1] ?? "N/A";
        if (!empty($prod))
            $lastbuildprod = $dev->{"iumioFramework\\Core\\Requirement\\Environment\\ProdEnvironment"}[1] ?? "N/A";

        $devf = array();
        $prodf = array();
        foreach ($dev as $one => $value) {
            if (strpos($value[0], "/apps/") !== false) {
                $appsclass++;
            }
            preg_match($masterregex, $value[0], $matches);
            if (!empty($matches)) {
                $appsmaster++;
            }
            $ccdev++;
            array_push($devf, $value[0]);
        }
        foreach ($prod as $one => $value) {
            $ccprod++;
            array_push($prodf, $value[0]);
        }

        $ndev = (array)$devf;
        $ndev = array_values($ndev);
        $ndev = array_unique($ndev);
        $ufile = count($ndev);

        return (array("ccdev" => $ccdev, "ccprod" => $ccprod,
            "ufile" => $ufile, "appmaster" => $appsmaster, "appclass" => $appsclass,
            "lastbuilddev" => $lastbuilddev , "lastbuildprod" => $lastbuildprod));
    }

    /** Get the statistics for engine autoloader
     * @return int JSON response autoloader statistics
     * @throws Server500
     */
    public function getStatisticsActivity():Renderer
    {
        return ((new Renderer())->jsonRenderer(array("code" => 200, "results" => $this->getStatisticsAutoloader())));
    }

    /** clear autoloader classmap
     * @param $env string Environement name
     * @return Renderer JSON response
     * @throws Server500
     * @throws \Exception
     */
    public function clearActivity(string $env):Renderer
    {
        // DEV is not allowed for clearing the classmap beacause the Graphic Manager will be broken
        if (in_array($env, array("prod"))) {
            $this->clearClassMap($env);
        } else {
            throw new Server500(new \ArrayObject(array("explain" => "Undefined environement $env", "solution" =>
                "Environement must be only [prod]. Dev is not allowed")));
        }

        return ((new Renderer())->jsonRenderer(array("code" => 200, "msg" => "OK")));
    }


    /** Clear the classmap file needeed by the iumio engine autoloader
     * @param string $env Environement name
     * @return int If action is a success
     * @throws Server500 If environement name does not exist
     * @throws \Exception
     */
    final public function clearClassMap(string $env):int
    {
        if (in_array($env, array("dev", "prod"))) {
            ServerManager::delete(
                FEnv::get("framework.config").
                'engine_autoloader/map'.(($env == "dev")? "_dev" : "")."_class.json",
                'file'
            );
            @ServerManager::create(
                FEnv::get("framework.config").
                'engine_autoloader/map'.(($env == "dev")? "_dev" : "")."_class.json",
                'file'
            );
        } else {
            throw new Server500(new \ArrayObject(array("explain" => "Undefined environement $env", "solution" =>
            "Environement must be [dev] or [prod]")));
        }
        return (0);
    }


    /** Build autoloader classmap to retrive the correct file class
     * @param $env string Environement name
     * @return Renderer JSON response
     * @throws Server500
     */
    public function buildActivity(string $env):Renderer
    {
        if (in_array($env, array("dev", "prod"))) {
            $this->buildClassMap($env);
        } elseif ($env == "all") {
            $this->buildClassMap("dev");
            $this->buildClassMap("prod");
        } else {
            throw new Server500(new \ArrayObject(array("explain" => "Undefined environement $env", "solution" =>
                "Environement must be [dev] or [prod] and [all] for all enviroment")));
        }

        return ((new Renderer())->jsonRenderer(array("code" => 200, "msg" => "OK")));
    }


    /** Build the classmap file needeed by the iumio engine autoloader.
     * The file class map was regenerated with the Class name and the file path for each class
     * [Class name : filepath]
     *
     * @param string $env Environement name
     * @return int If action is a success
     * @throws Server500 If environement name does not exist
     */
    final public function buildClassMap(string $env):int
    {
        if (in_array($env, array("dev", "prod"))) {
            EngineAutoloader::buildClassMap($env);
        } else {
            throw new Server500(new \ArrayObject(array("explain" => "Undefined environement $env", "solution" =>
                "Environement must be [dev] or [prod]")));
        }
        return (0);
    }
}
