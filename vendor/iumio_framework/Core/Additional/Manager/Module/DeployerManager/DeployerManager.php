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

namespace iumioFramework\Core\Console\Module\Deployer;

use iumioFramework\Additional\Manager\Module\ToolsManager;
use iumioFramework\Core\Base\Json\JsonListener;
use iumioFramework\Core\Console\CoreManager;
use iumioFramework\Core\Console\FEnvFcm;
use iumioFramework\Core\Console\Module\App\OutputManagerOverride as Output;
use iumioFramework\Core\Console\Module\ModuleManager;
use iumioFramework\Core\Console\Module\Assets\AssetsManager as ASM;
use iumioFramework\Core\Console\Module\Cache\CacheManager as CAM;
use iumioFramework\Core\Console\Module\Compiled\CompiledManager as COM;
use iumioFramework\Core\Console\Module\Rt\RtManager as RM;
use iumioFramework\Core\Console\Module\Autoloader\AutoloaderManager as AUM;

/**
 * Class DeployerManager
 * @package iumioFramework\Core\Console\Module\Cache
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */

class DeployerManager extends ToolsManager implements ModuleManager
{
    protected $options;
    protected $requirements = null;

    /**
     * @return mixed|void
     * @throws \iumioFramework\Core\Console\Exceptions\Exception500
     * @throws \iumioFramework\Exception\Server\Server500
     */
    public function __render()
    {
        if (empty($this->options)) {
            Output::displayAsError("Deployer Manager Module Error : You must to specify an option\n");
        }
        $opt = $this->options[2] ?? null;
        if ($opt == "process-deploy") {
            $this->deploy();
        }
        else if ($opt == "process-undeploy") {
            $this->undeploy();
        }
        else {
            Output::displayAsError("Deployer Manager Module Error : Option is not exist.
             Referer to help command to get options list\n");
        }
    }


    /**
     * Check if the requirements are correct
     * @return int
     * @throws \iumioFramework\Core\Console\Exceptions\Exception500
     * @throws \iumioFramework\Exception\Server\Server500
     */
    private function getRequirements()
    {
        $configs = JsonListener::open(FEnvFcm::get("framework.config.core.config.file"));
        $default = $configs->default_env;
        if ($default == "prod") {
            JsonListener::close(FEnvFcm::get("framework.config.core.config.file"));
            Output::displayAsError("Cannot get deployment requirements : Framework is already deployed");
        }

        JsonListener::close(FEnvFcm::get("framework.config.core.config.file"));

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
                    Output::displayAsError("Undefined permissions ".$this->requirements[$i]["p"]);
                    break;
            }
        }

        return (1);
    }


    /**
     * Switch to dev environment
     * @throws \iumioFramework\Core\Console\Exceptions\Exception500
     * @throws \iumioFramework\Exception\Server\Server500
     */
    public function undeploy()
    {
        Output::clear();
        Output::outputAsSuccess("Welcome on Deployer Manager. 
        Now, i process to undeploy your(s) application(s)", "none");
        $configs = JsonListener::open(FEnvFcm::get("framework.config.core.config.file"));
        $default = $configs->default_env;
        if ($default == "dev") {
            JsonListener::close(FEnvFcm::get("framework.config.core.config.file"));
            Output::displayAsError("Cannot switch environment : Able to switch only dev environment");
        }

        $configs->default_env = "dev";
        $configs->location = FEnvFcm::get("framework.root");
        JsonListener::put(FEnvFcm::get("framework.config.core.config.file"),
            json_encode($configs, JSON_PRETTY_PRINT));
        JsonListener::close(FEnvFcm::get("framework.config.core.config.file"));

        Output::outputAsNormal("The undeployment is a success.");
    }


    /**
     * Deploy to prod environment
     * @throws \iumioFramework\Core\Console\Exceptions\Exception500
     * @throws \iumioFramework\Exception\Server\Server500
     */
    public function deploy()
    {
        $configs = JsonListener::open(FEnvFcm::get("framework.config.core.config.file"));
        $default = $configs->default_env;
        if ($default == "prod") {
            JsonListener::close(FEnvFcm::get("framework.config.core.config.file"));
            Output::displayAsError("Cannot deployed to production environment : Your(s) app(s) are already deployed");
        }

        $this->getRequirements();

        $configs->default_env = "prod";
        $configs->location = FEnvFcm::get("framework.root");
        JsonListener::put(FEnvFcm::get("framework.config.core.config.file"),
            json_encode($configs, JSON_PRETTY_PRINT));
        JsonListener::close(FEnvFcm::get("framework.config.core.config.file"));

        //ASSETS MANAGER
        new ASM(array("core/manager", "assets", "--clear","--env=prod", "--noexit"));
        new ASM(array("core/manager", "assets", "--copy", "--env=prod", "--noexit"));

        // CACHE MANAGER
        new CAM(array("core/manager", "cache", "--clear", "--env=ALL", "--noexit"));

        // COMPILED MANAGER
        new COM(array("core/manager", "compiled", "--clear", "--env=ALL", "--noexit"));

        // AUTOLOADER MANAGER
        new AUM(array("core/manager", "autoloader", "--clear", "--env=PROD", "--noexit"));
        new AUM(array("core/manager", "autoloader", "--build", "--env=PROD", "--noexit"));

        // RT MANAGER
        new RM(array("core/manager", "routing", "build", "jsrouting", "--noexit"));

        Output::clear();
        CoreManager::setCurrentModule("Deployer Manager");
        Output::displayAsEndSuccess("The deployment process is successful");
    }


    public function __alter()
    {
        // TODO: Implement __alter() method.
    }

    /**
     * DeployerManager constructor.
     * @param array $options
     * @throws \iumioFramework\Core\Console\Exceptions\Exception500
     * @throws \iumioFramework\Exception\Server\Server500
     */
    public function __construct(array $options = array())
    {
        CoreManager::setCurrentModule("Deployer Manager");
        $this->requirements = array(
            array("s" =>
                "Directory for /elements and subdirectories must have <strong>READ</strong> permissions", "p" => "R",
                "path" => FEnvFcm::get("framework.elements")),
            array("s" =>
                "Directory for /elements/logs and subdirectories must have <strong>READ + WRITE</strong> permissions",
                "p" => "RW", "path" => FEnvFcm::get("framework.logs")),
            array("s" =>
                "Directory /elements/config_files/engine_autoloader&nbsp;
and subdirectories must have <strong>READ + WRITE</strong> permissions",
                "p" => "RW", "path" => FEnvFcm::get("framework.config.autoloader")),
            array("s" =>
                "File /elements/config_files/core/framework.config.json&nbsp;
must have <strong>READ + WRITE</strong> permissions",
                "p" => "RW", "path" => FEnvFcm::get("framework.config.core.config.file")),
            array("s" =>
                "Directory /elements/cache and&nbsp;
subdirectories file must have <strong>READ + WRITE + EXECUTION</strong> permissions",
                "p" => "RWX", "path" => FEnvFcm::get("framework.cache")),
            array("s" =>
                "Directory /public/setup must be <strong>removed</strong>",
                "p" => "D", "path" => FEnvFcm::get("framework.web")."setup/"),
        );

        if (empty($options)) {
            $this->__render();
        } else {
            $this->options = $options;
            $this->__render();
        }
    }
}
