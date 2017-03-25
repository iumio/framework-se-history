<?php

namespace iumioFramework\Core\Additionnal\Template;
use iumioFramework\Core\Additionnal\Server\iumioServerManager;

try
{
    require_once ROOT_VENDOR_LIBS.'mustache/src/Mustache/Autoloader.php';
    \Mustache_Autoloader::register();
}
catch (\Exception $exception)
{
    throw new \Exception("iumioMustache Error : Cannot load Engine Template. No such file or directory");
}

/**
 * Class iumioMustache
 * @package iumioFramework\Core\Additionnal\Template
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

final class iumioMustache
{
    private static $instance = NULL;
    private static $appCall = NULL;
    public static $viewExtention = ".html";

    /**
     * iumioMustache constructor.
     * @throws \Exception
     */
    private function __construct()
    {
        try
        {
            if (ENVIRONMENT == "DEV")
                $envcache = CACHE_DEV;
            else if (ENVIRONMENT == "PROD")
                $envcache = CACHE_PROD;
            else if (ENVIRONMENT == "PREPROD")
                $envcache = CACHE_PREPROD;


            $dirapp = ((IS_IUMIO_COMPONENT)? BASE_APPS :  ROOT_APPS);

            iumioServerManager::create($dirapp . self::$appCall . '/Front/views', "directory");
            iumioServerManager::create($dirapp . self::$appCall . '/Front/views/partials', "directory");

            $options =  array('extension' => self::$viewExtention);
            self::$instance = new \Mustache_Engine(array(
                'template_class_prefix' => '__iumioTemp_',
                'cache' => $envcache.'/tmp/cache/mustache',
                'cache_file_mode' => 0666, // Please, configure your umask instead of doing this :)
                'cache_lambda_templates' => true,
                'loader' => new \Mustache_Loader_FilesystemLoader($dirapp.self::$appCall.'/Front/views', $options),
                'partials_loader' => new \Mustache_Loader_FilesystemLoader($dirapp.self::$appCall.'/Front/views/partials', $options),
                'helpers' => array('i18n' => function($text) {
                    // do something translatey here...
                }),
                'escape' => function($value) {
                    return htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
                },
                'charset' => 'ISO-8859-1',
                'logger' => new \Mustache_Logger_StreamLogger('php://stderr'),
                'strict_callables' => true,
                'pragmas' => [\Mustache_Engine::PRAGMA_FILTERS],
            ));
        }
        catch(\Exception $exception)
        {
            self::$appCall = NULL;
            self::$instance = NULL;
            throw new \Exception("iumioTemplate Error : Cannot loading Mustache Engine Template => ".$exception->getMessage());
        }

    }

    /** Return an instance of iumioMustache
     * @param string $appFullName
     * @return \Mustache_Engine Instance of Mustache_Engine
     */
    static public function getMustacheInstance(string $appFullName):\Mustache_Engine
    {
        if (self::$instance == NULL)
        {
            if (self::$appCall != $appFullName)
            {
                self::$appCall = $appFullName;
                new iumioMustache();
            }
        }

        return (self::$instance);
    }

}