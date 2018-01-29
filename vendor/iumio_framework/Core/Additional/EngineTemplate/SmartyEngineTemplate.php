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


namespace iumioFramework\Core\Additionnal\Template;

use iumioFramework\Core\Additionnal\Server\ServerManager;
use iumioFramework\Core\Additionnal\Template\SmartyEngineConfiguration as SmartyConfig;
use iumioFramework\Core\Base\Json\JsonListener;
use iumioFramework\Core\Requirement\Environment\FEnv;
use iumioFramework\Exception\Server\Exception500;
use iumioFramework\Exception\Server\Server500;


/**
 * Class SmartyEngineTemplate
 * @package iumioFramework\Core\Additionnal\Template
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */

final class SmartyEngineTemplate
{
    private static $instance = null;
    private static $appCall = null;
    public static $viewExtention = ".tpl";

    /**
     * iumioMustache constructor.
     * @throws \Exception
     */
    private function __construct()
    {
        try {
            if (!file_exists(FEnv::get("framework.vendor").'smarty/smarty/libs/Smarty.class.php')) {
                throw new \Exception(
                    "Cannot load Engine Template - Smarty. No such file or directory : 
                    Check if composer install was made"
                );
            }

            $env = FEnv::get("framework.env");

            if ($env == "dev") {
                $envcache = FEnv::get("framework.cache.dev");
                $compiled = FEnv::get("framework.compiled.dev");

            } elseif ($env == "prod") {
                $envcache = FEnv::get("framework.cache.prod");
                $compiled = FEnv::get("framework.compiled.prod");
            } else {
                throw new Server500(new \ArrayObject(array("explain" => "Undefined environment [".
                    FEnv::get("framework.env")."]",
                    "solution" => "Please check Framework Environment")));
            }

            if (self::$appCall != "iumio") {
                $dirapp = FEnv::get((FEnv::get("app.is_components")) ? 'framework.baseapps' : 'framework.apps');
                ServerManager::create($dirapp . self::$appCall . '/Front/views', "directory");
            }

            self::$instance = new \Smarty();
            $sconfig = new SmartyConfig($env);

            if (self::$appCall != "iumio") {
                self::$instance->setTemplateDir($dirapp.self::$appCall.'/Front/views');
            }
            else {
                self::$instance->setTemplateDir(FEnv::get("framework.overrides").'Exceptions/views');
            }
            self::$instance->setCompileDir($compiled.$sconfig->getCompiledDirectory());
            self::$instance->setCacheDir($envcache.$sconfig->getCacheDirectory());

            self::$instance->setConfigDir(FEnv::get("framework.bin").$sconfig->getConfigDirectory());

            self::$instance->debugging = $sconfig->getDebug();
            self::$instance->compile_check = $sconfig->getCompileCheck();
            self::$instance->setForceCompile($sconfig->getForceCompile());
            self::$instance->debug_tpl = 'file:' . FEnv::get("framework.additional") . 'TaskBar/views/iumioTaskBar.tpl';
            self::enableSmartyDebug($sconfig->getSmartyDebug());
            self::$instance->caching = $sconfig->getCache();

            $this->registerBasePlugins();
            $this->registerExtendedPlugin();
        } catch (\Exception $exception) {
            self::$appCall = null;
            self::$instance = null;
            throw new Server500(new \ArrayObject(array("explain" => "Cannot loading Smarty Engine Template => ".
                $exception->getMessage(),
                "solution" => "Please check Smarty Configuration")));
        }
    }

    /** Enable smarty debug tool
     * @param bool $status Debug status (true for 'on' or false for 'off')
     * @throws \Exception
     */
    final public static function enableSmartyDebug(bool $status)
    {
        $sconfig = new SmartyConfig(FEnv::get("framework.env"));
        FEnv::set("framework.smarty.debug",  $sconfig->getConsoleDebug());
        /*if ($status == true) {
            //define('DISPLAY_SMARTY_DEBUG', $sconfig->getConsoleDebug());
            FEnv::set("framework.smarty.debug",  $sconfig->getConsoleDebug());
        } elseif ($status == false) {
            FEnv::set("framework.smarty.debug",  $sconfig->getConsoleDebug());
            //define('DISPLAY_SMARTY_DEBUG', $sconfig->getConsoleDebug());
        }*/
    }

    /**
     * Register base plugin for smarty views
     */
    final protected function registerBasePlugins():int
    {

        self::$instance->registerPlugin(
            \Smarty::PLUGIN_FUNCTION,
            'webassets',
            array("iumioFramework\Core\Additionnal\Template\ViewBasePlugin", "webassets")
        );

        self::$instance->registerPlugin(
            \Smarty::PLUGIN_FUNCTION,
            'jquery',
            array("iumioFramework\Core\Additionnal\Template\ViewBasePlugin", "jquery")
        );

        self::$instance->registerPlugin(
            \Smarty::PLUGIN_FUNCTION,
            'fawesome_css',
            array("iumioFramework\Core\Additionnal\Template\ViewBasePlugin", "fontawesomecss")
        );
        self::$instance->registerPlugin(
            \Smarty::PLUGIN_FUNCTION,
            'fawesome_less',
            array("iumioFramework\Core\Additionnal\Template\ViewBasePlugin", "fontawesomeless")
        );
        self::$instance->registerPlugin(
            \Smarty::PLUGIN_FUNCTION,
            'fawesome_scss',
            array("iumioFramework\Core\Additionnal\Template\ViewBasePlugin", "fontawesomescss")
        );
        self::$instance->registerPlugin(
            \Smarty::PLUGIN_FUNCTION,
            'fawesome_fonts',
            array("iumioFramework\Core\Additionnal\Template\ViewBasePlugin", "fontawesomefonts")
        );


        self::$instance->registerPlugin(
            \Smarty::PLUGIN_FUNCTION,
            'framework_info',
            array("iumioFramework\Core\Additionnal\Template\ViewBasePlugin", "finfo")
        );
        self::$instance->registerPlugin(
            \Smarty::PLUGIN_FUNCTION,
            'system_info',
            array("iumioFramework\Core\Additionnal\Template\ViewBasePlugin", "sinfo")
        );

        self::$instance->registerPlugin(
            \Smarty::PLUGIN_FUNCTION,
            'bootstrap_js',
            array("iumioFramework\Core\Additionnal\Template\ViewBasePlugin", "btspjs")
        );
        self::$instance->registerPlugin(
            \Smarty::PLUGIN_FUNCTION,
            'bootstrap_css',
            array("iumioFramework\Core\Additionnal\Template\ViewBasePlugin", "btspcss")
        );

        self::$instance->registerPlugin(
            \Smarty::PLUGIN_FUNCTION,
            'animate_css',
            array("iumioFramework\Core\Additionnal\Template\ViewBasePlugin", "animatecss")
        );

        self::$instance->registerPlugin(
            \Smarty::PLUGIN_FUNCTION,
            'css',
            array("iumioFramework\Core\Additionnal\Template\ViewBasePlugin", "css")
        );
        self::$instance->registerPlugin(
            \Smarty::PLUGIN_FUNCTION,
            'js',
            array("iumioFramework\Core\Additionnal\Template\ViewBasePlugin", "js")
        );

        self::$instance->registerPlugin(
            \Smarty::PLUGIN_FUNCTION,
            'css_libs',
            array("iumioFramework\Core\Additionnal\Template\ViewBasePlugin", "csslibs")
        );
        self::$instance->registerPlugin(
            \Smarty::PLUGIN_FUNCTION,
            'js_libs',
            array("iumioFramework\Core\Additionnal\Template\ViewBasePlugin", "jslibs")
        );

        self::$instance->registerPlugin(
            \Smarty::PLUGIN_FUNCTION,
            'css_manager',
            array("iumioFramework\Core\Additionnal\Template\ViewBasePlugin", "cssmanager")
        );
        self::$instance->registerPlugin(
            \Smarty::PLUGIN_FUNCTION,
            'js_manager',
            array("iumioFramework\Core\Additionnal\Template\ViewBasePlugin", "jsmanager")
        );
        self::$instance->registerPlugin(
            \Smarty::PLUGIN_FUNCTION,
            'img_manager',
            array("iumioFramework\Core\Additionnal\Template\ViewBasePlugin", "imgmanager")
        );


        self::$instance->registerPlugin(
            \Smarty::PLUGIN_FUNCTION,
            'css_iumio',
            array("iumioFramework\Core\Additionnal\Template\ViewBasePlugin", "cssiumio")
        );
        self::$instance->registerPlugin(
            \Smarty::PLUGIN_FUNCTION,
            'js_iumio',
            array("iumioFramework\Core\Additionnal\Template\ViewBasePlugin", "jsiumio")
        );
        self::$instance->registerPlugin(
            \Smarty::PLUGIN_FUNCTION,
            'img_iumio',
            array("iumioFramework\Core\Additionnal\Template\ViewBasePlugin", "imgiumio")
        );

        self::$instance->registerPlugin(
            \Smarty::PLUGIN_FUNCTION,
            'skel',
            array("iumioFramework\Core\Additionnal\Template\ViewBasePlugin", "skel")
        );

        self::$instance->registerPlugin(
            \Smarty::PLUGIN_FUNCTION,
            'util',
            array("iumioFramework\Core\Additionnal\Template\ViewBasePlugin", "util")
        );

        self::$instance->registerPlugin(
            \Smarty::PLUGIN_FUNCTION,
            'route',
            array("iumioFramework\Core\Additionnal\Template\ViewBasePlugin", "route")
        );
        self::$instance->registerPlugin(
            \Smarty::PLUGIN_FUNCTION,
            'taskbar',
            array("iumioFramework\Core\Additionnal\Template\ViewBasePlugin", "taskbar")
        );

        self::$instance->registerPlugin(
            \Smarty::PLUGIN_FUNCTION,
            'rt',
            array("iumioFramework\Core\Additionnal\Template\ViewBasePlugin", "rtfile")
        );

        return (1);
    }

    /**
     * Register an new plugin for smarty template
     * @throws Server500
     */
    final private function registerExtendedPlugin()
    {
        if (self::$appCall != null) {
            if (ServerManager::exist( FEnv::get("framework.apps").FEnv::get("app.call")."/Extra/".
                strtolower(FEnv::get("app.call")).".view.plugin.json")) {
                $file = JsonListener::open(FEnv::get("framework.apps").FEnv::get("app.call")."/Extra/".
                    strtolower(FEnv::get("app.call")).".view.plugin.json");
                foreach ($file as $one => $value) {
                    if ($one == null || $one == "") {
                        throw new Server500(new \ArrayObject(array("explain" =>
                            "Parse error on " . strtolower(FEnv::get("app.call")) . ".view.plugin.json file",
                            "solution" => "Please check the file syntax")));
                    }

                    if (!isset($value->namespace) || ($value->namespace) == "" || ($value->namespace) == null) {
                        throw new Server500(new \ArrayObject(array("explain" =>
                            "Parse error on " . strtolower(FEnv::get("app.call")) .
                            ".view.plugin.json file => Cannot determine the plugin namespace",
                            "solution" => "Please add the correct plugin namespace")));
                    }

                    if (!isset($value->function) || ($value->function) == "" || ($value->function) == null) {
                        throw new Server500(new \ArrayObject(array("explain" =>
                            "Parse error on " . strtolower(FEnv::get("app.call")) .
                            ".view.plugin.json file => Cannot determine the plugin function",
                            "solution" => "Please add the correct plugin function")));
                    }
                    self::$instance->registerPlugin(
                        \Smarty::PLUGIN_FUNCTION,
                        $one,
                        array($value->namespace, $value->function)
                    );
                }
            }

        }

    }

    /** Return an instance of SmartyEngineTemplate
     * @param string $appFullName
     * @return \Smarty Instance of Smarty
     */
    public static function getSmartyInstance(string $appFullName = null):\Smarty
    {
        if (self::$instance == null) {
            if (self::$appCall != $appFullName) {
                self::$appCall = $appFullName;;
                new SmartyEngineTemplate();
            }
        }
        return (self::$instance);
    }

}
