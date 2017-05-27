<?php

namespace ManagerApp\Master;
use iumioFramework\Core\Base\Debug\Debug;
use iumioFramework\Core\Base\Http\Response\Response;
use iumioFramework\Masters\iumioUltimaMaster as Master;
use iumioFramework\Core\Base\Json\JsonListener as JL;

/**
 * Class DatabasesMaster
 * @package iumioFramework\Core\Manager
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class DatabasesMaster extends Master
{
    /**
     * Show database index
     */
    public function databasesActivity()
    {
        return($this->render("databases", array("selected" => "databasesmanager")));
    }


    /**
     * Get Databases list
     */
    public function getAllDatabasesActivity():int
    {
        $file = (array) JL::open(CONFIG_DIR.'databases.json');
        foreach ($file as $one => $val)
        {
            $val->remove = $this->generateRoute("iumio_manager_databases_manager_remove", array("dbconfiguration" => $one), null, true);
            $val->edit = $this->generateRoute("iumio_manager_databases_manager_edit", array("dbconfiguration" => $one), null, true);
            $val->edit_save = $this->generateRoute("iumio_manager_databases_manager_edit_save", array("dbconfiguration" => $one), null, true);
        }

        return ((new Response())->JSON_RENDER(array("code" => 200, "results" => $file)));
    }

    /** remove one database
     * @param string $dbconfiguration Database configuration name
     * @return int
     */
    public function removeActivity(string $dbconfiguration):int
    {
        $remove = false;
        $file = JL::open(CONFIG_DIR."databases.json");
        foreach ($file as $one => $val)
        {
            if ($one == $dbconfiguration)
            {
                unset($file->$one);
                $remove = true;
                break;
            }
        }

        if ($remove == false)
            return ((new Response())->JSON_RENDER(array("code" => 500, "msg" => "App doest not exist")));
        $file = json_encode((object) $file);
        JL::put(CONFIG_DIR."databases.json", $file);


        return ((new Response())->JSON_RENDER(array("code" => 200, "msg" => "OK")));
    }


    /**
     * Get one Database
     * @param string $dbconfiguration Database configuration name
     * @return int
     */
    public function getonedbActivity(string $dbconfiguration):int
    {
        $file = (array) JL::open(CONFIG_DIR.'databases.json');
        foreach ($file as $one => $val)
        {
            if ($one == $dbconfiguration)
                return ((new Response())->JSON_RENDER(array("code" => 200, "results" => $file)));
        }

        return ((new Response())->JSON_RENDER(array("code" => 200, "results" => array())));
    }

    /**
     * save one Database
     * @param string $dbconfiguration Database configuration name
     * @return int
     */
    public function save(string $dbconfiguration):int
    {

    }

    /**
     * create one Database
     * @param string $dbconfig Database configuration name
     * @return int
     */
    public function create():int
    {

    }

}