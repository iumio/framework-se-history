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

use Exception;
use iumioFramework\Core\Base\Debug\Debug;
use iumioFramework\Base\Renderer\Renderer;
use iumioFramework\Exception\Server\Server500;
use iumioFramework\Masters\MasterCore;
use iumioFramework\Core\Base\Json\JsonListener as JL;

/**
 * Class DatabasesMaster
 * @package iumioFramework\Core\Manager
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */

class DatabasesMaster extends MasterCore
{
    /**
     * Show database index
     * @return Renderer
     * @throws \Exception
     */
    public function databasesActivity():Renderer
    {
        return($this->render("databases", array("selected" => "databasesmanager",
            "loader_msg" => "Databases Manager")));
    }

    /** Get databases statistics
     * @return array Databases statistics
     * @throws \Exception
     */
    public function getStatisticsDatabases():array
    {

        $file = (array) JL::open(FEnv::get("framework.config.db.file"));
        JL::close(FEnv::get("framework.config.db.file"));
        return (array("number" => count($file)));
    }


    /**
     * Get Databases list
     * @return Renderer
     * @throws \Exception
     */
    public function getAllDatabasesActivity():Renderer
    {
        $file = (array) JL::open(FEnv::get("framework.config.db.file"));
        foreach ($file as $one => $val) {
            $val->remove = $this->generateRoute(
                "iumio_manager_databases_manager_remove",
                array("dbconfiguration" => $one),
                null,
                true
            );
            $val->edit = $this->generateRoute(
                "iumio_manager_databases_manager_edit",
                array("dbconfiguration" => $one),
                null,
                true
            );
            $val->edit_save = $this->generateRoute(
                "iumio_manager_databases_manager_edit_save",
                array("dbconfiguration" => $one),
                null,
                true
            );
        }

        return ((new Renderer())->jsonRenderer(array("code" => 200, "results" => $file)));
    }

    /** remove one database
     * @param string $dbconfiguration Database configuration name
     * @return Renderer
     * @throws \Exception
     */
    public function removeActivity(string $dbconfiguration):Renderer
    {
        $remove = false;
        $file = JL::open(FEnv::get("framework.config.db.file"));
        foreach ($file as $one => $val) {
            if ($one == $dbconfiguration) {
                unset($file->$one);
                $remove = true;
                break;
            }
        }

        if ($remove == false) {
            return ((new Renderer())->jsonRenderer(array("code" => 500, "msg" =>
                "Database configuration does not exist")));
        }
        $file = json_encode((object) $file, JSON_PRETTY_PRINT);
        JL::put(FEnv::get("framework.config.db.file"), $file);


        return ((new Renderer())->jsonRenderer(array("code" => 200, "msg" => "OK")));
    }


    /**
     * Get one Database
     * @param string $dbconfiguration Database configuration name
     * @return Renderer
     * @throws Exception
     */
    public function getonedbActivity(string $dbconfiguration):Renderer
    {
        $file = (array) JL::open(FEnv::get("framework.config.db.file"));
        foreach ($file as $one => $val) {
            if ($one == $dbconfiguration) {
                return ((new Renderer())->jsonRenderer(array("code" => 200, "results" => $val)));
            }
        }

        return ((new Renderer())->jsonRenderer(array("code" => 200, "results" => array())));
    }


    /**
     * save one Database
     * @param string $dbconfiguration Database configuration name
     * @return Renderer
     * @throws Exception
     *
     */
    public function updateActivity(string $dbconfiguration):Renderer
    {
        $config   = $dbconfiguration;
        $name     = $this->clean($this->get("request")->get("name"), false);
        $host     = $this->get("request")->get("host");
        $user     = $this->get("request")->get("user");
        $password = $this->get("request")->get("password");
        $port     = $this->get("request")->get("port");
        $driver   = $this->get("request")->get("driver");

        if (trim($name) == ""  || trim($host) == "" || trim($user) == "" || trim($driver) == "") {
            return ((new Renderer())->jsonRenderer(array("code" => 500,
                "msg" => "Error on databases parameters : A parameter is empty")));
        }

        $file = JL::open(FEnv::get("framework.config.db.file"));
        if (!isset($file->$config)) {
            return ((new Renderer())->jsonRenderer(array("code" => 500,
                "msg" => "Error on databases parameters : Database configuration does not exist")));
        }

        $file->$config = new \stdClass();
        $file->$config->db_name = $name;
        $file->$config->db_host = $host;
        $file->$config->db_port = $port;
        $file->$config->db_user = $user;
        $file->$config->db_password = $password;
        $file->$config->db_driver = $driver;

        JL::put(FEnv::get("framework.config.db.file"), json_encode($file, JSON_PRETTY_PRINT));

        return ((new Renderer())->jsonRenderer(array("code" => 200, "msg" => "OK")));
    }

    /**
     * create one Database configuration
     * @return Renderer
     * @throws \Exception
     */
    public function createActivity():Renderer
    {
        $config   = $this->clean($this->get("request")->get("config"));
        $name     = $this->clean($this->get("request")->get("name"), false);
        $host     = $this->get("request")->get("host");
        $user     = $this->get("request")->get("user");
        $password = $this->get("request")->get("password");
        $port     = $this->get("request")->get("port");
        $driver   = $this->get("request")->get("driver");

        if (trim($config) == "" || trim($name) == "" || trim($config) == "" ||
            trim($host) == "" || trim($user) == "" || trim($driver) == "") {
            return ((new Renderer())->jsonRenderer(array("code" => 500,
                "msg" => "Error on databases parameters : A parameter is empty")));
        }


        if (!filter_var($host, FILTER_VALIDATE_IP)) {
            return ((new Renderer())->jsonRenderer(array("code" => 500,
                "msg" => "$host is a valid IP address")));
        }
        $file = JL::open(FEnv::get("framework.config.db.file"));
        if (isset($file->$config)) {
            return ((new Renderer())->jsonRenderer(array("code" => 500, "msg" => "Error on databases parameters")));
        }

        $file->$config = new \stdClass();
        $file->$config->db_name = $name;
        $file->$config->db_host = $host;
        $file->$config->db_port = $port;
        $file->$config->db_user = $user;
        $file->$config->db_password = $password;
        $file->$config->db_driver = $driver;

        JL::put(FEnv::get("framework.config.db.file"), json_encode($file, JSON_PRETTY_PRINT));

        return ((new Renderer())->jsonRenderer(array("code" => 200, "msg" => "OK")));
    }

    /** Clean a string
     * @param string $string String value
     * @param bool $space_remove Remove space (default set true)
     * @return null|string|string[]
     */
    private function clean(string $string, bool $space_remove = true) {
        $string = trim($string);
        if ($space_remove) {
            $string = str_replace(' ', '-', $string);
        }
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
    }
}
