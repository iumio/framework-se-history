<?php

namespace IumioFramework\Core\Base;
use IumioFramework\Theme\Server\Server403;
use ArrayObject;

/**
 * Class IumioEnvironment
 * @package IumioFramework\Core\Base
 */

class IumioEnvironment
{

    /**
     * @param string $env
     * @return int
     */
    public static function definer(string $env):int
    {
        define('ENVIRONMENT', $env);
        define('HOST', $_SERVER['HTTP_HOST']);
        define('HOST_CURRENT', $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']));
        define('ROOT', strstr($_SERVER['DOCUMENT_ROOT'], 'web', true));
        define('ROOT_VENDOR', strstr($_SERVER['DOCUMENT_ROOT'], 'web', true)."vendor/iumio_framework/");
        define('THEME', strstr($_SERVER['DOCUMENT_ROOT'], 'web', true)."vendor/iumio_framework/theme/");

        return (1);
    }

    /**
     * @param array $options
     * @return int
     */
    public static function displayError(array $options):int
    {
        $server = new Server403(new ArrayObject($options));
        $server->display();

        return (1);
    }
}