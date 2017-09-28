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
use iumioFramework\Exception\Server\Server500;
use iumioFramework\Masters\MasterCore;
use iumioFramework\Core\Base\Json\JsonListener as JL;

/**
 * Class AutoloaderMaster
 * @package iumioFramework\Core\Manager
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class AutoloaderMaster extends MasterCore
{
    /**
     * Get autoloader manager page
     */
    public function autoloaderActivity()
    {
        return($this->render("autoloadermanager", array("selected" => "autoloadermanager",
            "env" => strtolower(IUMIO_ENV))));
    }

    /** Get autoloader statistics
     * @return array Autoloader statistics
     */
    public function getStatisticsAutoloader():array
    {
        $dev = (JL::open((CONFIG_DIR.'engine_autoloader/map_dev_class.json')));
        $prod = (JL::open((CONFIG_DIR.'engine_autoloader/map_class.json')));

        $ccdev  = 0;
        $ccprod = 0;
        $appsclass = 0;
        $lastfile = NULL;
        $appsmaster = 0;
        $masterregex = '/\/apps\/\w*App\/Master\//';

        foreach ($dev as $one => $value)
        {
            if (strpos($value, "/apps/") !== false) $appsclass++;
            preg_match($masterregex, $value, $matches);
            if (!empty($matches)) $appsmaster++;
            $ccdev++;
        }
        foreach ($prod as $one) $ccprod++;

        $ndev = (array)$dev;
        $ndev = array_values($ndev);
        $ndev = array_unique($ndev);
        $ufile = count($ndev);

        return (array("ccdev" => $ccdev, "ccprod" => $ccprod,
            "ufile" => $ufile, "appmaster" => $appsmaster, "appclass" => $appsclass));
    }

    /** Get the statistics for engine autoloader
     * @return int JSON response autoloader statistics
     */
    public function getStatisticsActivity():int
    {
        return ((new Response())->JSON_RENDER(array("code" => 200, "results" => $this->getStatisticsAutoloader())));
    }

    /** clear autoloader classmap
     * @param $env string Environement name
     * @return int JSON response
     */
    public function clearActivity(string $env):int
    {
        // DEV is not allowed for clearing the classmap beacause the GraphicManager will be broken
        if (in_array($env, array("prod")))
            $this->clearClassMap($env);
        else
            throw new Server500(new \ArrayObject(array("explain" => "Undefined environement $env", "solution" =>
                "Environement must be only [prod]. Dev is not allowed")));

        return ((new Response())->JSON_RENDER(array("code" => 200, "msg" => "OK")));
    }


    /** Clear the classmap file needeed by the iumio engine autoloader
     * @param string $env Environement name
     * @return int If action is a success
     * @throws Server500 If environement name does not exist
     */
    public final function clearClassMap(string $env):int
    {
        if (in_array($env, array("dev", "prod")))
        {
            iumioServerManager::delete
            (CONFIG_DIR.'engine_autoloader/map'.(($env == "dev")? "_dev" : "")."_class.json", 'file');
            @iumioServerManager::create
            (CONFIG_DIR.'engine_autoloader/map'.(($env == "dev")? "_dev" : "")."_class.json", 'file');
        }
        else
            throw new Server500(new \ArrayObject(array("explain" => "Undefined environement $env", "solution" =>
            "Environement must be [dev] or [prod]")));
        return (0);
    }


    /** Build autoloader classmap to retrive the correct file class
     * @param $env string Environement name
     * @return int JSON response
     */
    public function buildActivity(string $env):int
    {
        if (in_array($env, array("dev", "prod")))
            $this->buildClassMapp($env);
        else if ($env == "all")
        {
            $this->buildClassMapp("dev");
            $this->buildClassMapp("prod");
        }
        else
            throw new Server500(new \ArrayObject(array("explain" => "Undefined environement $env", "solution" =>
                "Environement must be [dev] or [prod] and [all] for all enviroment")));

        return ((new Response())->JSON_RENDER(array("code" => 200, "msg" => "OK")));
    }


    /** Build the classmap file needeed by the iumio engine autoloader.
     * The file class map was regenerated with the Class name and the file path for each class
     * [Class name : filepath]
     *
     * @param string $env Environement name
     * @return int If action is a success
     * @throws Server500 If environement name does not exist
     */
    public final function buildClassMapp(string $env):int
    {
        if (in_array($env, array("dev", "prod")))
        {
            \EngineAutoloader::buildClassMap($env);
        }
        else
            throw new Server500(new \ArrayObject(array("explain" => "Undefined environement $env", "solution" =>
                "Environement must be [dev] or [prod]")));
        return (0);
    }



}