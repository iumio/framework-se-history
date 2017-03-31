<?php

namespace iumioFramework\Core\Base;
use iumioFramework\Theme\Server\Server403;
use ArrayObject;

/**
 * Class iumioEnvironment
 * @package iumioFramework\Core\Base
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class iumioEnvironment
{

    /** Define all environment constants
     * @param string $env Environmment
     * @return int Is a success
     */
    public static function definer(string $env):int
    {
        $base =  __DIR__."/../../../../../";
        define('ENVIRONMENT', $env);
        define('HOST', self::getProtocol()."://".$_SERVER['HTTP_HOST']);
        $current = self::getProtocol()."://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
        $current_temp = substr($current, 0, strpos($current, self::getFileEnv($env)));
        if (strlen($current_temp) > 0) $current = $current_temp;
        if ($current[strlen($current) - 1] == "/") $current = substr($current, 0, (strlen($current) - 1));
        define('HOST_CURRENT', $current);
        define('ROOT', $base);
        define('ELEMS', $base."elements/");
        define('BASE_APPS', $base."vendor/iumio_framework/php/BaseApps/");
        define('ROOT_VENDOR', $base."vendor/iumio_framework/");
        define('ROOT_MANAGER', $base."vendor/iumio_framework/Core/Additional/Manager/");
        define('ROOT_VENDOR_LIBS', $base."vendor/libs/");
        define('CACHE_DEV', $base."core/cache/dev/");
        define('CACHE_PROD', $base."core/cache/prod/");
        define('CACHE_PREPROD', $base."core/cache/preprod/");
        define('THEME', $base."vendor/iumio_framework/theme/");
        define('WEB_ASSETS', $current."/components/apps/");
        define('WEB_LIBS', $current."/components/libs/");
        define('WEB_COMPONENTS', $current."/components/");
        define('ROOT_APPS', $base."apps/");

        return (1);
    }

    /** Get environment file
     * @param string $env Environment name
     * @return string Environment file
     * @throws \Exception
     */
    static public function getFileEnv(string $env):string
    {
        if ($env == "DEV")
            return ("iumio_dev.php");
        else if ($env == "PREPROD")
            return ("iumio_preprod.php");
        else if ($env == "PROD")
            return ("iumio_prod.php");
        else
            throw new \Exception("iumio Environment Error : Environment $env doesn't exist");
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

    /** Get protocol
     * @return string Protocol value
     */
    static private function getProtocol()
    {
        return ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off')? "https" : "http");
    }

}