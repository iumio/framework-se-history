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

use iumioFramework\Core\Base\Json\JsonListener;
use iumioFramework\Core\Requirement\Environment\FEnv;
use iumioFramework\Exception\Server\Server500;
use iumioFramework\HttpRoutes\JsRouting;
use iumioFramework\Masters\MasterCore;
use iumioFramework\Base\Renderer\Renderer;
use iumioFramework\Core\Additionnal\Server\ServerManager as Server;
use ManagerApp\Masters\Libs\Diff;

/**
 * Class ApiMaster
 * @package iumioFramework\Core\Manager
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */

class ApiMaster extends MasterCore
{
    
    /**
     * Going to deployer manager
     */
    public function apiActivity()
    {
        return ($this->render("apimanager", array("selected" => "apimanager", "loader_msg" => "API Manager")));
    }

    /**
     * Check if the requirements are correct
     */
    public function getRequirementsActivity()
    {
        $configs = JsonListener::open(FEnv::get("framework.config.core.config.file"));
        $default = $configs->default_env;
        if ($default == "prod") {
            JsonListener::close(FEnv::get("framework.config.core.config.file"));
            return ((new Renderer())->jsonRenderer(array("code" => 500,
                "results" => "Cannot get deployment requirements : Framework is already deployed")));
        }

        JsonListener::close(FEnv::get("framework.config.core.config.file"));

        for ($i = 0; $i < count($this->requirements); $i++)
        {
            switch ($this->requirements[$i]["p"])
            {
                case "RWX":
                        if (is_readable($this->requirements[$i]["path"]) &&
                            is_writable($this->requirements[$i]["path"]) &&
                            is_executable($this->requirements[$i]["path"])) {
                            $this->requirements[$i]["status"] = true;
                        } else {
                            $this->requirements[$i]["status"] = false;
                        }
                    break;
                case "R":
                    if (is_readable($this->requirements[$i]["path"])) {
                        $this->requirements[$i]["status"] = true;
                    } else {
                        $this->requirements[$i]["status"] = false;
                    }
                    break;
                case "W":
                    if (is_writable($this->requirements[$i]["path"])) {
                        $this->requirements[$i]["status"] = true;
                    } else {
                        $this->requirements[$i]["status"] = false;
                    }
                    break;
                case "X":
                    if (is_executable($this->requirements[$i]["path"])) {
                        $this->requirements[$i]["status"] = true;
                    } else {
                        $this->requirements[$i]["status"] = false;
                    }
                    break;
                case "RW":
                    if (is_readable($this->requirements[$i]["path"]) &&
                        is_writable($this->requirements[$i]["path"])) {
                        $this->requirements[$i]["status"] = true;
                    } else {
                        $this->requirements[$i]["status"] = false;
                    }
                    break;
                case "RX":
                    if (is_readable($this->requirements[$i]["path"]) &&
                        is_executable($this->requirements[$i]["path"])) {
                        $this->requirements[$i]["status"] = true;
                    } else {
                    $this->requirements[$i]["status"] = false;
                    }
                    break;
                case "XW":
                    if (is_writable($this->requirements[$i]["path"]) &&
                        is_executable($this->requirements[$i]["path"])) {
                        $this->requirements[$i]["status"] = true;
                    } else {
                        $this->requirements[$i]["status"] = false;
                    }
                    break;
                case "D":
                    if (file_exists($this->requirements[$i]["path"])) {
                        $this->requirements[$i]["status"] = false;
                    }
                    else {
                        $this->requirements[$i]["status"] = true;
                    }
                    break;
                default:
                    throw new Server500(new \ArrayObject(array("explain" => "Undefined permissions ".
                        $this->requirements[$i]["p"])));
                    break;
            }
        }

        return ((new Renderer())->jsonRenderer(array("code" => 200, "results" => $this->requirements)));
    }


    /**
     * Switch to dev environment
     * @throws Server500
     */
    public function switchActivity()
    {
        $configs = JsonListener::open(FEnv::get("framework.config.core.config.file"));
        $default = $configs->default_env;
        if ($default == "dev") {
            JsonListener::close(FEnv::get("framework.config.core.config.file"));
            return ((new Renderer())->jsonRenderer(array("code" => 500,
                "results" => "Cannot switch environment : Able to switch only dev environment")));
        }

        $configs->default_env = "dev";
        JsonListener::put(FEnv::get("framework.config.core.config.file"),
            json_encode($configs, JSON_PRETTY_PRINT));
        JsonListener::close(FEnv::get("framework.config.core.config.file"));

        return ((new Renderer())->jsonRenderer(array("code" => 200, "msg" => "OK")));
    }


    /**
     * Deploy to prod environment
     * @throws Server500
     */
    public function deployActivity()
    {
        $configs = JsonListener::open(FEnv::get("framework.config.core.config.file"));
        $default = $configs->default_env;
        if ($default == "prod") {
            JsonListener::close(FEnv::get("framework.config.core.config.file"));
            return ((new Renderer())->jsonRenderer(array("code" => 500,
                "results" => "Cannot deployed to production environment : Your(s) app(s) are already deployed")));
        }

        $configs->default_env = "prod";
        JsonListener::put(FEnv::get("framework.config.core.config.file"),
            json_encode($configs, JSON_PRETTY_PRINT));
        JsonListener::close(FEnv::get("framework.config.core.config.file"));

        //ASSETS MASTER
        $assets = $this->getMaster("Assets");
        $assets->clear("_all", "prod");
        $assets->publish("_all", "prod");

        // CACHE MASTER
        $cache = $this->getMaster("Cache");
        $cache->deleteAllCache();

        // COMPILED MASTER
        $compiled = $this->getMaster("Compile");
        $compiled->deleteAllCompile();

        // AUTOLOADER MASTER
        $auto = $this->getMaster("Autoloader");
        $auto->clearClassMap("prod");
        $auto->buildClassMap("prod");

        // JS ROUTING MASTER
        $rt = new JsRouting();
        $rt->build();

        return ((new Renderer())->jsonRenderer(array("code" => 200, "msg" => "OK")));
    }
}
