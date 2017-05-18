<?php

namespace iumioFramework\Core\Additionnal\Template;
use iumioFramework\Core\Additionnal\Server\iumioServerManager;
use iumioFramework\Core\Additionnal\Template\iumioSmartyConfiguration as SmartyConfig;

try
{
    require_once ROOT_VENDOR_LIBS.'smarty/libs/Smarty.class.php';
}
catch (\Exception $exception)
{
    throw new \Exception("iumioSmarty Error : Cannot load Engine Template. No such file or directory");
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
            if (ENVIRONMENT == "DEV")
            {
                $envcache = CACHE_DEV;
                $compiled = COMPILED_DEV;
            }
            else if (ENVIRONMENT == "PROD")
            {
                $envcache = CACHE_PROD;
                $compiled = COMPILED_PROD;
            }
            else if (ENVIRONMENT == "PREPROD")
            {
                $envcache = CACHE_PREPROD;
                $compiled = COMPILED_PREPROD;
            }


            $dirapp = ((IS_IUMIO_COMPONENT)? BASE_APPS :  ROOT_APPS);

            iumioServerManager::create($dirapp . self::$appCall . '/Front/views', "directory");


            self::$instance = new \Smarty();
            $sconfig = new SmartyConfig(ENVIRONMENT);

            self::$instance->setTemplateDir($dirapp.self::$appCall.'/Front/views');
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
            throw new \Exception("iumioTemplate Error : Cannot loading Smarty Engine Template => ".$exception->getMessage());
        }

    }

    /** Enable smarty debug tool
     * @param bool $status Debug status (true for 'on' or false for 'off')
     */
    final static public function enableSmartyDebug(bool $status)
    {
        $sconfig = new SmartyConfig(ENVIRONMENT);
        if ($status == true)
            define ('DISPLAY_SMARTY_DEBUG', $sconfig->getConsoleDebug());
        else if ($status == false)
            define ('DISPLAY_SMARTY_DEBUG', $sconfig->getConsoleDebug());
    }

    /**
     * Register base plugin for smarty views
     */
    final protected function registerBasePlugins()
    {

        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'webassets', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "webassets"));

        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'jquery', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "jquery"));

        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'framework_info', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "f_info"));
        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'system_info', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "s_info"));

        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'bootstrap_js', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "btsp_js"));
        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'bootstrap_css', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "btsp_css"));

        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'css', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "css"));
        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'js', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "js"));

        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'css_libs', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "css_libs"));
        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'js_libs', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "js_libs"));

        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'css_manager', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "css_im"));
        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'js_manager', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "js_im"));
        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'img_manager', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "img_im"));

        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'css_iumio', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "css_iumio"));
        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'js_iumio', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "js_iumio"));
        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'img_iumio', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "img_iumio"));

        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'route', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "route"));
        self::$instance->registerPlugin(\Smarty::PLUGIN_FUNCTION, 'taskbar', array("iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin", "taskbar"));

    }

    /** Return an instance of iumioSmarty
     * @param string $appFullName
     * @return \Smarty Instance of Smarty
     */
    static public function getSmartyInstance(string $appFullName):\Smarty
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