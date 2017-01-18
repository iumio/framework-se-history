<?php

namespace IumioFramework\Core\Additionnal\Template;
use IumioFramework\Core\Additionnal\Server\IumioServer;

try
{
    require_once ROOT_VENDOR_LIBS.'mustache/src/Mustache/Autoloader.php';
    \Mustache_Autoloader::register();
}
catch (\Exception $exception)
{
    throw new \Exception("IumioMustache Error : Cannot load Engine Template. No such file or directory");
}

/**
 * Class IumioMustache
 * @package IumioFramework\Core\Additionnal\Template
 */

final class IumioMustache
{
    private static $instance = NULL;
    private static $appCall = NULL;
    public static $viewExtention = ".mustache";

    /**
     * IumioMustache constructor.
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

            IumioServer::create(ROOT_APPS.self::$appCall.'/Front/views', "directory");
            IumioServer::create(ROOT_APPS.self::$appCall.'/Front/views/partials', "directory");

            $options =  array('extension' => self::$viewExtention);
            self::$instance = new \Mustache_Engine(array(
                'template_class_prefix' => '__MyTemplates_',
                'cache' => $envcache.'/tmp/cache/mustache',
                'cache_file_mode' => 0666, // Please, configure your umask instead of doing this :)
                'cache_lambda_templates' => true,
                'loader' => new \Mustache_Loader_FilesystemLoader(ROOT_APPS.self::$appCall.'/Front/views', $options),
                'partials_loader' => new \Mustache_Loader_FilesystemLoader(ROOT_APPS.self::$appCall.'/Front/views/partials'),
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
            throw new \Exception("IumioTemplate Error : Cannot loading Mustache Engine Template => ".$exception->getMessage());
        }

    }

    /** Return an instance of IumioMustache
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
                new IumioMustache();
            }
        }

        return (self::$instance);
    }

}