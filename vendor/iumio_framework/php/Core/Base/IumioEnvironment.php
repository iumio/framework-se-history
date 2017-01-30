<?php

namespace IumioFramework\Core\Base;
use IumioFramework\Theme\Server\Server403;
use ArrayObject;

/**
 * Class IumioEnvironment
 * @package IumioFramework\Core\Base
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class IumioEnvironment
{

    /** Define all environment constants
     * @param string $env Environmment
     * @return int Is a success
     */
    public static function definer(string $env):int
    {
        define('ENVIRONMENT', $env);
        define('HOST', $_SERVER['HTTP_HOST']);
        define('HOST_CURRENT', $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']));
        define('ROOT', strstr($_SERVER['DOCUMENT_ROOT'], 'web', true));
        define('ROOT_VENDOR', strstr($_SERVER['DOCUMENT_ROOT'], 'web', true)."vendor/iumio_framework/");
        define('ROOT_MANAGER', strstr($_SERVER['DOCUMENT_ROOT'], 'web', true)."vendor/iumio_framework/Core/Additional/Manager/");
        define('ROOT_VENDOR_LIBS', strstr($_SERVER['DOCUMENT_ROOT'], 'web', true)."vendor/libs/");
        define('CACHE_DEV', strstr($_SERVER['DOCUMENT_ROOT'], 'web', true)."core/cache/dev/");
        define('CACHE_PROD', strstr($_SERVER['DOCUMENT_ROOT'], 'web', true)."core/cache/prod/");
        define('CACHE_PREPROD', strstr($_SERVER['DOCUMENT_ROOT'], 'web', true)."core/cache/preprod/");
        define('THEME', strstr($_SERVER['DOCUMENT_ROOT'], 'web', true)."vendor/iumio_framework/theme/");
        define('ROOT_APPS', strstr($_SERVER['DOCUMENT_ROOT'], 'web', true)."apps/");

        return (1);
    }

    /** Display an Error
     * @param array $options Error options
     * @return int Is success
     */
    public static function displayError(array $options):int
    {
        $server = new Server403(new ArrayObject($options));
        $server->display();

        return (1);
    }
}