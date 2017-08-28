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
use iumioFramework\Masters\MasterCore;
use iumioFramework\Core\Base\Json\JsonListener as JL;

/**
 * Class DatabasesMaster
 * @package iumioFramework\Core\Manager
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class DatabasesMaster extends MasterCore
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
        $file = (array) JL::open(CONFIG_DIR.'db/databases.json');
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
        $file = JL::open(CONFIG_DIR."db/databases.json");
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
            return ((new Response())->JSON_RENDER(array("code" => 500, "msg" => "App does not exist")));
        $file = json_encode((object) $file, JSON_PRETTY_PRINT);
        JL::put(CONFIG_DIR."db/databases.json", $file);


        return ((new Response())->JSON_RENDER(array("code" => 200, "msg" => "OK")));
    }


    /**
     * Get one Database
     * @param string $dbconfiguration Database configuration name
     * @return int
     */
    public function getonedbActivity(string $dbconfiguration):int
    {
        $file = (array) JL::open(CONFIG_DIR.'db/databases.json');
        foreach ($file as $one => $val)
        {
            if ($one == $dbconfiguration)
                return ((new Response())->JSON_RENDER(array("code" => 200, "results" => $val)));
        }

        return ((new Response())->JSON_RENDER(array("code" => 200, "results" => array())));
    }


    /**
     * save one Database
     * @param string $dbconfiguration Database configuration name
     * @return int
     */
    public function updateActivity(string $dbconfiguration):int
    {
        $config   = $dbconfiguration;
        $name     = $this->get("request")->get("name");
        $host     = $this->get("request")->get("host");
        $user     = $this->get("request")->get("user");
        $password = $this->get("request")->get("password");
        $port     = $this->get("request")->get("port");
        $driver   = $this->get("request")->get("driver");

        if (trim($name) == "" || trim($config) == "" || trim($host) == "" || trim($user) == "" || trim($driver) == "")
            return ((new Response())->JSON_RENDER(array("code" => 500, "msg" => "Error on databases parameters")));

        $file = JL::open(CONFIG_DIR.'db/databases.json');
        if (!isset($file->$config))
            return ((new Response())->JSON_RENDER(array("code" => 500, "msg" => "Error on databases parameters")));

        $file->$config = new \stdClass();
        $file->$config->db_name = $name;
        $file->$config->db_host = $host;
        $file->$config->db_port = $port;
        $file->$config->db_user = $user;
        $file->$config->db_password = $password;
        $file->$config->db_driver = $driver;

        JL::put(CONFIG_DIR."db/databases.json", json_encode($file, JSON_PRETTY_PRINT));

        return ((new Response())->JSON_RENDER(array("code" => 200, "msg" => "OK")));

    }

    /**
     * create one Database configuration

     * @return int
     */
    public function createActivity():int
    {
        $config   = $this->get("request")->get("config");
        $name     = $this->get("request")->get("name");
        $host     = $this->get("request")->get("host");
        $user     = $this->get("request")->get("user");
        $password = $this->get("request")->get("password");
        $port     = $this->get("request")->get("port");
        $driver   = $this->get("request")->get("driver");

        if (trim($config) == "" || trim($name) == "" || trim($config) == "" || trim($host) == "" || trim($user) == "" || trim($driver) == "")
            return ((new Response())->JSON_RENDER(array("code" => 500, "msg" => "Error on databases parameters")));

        $file = JL::open(CONFIG_DIR.'db/databases.json');
        if (isset($file->$config))
            return ((new Response())->JSON_RENDER(array("code" => 500, "msg" => "Error on databases parameters")));

        $file->$config = new \stdClass();
        $file->$config->db_name = $name;
        $file->$config->db_host = $host;
        $file->$config->db_port = $port;
        $file->$config->db_user = $user;
        $file->$config->db_password = $password;
        $file->$config->db_driver = $driver;

        JL::put(CONFIG_DIR."db/databases.json", json_encode($file, JSON_PRETTY_PRINT));

        return ((new Response())->JSON_RENDER(array("code" => 200, "msg" => "OK")));
    }

}