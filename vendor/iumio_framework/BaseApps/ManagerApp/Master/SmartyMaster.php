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


namespace ManagerApp\Masters;

use iumioFramework\Masters\MasterCore;
use iumioFramework\Core\Base\Json\JsonListener as JL;
use iumioFramework\Base\Renderer\Renderer;

/**
 * Class SmartyMaster
 * @package iumioFramework\Core\Manager
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */

class SmartyMaster extends MasterCore
{

    /**
     * Going to smarty manager
     */
    public function smartyActivity()
    {
        return ($this->render("smartymanager",
            array("selected" => "smartymanager", "loader_msg" => "Smarty Manager")));
    }

    /**
     * Get all SmartyConfig
     */
    public function getAllActivity()
    {
        $file = JL::open(FEnv::get("framework.config")."smarty_config/smarty.json");
        foreach ($file as $one => $value) {
            $value->edit = $this->generateRoute(
                "iumio_manager_smarty_manager_edit",
                array("config" => $one),
                null,
                true
            );
            $value->save = $this->generateRoute(
                "iumio_manager_smarty_manager_save",
                array("config" => $one),
                null,
                true
            );
        }
        return ((new Renderer())->jsonRenderer(array("code" => 200, "msg" => "OK", "results" => $file)));
    }

    /** Get one smarty config
     * @param string $config Config environement name
     * @return int
     */
    public function editActivity(string $config)
    {
        $file = (array) JL::open(FEnv::get("framework.config").'smarty_config/smarty.json');
        foreach ($file as $one => $val) {
            if ($one == $config) {
                return ((new Renderer())->jsonRenderer(array("code" => 200, "results" => $val)));
            }
        }

        return ((new Renderer())->jsonRenderer(array("code" => 200, "results" => array())));
    }

    /** Save one smarty config
     * @param string $config Config environement name
     * @return int
     */
    public function saveActivity(string $config)
    {
        $debug    = $this->get("request")->get("debug");
        $cache    = $this->get("request")->get("cache");
        $compile  = $this->get("request")->get("compile");
        $force    = $this->get("request")->get("force");
        $sdebug   = $this->get("request")->get("sdebug");
        $console  = $this->get("request")->get("console");

        if (!in_array($debug, array('true', 'false')) || !in_array($cache, array('0', '1')) ||
            !in_array($compile, array('true', 'false')) || !in_array($force, array('true', 'false')) ||
            !in_array($sdebug, array('true', 'false')) || !in_array($console, array("on", "off"))) {
            return ((new Renderer())->jsonRenderer(array("code" => 500, "msg" => "Error on smarty parameters")));
        }


        $file = JL::open(FEnv::get("framework.config").'smarty_config/smarty.json');
        if (!isset($file->$config)) {
            return ((new Renderer())->jsonRenderer(array("code" => 500, "msg" => "Error on smarty parameters")));
        }

        $file->$config->debug         = $this->setRealBoolean($debug);
        $file->$config->cache         = (int)$cache;
        $file->$config->compile_check = $this->setRealBoolean($compile);
        $file->$config->force_compile = $this->setRealBoolean($force);
        $file->$config->smarty_debug  = $this->setRealBoolean($sdebug);
        $file->$config->console_debug = $console;

        JL::put(FEnv::get("framework.config")."smarty_config/smarty.json",
            json_encode($file, JSON_PRETTY_PRINT));

        return ((new Renderer())->jsonRenderer(array("code" => 200, "msg" => "OK")));
    }

    /** Set real boolean type
     * @param string $val String value
     * @return bool Conversion value
     */
    private function setRealBoolean(string $val):bool
    {
        if ($val === "true") {
            $val = true;
        } else {
            $val = false;
        }
        return ($val);
    }
}
