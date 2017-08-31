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


namespace iumioFramework\Core\Additionnal\Template;
use iumioFramework\Core\Additionnal\Server\iumioServerManager;
use iumioFramework\Core\Additionnal\Template\iumioSmartyConfiguration as SmartyConfig;
use iumioFramework\Exception\Server\Server500;

try
{
    include_once ROOT_VENDOR_LIBS.'smarty/smarty/libs/Smarty.class.php';
}
catch (\Exception $exception)
{
    throw new \Exception("Cannot load Engine Template - Smarty. No such file or directory : Check if composer install was made");
}

/**
 * Class iumioSmarty
 * @package iumioFramework\Core\Additionnal\Template
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

final class iumioSmarty
{
    private static $instance = NULL;
    private static $appCall = NULL;
    public static $viewExtention = ".tpl";

    /**
     * iumioMustache constructor.
     * @throws \Exception
     */
    private function __construct()
    {
        try
        {
            if (IUMIO_ENV == "DEV")
            {
                $envcache = CACHE_DEV;
                $compiled = COMPILED_DEV;
            }
            else if (IUMIO_ENV == "PROD")
            {
                $envcache = CACHE_PROD;
                $compiled = COMPILED_PROD;
            }
            else
                throw new Server500(new \ArrayObject(array("explain" => "Undefined environment ".IUMIO_ENV,
                    "solution" => "Please check iumio Environment")));


            if (self::$appCall != "iumio")
            {
                $dirapp = ((IS_IUMIO_COMPONENT) ? BASE_APPS : ROOT_APPS);
                iumioServerManager::create($dirapp . self::$appCall . '/Front/views', "directory");
            }

            self::$instance = new \Smarty();
            $sconfig = new SmartyConfig(IUMIO_ENV);

            if (self::$appCall != "iumio")
                self::$instance->setTemplateDir($dirapp.self::$appCall.'/Front/views');
            else
                self::$instance->setTemplateDir(OVERRIDES.'/Exceptions/views');
            self::$instance->setCompileDir($compiled.$sconfig->getCompiledDirectory());
            self::$instance->setCacheDir($envcache.$sconfig->getCacheDirectory());
            self::$instance->setConfigDir(CONFIG_DIR.$sconfig->getConfigDirectory());

            self::$instance->debugging = $sconfig->getDebug();
            self::$instance->compile_check = $sconfig->getCompileCheck();
            self::$instance->setForceCompile($sconfig->getForceCompile());
            self::$instance->debug_tpl = 'file:' . ADDITIONALS . 'TaskBar/views/iumioTaskBar.tpl';
            self::enableSmartyDebug($sconfig->getSmartyDebug());
            self::$instance->caching = $sconfig->getCache();

            $this->registerBasePlugins();

        }
        catch(\Exception $exception)
        {
            self::$appCall = NULL;
            self::$instance = NULL;
            throw new Server500(new \ArrayObject(array("explain" => "Cannot loading Smarty Engine Template => ".$exception->getMessage(),
                "solution" => "Please check Smarty Configuration")));
        }

    }

    /** Enable smarty debug tool
     * @param bool $status Debug status (true for 'on' or false for 'off')
     */
    final static public function enableSmartyDebug(bool $status)
    {
        $sconfig = new SmartyConfig(IUMIO_ENV);
        if ($status == true)
            define ('DISPLAY_SMARTY_DEBUG', $sconfig->getConsoleDebug());
        else if ($status == false)
            define ('DISPLAY_SMARTY_DEBUG', $sconfig->getConsoleDebug());
    }

    /**
     * Register base plugin for smarty views
     */
    final protected function registerBasePlugins():int
    {

        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'webassets', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "webassets"));

        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'jquery', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "jquery"));

        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'fawesome_css', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "font_awesome_css"));
        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'fawesome_less', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "font_awesome_less"));
        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'fawesome_scss', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "font_awesome_scss"));
        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'fawesome_fonts', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "font_awesome_fonts"));


        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'framework_info', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "f_info"));
        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'system_info', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "s_info"));

        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'bootstrap_js', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "btsp_js"));
        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'bootstrap_css', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "btsp_css"));

        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'animate_css', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "animate_css"));

        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'css', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "css"));
        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'js', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "js"));

        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'css_libs', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "css_libs"));
        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'js_libs', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "js_libs"));

        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'css_manager', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "css_manager"));
        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'js_manager', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "js_manager"));
        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'img_manager', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "img_manager"));


        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'css_iumio', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "css_iumio"));
        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'js_iumio', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "js_iumio"));
        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'img_iumio', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "img_iumio"));

        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'skel', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "skel"));

        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'util', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "util"));

        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'route', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "route"));
        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'taskbar', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "taskbar"));

        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'rt', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "rt_file"));

        return (1);
    }

    /** Return an instance of iumioSmarty
     * @param string $appFullName
     * @return \Smarty Instance of Smarty
     */
    static public function getSmartyInstance(string $appFullName = NULL):\Smarty
    {
        if (self::$instance == NULL)
        {
            if (self::$appCall != $appFullName)
            {
                self::$appCall = $appFullName;
                new iumioSmarty();
            }
        }
        return (self::$instance);
    }

}