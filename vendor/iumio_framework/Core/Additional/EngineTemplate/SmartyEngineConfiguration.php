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

namespace iumioFramework\Core\Additionnal\Template;

use iumioFramework\Core\Requirement\Environment\FEnv;
use iumioFramework\Core\Base\Json\JsonListener as JL;
use iumioFramework\Exception\Server\Server500;

/**
 * Class SmartyEngineConfiguration
 * @package iumioFramework\Core\Additionnal\Template
 * @author RAFINA Dany <dany.rafina@iumio.com>
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */

class SmartyEngineConfiguration
{
    private $cache_directory;
    private $compiled_directory;
    private $config_directory;
    private $debug;
    private $cache;
    private $compile_check;
    private $force_compile;
    private $smarty_debug;
    private $console_debug;
    private $env;

    /**
     * SmartyEngineConfiguration constructor.
     * @param string $env
     * @throws Server500
     */
    public function __construct(string $env)
    {
        switch (strtolower($env)) {
            case "dev":
                $file = (array) (JL::open(FEnv::get("framework.config")."smarty_config/smarty.json"));
                break;
            case "prod":
                $file = (array) (JL::open(FEnv::get("framework.config")."smarty_config/smarty.json"));
                break;
            default:
                throw new Server500(new \ArrayObject(array("explain" => "Smarty Error : Unknow [$env] environment",
                    "solution" => "Environment must be [dev, prod]")));
                break;
        }
        if (empty($file)) {
            throw new Server500(new \ArrayObject(array("explain" => "Smarty Error : Smarty config file is empty",
                "solution" => "Please check your configuration")));
        }

        if (!isset($file[strtolower($env)]) || empty($file[strtolower($env)])) {
            throw new Server500(new \ArrayObject(array("explain" =>
                "Smarty Error : Smarty configuration does not exist for $env environment", "solution" =>
                "Please check your configuration")));
        }

        $this->cache_directory    = $file[strtolower($env)]->cache_directory;
        $this->compiled_directory = $file[strtolower($env)]->compiled_directory;
        $this->config_directory   = $file[strtolower($env)]->config_directory;
        $this->debug              = $file[strtolower($env)]->debug;
        $this->cache              = $file[strtolower($env)]->cache;
        $this->compile_check      = $file[strtolower($env)]->compile_check;
        $this->force_compile      = $file[strtolower($env)]->force_compile;
        $this->smarty_debug       = $file[strtolower($env)]->smarty_debug;
        $this->console_debug      = $file[strtolower($env)]->console_debug;
        $this->env                = strtolower($env);
    }

    /**
     * @return mixed
     */
    public function getCacheDirectory()
    {
        return $this->cache_directory;
    }

    /**
     * @param mixed $cache_directory
     */
    public function setCacheDirectory($cache_directory)
    {
        $this->cache_directory = $cache_directory;
    }

    /**
     * @return mixed
     */
    public function getCompiledDirectory()
    {
        return $this->compiled_directory;
    }

    /**
     * @param mixed $compiled_directory
     */
    public function setCompiledDirectory($compiled_directory)
    {
        $this->compiled_directory = $compiled_directory;
    }

    /**
     * @return mixed
     */
    public function getConfigDirectory()
    {
        return $this->config_directory;
    }

    /**
     * @param mixed $config_directory
     */
    public function setConfigDirectory($config_directory)
    {
        $this->config_directory = $config_directory;
    }

    /**
     * @return mixed
     */
    public function getDebug()
    {
        return $this->debug;
    }

    /**
     * @param mixed $debug
     */
    public function setDebug($debug)
    {
        $this->debug = $debug;
    }

    /**
     * @return mixed
     */
    public function getCache()
    {
        return $this->cache;
    }

    /**
     * @param mixed $cache
     */
    public function setCache($cache)
    {
        $this->cache = $cache;
    }

    /**
     * @return mixed
     */
    public function getCompileCheck()
    {
        return $this->compile_check;
    }

    /**
     * @param mixed $compile_check
     */
    public function setCompileCheck($compile_check)
    {
        $this->compile_check = $compile_check;
    }

    /**
     * @return mixed
     */
    public function getForceCompile()
    {
        return $this->force_compile;
    }

    /**
     * @param mixed $force_compile
     */
    public function setForceCompile($force_compile)
    {
        $this->force_compile = $force_compile;
    }

    /**
     * @return mixed
     */
    public function getSmartyDebug()
    {
        return $this->smarty_debug;
    }

    /**
     * @param mixed $smarty_debug
     */
    public function setSmartyDebug($smarty_debug)
    {
        $this->smarty_debug = $smarty_debug;
    }

    /**
     * @return mixed
     */
    public function getConsoleDebug()
    {
        return $this->console_debug;
    }

    /**
     * @param mixed $console_debug
     */
    public function setConsoleDebug($console_debug)
    {
        $this->console_debug = $console_debug;
    }

    /**
     * @return mixed
     */
    public function getEnv()
    {
        return $this->env;
    }

    /**
     * @param mixed $env
     */
    public function setEnv($env)
    {
        $this->env = $env;
    }
}
