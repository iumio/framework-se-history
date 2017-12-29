<?php

/*
 * This is an iumio Framework component
 *
 * (c) RAFINA DANY <dany.rafina@iumio.com>
 *
 * iumio Framework - iumio Components
 *
 * To get more information about licence, please check the licence file
 */


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

use iumioFramework\Core\Base\Debug\Debug;
use iumioFramework\Base\Renderer\Renderer;
use iumioFramework\Exception\Server\Server500;
use iumioFramework\Masters\MasterCore;
use iumioFramework\Core\Base\Json\JsonListener as JL;

/**
 * Class HostsMaster
 * @package iumioFramework\Core\Manager
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */

class HostsMaster extends MasterCore
{
    /**
     * Show hosts index
     */
    public function hostsActivity()
    {
        return($this->render("hosts", array("selected" => "hostsmanager")));
    }

    /**
     * Get Hosts list
     */
    public function getAllHostsPerConfigActivity():Renderer
    {
        $file = (array) JL::open(CONFIG_DIR.'hosts/hosts.dev.json');
        if (!(isset($file['allowed'])) || !(isset($file['denied']))) {
            throw new Server500(new \ArrayObject(array("explain" => "Undefined key allowed or denied in host.dev.json",
                "solution" => "Add the correct tags [allowed, denied]")));
        }
        $alloweddev = count((array)$file['allowed']);
        if (in_array("*", (array)$file['allowed'])) {
            $alloweddev = "ALL";
        }
        $denieddev = count((array)$file['denied']);
        if (in_array("*", (array)$file['denied'])) {
            $denieddev = "ALL";
        }
        $editdev = $this->generateRoute(
            "iumio_manager_hosts_manager_edit",
            array("env" => "dev"),
            null,
            true
        );
        $editsavedev = $this->generateRoute(
            "iumio_manager_hosts_manager_edit_save",
            array("env" => "dev"),
            null,
            true
        );

        $file2 = (array) JL::open(CONFIG_DIR.'hosts/hosts.prod.json');
        if (!(isset($file['allowed'])) || !(isset($file['denied']))) {
            throw new Server500(new \ArrayObject(array("explain" => "Undefined key allowed or denied in host.prod.json",
                "solution" => "Add the correct tags [allowed, denied]")));
        }
        $allowedprod= count((array)$file2['allowed']);
        if (in_array("*", (array)$file2['allowed'])) {
            $allowedprod = "ALL";
        }
        $deniedprod = count((array)$file2['denied']);
        if (in_array("*", (array)$file2['denied'])) {
            $deniedprod = "ALL";
        }
        if (in_array("", (array)$file2['denied'])) {
            $deniedprod = "None";
        }
        $editprod = $this->generateRoute(
            "iumio_manager_hosts_manager_edit",
            array("env" => "prod"),
            null,
            true
        );
        $editsaveprod = $this->generateRoute(
            "iumio_manager_hosts_manager_edit_save",
            array("env" => "prod"),
            null,
            true
        );


        $rs = array(
            "dev" => array(
                "allowed" => $alloweddev, "denied" => $denieddev, "edit" => $editdev, "save" => $editsavedev
            ),
            "prod" => array(
                "allowed" => $allowedprod, "denied" => $deniedprod, "edit" => $editprod, "save" => $editsaveprod
            ),
        );


        return ((new Renderer())->jsonRenderer(array("code" => 200,
            "results" => $rs)));
    }


    /**
     * Get one hosts config
     * @param string $env Database environment name
     * @return int
     */
    public function getoneConfigActivity(string $env):Renderer
    {
        if (!in_array($env, array("dev", "prod"))) {
            throw new Server500(new \ArrayObject(array("explain" => "Undefined environment $env", "solution" =>
            "Environment must be [dev or prod]")));
        }

        $file = (array) JL::open(CONFIG_DIR.'hosts/hosts.'.$env.'.json');
        if (!(isset($file['allowed'])) || !(isset($file['denied']))) {
            throw new Server500(new \ArrayObject(array("explain" => "Undefined key allowed or denied in host.dev.json",
                "solution" => "Add the correct tags [allowed, denied]")));
        }

        $allowed = ((array)$file['allowed']);
        $denied = ((array)$file['denied']);


        return ((new Renderer())->jsonRenderer(array("code" => 200,
            "results" => array("allowed" => implode(";", $allowed), "denied" => implode(";", $denied)))));
    }


    /**
     * save one hosts configuration
     * @param string $env Environment name
     * @return int
     */
    public function updateActivity(string $env):Renderer
    {
        $allowed     = $this->get("request")->get("allowed");
        $denied     = $this->get("request")->get("denied");

        if (!in_array($env, array("dev", "prod"))) {
            throw new Server500(new \ArrayObject(array("explain" => "Undefined environment $env", "solution" =>
                "Environment must be [dev or prod]")));
        }

        if (trim($allowed) == "" || trim($denied) == "") {
            return ((new Renderer())->jsonRenderer(array("code" => 500, "msg" => "Error on hosts parameters")));
        }


        $allowed = (object)(explode(";", $allowed));
        $denied = (object)(explode(";", $denied));

        $a = new \stdClass();
        $a->allowed = $allowed;
        $a->denied = $denied;

        JL::put(CONFIG_DIR.'hosts/hosts.'.$env.'.json', json_encode($a, JSON_PRETTY_PRINT));

        return ((new Renderer())->jsonRenderer(array("code" => 200, "msg" => "OK")));
    }

    /**
     * create one Database configuration

     * @return int
     */
    public function createActivity():Renderer
    {
        $config   = $this->get("request")->get("config");
        $name     = $this->get("request")->get("name");
        $host     = $this->get("request")->get("host");
        $user     = $this->get("request")->get("user");
        $password = $this->get("request")->get("password");
        $port     = $this->get("request")->get("port");
        $driver   = $this->get("request")->get("driver");

        if (trim($config) == "" || trim($name) == "" || trim($config) == "" ||
            trim($host) == "" || trim($user) == "" || trim($driver) == "") {
            return ((new Renderer())->jsonRenderer(array("code" => 500, "msg" => "Error on databases parameters")));
        }

        $file = JL::open(CONFIG_DIR.'db/databases.json');
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

        JL::put(CONFIG_DIR."db/databases.json", json_encode($file, JSON_PRETTY_PRINT));

        return ((new Renderer())->jsonRenderer(array("code" => 200, "msg" => "OK")));
    }
}
