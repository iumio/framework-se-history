<?php

/**
 *
 *  * This is an iumio Framework component
 *  *
 *  * (c) RAFINA DANY <danyrafina@gmail.com>
 *  *
 *  * iumio Framework - iumio Components
 *  *
 *  * To get more information about licence, please check the licence file
 *
 */

namespace ManagerApp\Masters;

use iumioFramework\Core\Additionnal\Server\ServerManager;
use iumioFramework\Core\Additionnal\Zip\ZipEngine;
use iumioFramework\Exception\Server\Server500;
use iumioFramework\Masters\MasterCore;
use iumioFramework\Core\Base\Json\JsonListener as JL;
use iumioFramework\Base\Renderer\Renderer;

/**
 * Class ServicesMaster
 * @package iumioFramework\Core\Manager
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <danyrafina@gmail.com>
 */

class ServicesMaster extends MasterCore
{

    /**
     * Going to app manager
     */
    public function servicesActivity()
    {
        return ($this->render("servicesmanager", array("selected" => "servicesmanager")));
    }


    /**
     * Get all services
     * @return \stdClass $file Services
     */
    public function getAllServices():\stdClass
    {
        $file = JL::open(CONFIG_DIR."core/services/services.json");
        foreach ($file as $one => $value) {
            $value->edit_save = $this->generateRoute(
                "iumio_manager_services_manager_edit_save_service",
                array("servicename" => $one),
                null,
                true
            );

            $value->edit = $this->generateRoute(
                "iumio_manager_services_manager_edit",
                array("servicename" => $one),
                null,
                true
            );

            $value->remove = $this->generateRoute(
                "iumio_manager_services_manager_remove_service",
                array("servicename" => $one),
                null,
                true
            );
        }
        return ($file);
    }

    /**
     * @return int
     */
    public function getallActivity()
    {
        return ((new Renderer())->jsonRenderer(array("code" => 200, "msg" => "OK",
            "results" => $this->getAllServices())));
    }

    /** Get service statistics
     * @return array Service statistics
     */
    public function getStatisticsServices():array
    {

        $f = $this->getAllServices();
        $fs = 0;
        $senable = 0;

        foreach ($f as $one => $val) {
            if ($val->status == "enabled") {
                $senable++;
            }

            $fs++;
        }

        return (array("number" => $fs, "enabled" => $senable));
    }


    /** remove one service
     * @param string $servicename Service name
     * @return int
     */
    public function removeActivity(string $servicename):Renderer
    {
        $removeservice = false;
        $file = JL::open(CONFIG_DIR."core/services/services.json");
        foreach ($file as $one => $val) {
            if ($one == $servicename) {
                unset($file->$one);
                $removeservice  = true;
                break;
            }
        }

        if ($removeservice == false) {
            return ((new Renderer())->jsonRenderer(array("code" => 500, "msg" => "Service does not exist")));
        }

        $f = json_encode($file, JSON_PRETTY_PRINT);
        file_put_contents(CONFIG_DIR."core/services/services.json", $f);

        return ((new Renderer())->jsonRenderer(array("code" => 200, "msg" => "OK")));
    }

    /** Create one service
     * @return Renderer JSON render
     */
    public function createActivity():Renderer
    {
        $name = $this->get("request")->get("name");
        $status = $this->get("request")->get("status");
        $namespace = $this->get("request")->get("namespace");

        if ($name == "") {
            return ((new Renderer())->jsonRenderer(array("code" => 500, "msg" => "Service name is empty : $namespace")));
        }

        if ($status == "" || !in_array($status, array("enabled", "disabled"))) {
            return ((new Renderer())->jsonRenderer(array("code" => 500, "msg" => "Undefined status : $status")));
        }

        if ($namespace == "") {
            return ((new Renderer())->jsonRenderer(array("code" => 500, "msg" => "Undefined namespace : $namespace")));
        }


        $f = json_decode(file_get_contents(CONFIG_DIR."core/services/services.json"));
        foreach ($f as $one => $val) {
           if ($one == $name) {
               return ((new Renderer())->jsonRenderer(array("code" => 500, "msg" => "Service already exist")));
           }
        }

        $f->$name = new \stdClass();
        $f->$name->namespace = $namespace;
        $f->$name->status = $status;
        $f = json_encode($f, JSON_PRETTY_PRINT);
        file_put_contents(CONFIG_DIR."core/services/services.json", $f);

        return ((new Renderer())->jsonRenderer(array("code" => 200, "msg" => "OK")));
    }



    /** edit one service
     * @param string $servicename Service name
     * @return Renderer JSON render
     */
    public function editActivity(string $servicename):Renderer
    {
        $status = $this->get("request")->get("status");
        $namespace = $this->get("request")->get("namespace");

        if ($status == "" || !in_array($status, array("enabled", "disabled"))) {
            return ((new Renderer())->jsonRenderer(array("code" => 500, "msg" => "Undefined status : $status")));
        }

        if ($namespace == "") {
            return ((new Renderer())->jsonRenderer(array("code" => 500, "msg" => "Undefined namespace : $namespace")));
        }


        $f = json_decode(file_get_contents(ROOT."/elements/config_files/core/services/services.json"));

        foreach ($f as $one => $val) {
            if ($one == $servicename) {
                $val->namespace = trim(($namespace));
                $val->status = trim($status);
                break;
            }
        }
        $f = json_encode($f, JSON_PRETTY_PRINT);
        file_put_contents(ROOT."/elements/config_files/core/services/services.json", $f);

        return ((new Renderer())->jsonRenderer(array("code" => 200, "msg" => "OK")));
    }

    /** Get a service
     * @param string $servicename
     * @return int
     */
    public function getOneActivity(string $servicename)
    {
        return ((new Renderer())->jsonRenderer(array("code" => 200, "msg" => "OK", "results" =>
            $this->getService($servicename))));
    }

    /**
     * @param string $servicename service name
     * @return \stdClass Service object
     * @throws Server500 If service does not exist
     */
    public function getService(string $servicename):\stdClass
    {
        $file = (array) JL::open(CONFIG_DIR.'core/services/services.json');
        foreach ($file as $one => $val) {
            if ($one == $servicename) {
                return($val);
            }
        }

        throw new Server500(new \ArrayObject(array("explain" => "Unknow service $servicename",
            "solution" => "Please check services configuration ")));
    }
}
