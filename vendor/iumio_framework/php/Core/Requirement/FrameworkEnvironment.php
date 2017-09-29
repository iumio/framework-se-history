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

namespace iumioFramework\Core\Base;

use iumioFramework\Exception\Server\Server403;
use ArrayObject;
use iumioFramework\Exception\Server\Server500;

/**
 * Class FrameworkEnvironment
 * @package iumioFramework\Core\Base
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <danyrafina@gmail.com>
 */

class FrameworkEnvironment
{

    /** Define all environment constants
     * @param string $env Environmment
     * @return int Is a success
     */
    public static function definer(string $env):int
    {
        $base =  __DIR__."/../../../../../";
        define('IUMIO_ENV', $env);
        define('HOST', self::getProtocol()."://".$_SERVER['HTTP_HOST']);
        $current = self::getProtocol()."://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
        $current_temp = substr($current, 0, strpos($current, self::getFileEnv($env)));
        if (strlen($current_temp) > 0) {
            $current = $current_temp;
        }
        if ($current[strlen($current) - 1] == "/") {
            $current = substr($current, 0, (strlen($current) - 1));
        }
        define('HOST_CURRENT', $current);
        define('ROOT', $base);
        define('ELEMS', $base."elements/");
        define('BIN', $base."bin/");
        define('CONFIG_DIR', $base."elements/config_files/");
        define('BASE_APPS', $base."vendor/iumio_framework/php/BaseApps/");
        define('ROOT_VENDOR', $base."vendor/iumio_framework/");
        define('ROOT_MANAGER', $base."vendor/iumio_framework/php/Core/Additional/Manager/");
        define('ADDITIONALS', $base."vendor/iumio_framework/php/Core/Additional/");
        define('ROOT_HOST_FILES', $base."elements/config_files/hosts/");
        define('ROOT_VENDOR_LIBS', $base."vendor/libs/");
        define('ROOT_CACHE', $base."elements/cache/");
        define('ROOT_COMPILED', $base."elements/compiled/");
        define('ROOT_LOGS', $base."elements/logs/");
        define('CACHE_DEV', $base."elements/cache/dev/");
        define('CACHE_PROD', $base."elements/cache/prod/");
        define('COMPILED_DEV', $base."elements/compiled/dev/");
        define('COMPILED_PROD', $base."elements/compiled/prod/");
        define('SERVER_VIEWS', $base."vendor/iumio_framework/php/Core/Exceptions/Server/views/");
        define('SERVER', $base."vendor/iumio_framework/php/Core/Exceptions/Server/");
        define('WEB_ASSETS', $current."/components/apps/");
        define('ROOT_WEB_ASSETS', $base."web/components/apps/");
        define('WEB_LIBS', $current."/components/libs/");
        define('ROOT_WEB_LIBS', $base."web/components/libs/");
        define('ROOT_WEB_COMPONENTS', $base."web/components/");
        define('WEB_FRAMEWORK', $current."/components/libs/iumio_framework/");
        define('WEB_COMPONENTS', $current."/components/");
        define('ROOT_APPS', $base."apps/");
        define('OVERRIDES', ELEMS."overrides/");

        return (1);
    }

    /** Get environment file
     * @param string $env Environment name
     * @return string Environment file
     * @throws \Exception
     */
    public static function getFileEnv(string $env):string
    {
        if ($env == "DEV") {
            return ("Dev.php");
        } elseif ($env == "PROD") {
            return ("Prod.php");
        } else {
            throw new \Exception("iumio Environment Error : Environment $env doesn't exist");
        }
    }

    /** Display an Error
     * @param array $options Error options
     * @param array $options
     * @throws Server403
     */
    public static function displayError(array $options)
    {
        throw new Server403(new ArrayObject($options));
        exit();
    }

    /** Get protocol
     * @return string Protocol value
     */
    private static function getProtocol()
    {
        return ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off')? "https" : "http");
    }

    public static function hostAllowed():int
    {
        if (!in_array(IUMIO_ENV, array("DEV", "PROD"))) {
            throw new Server500(new ArrayObject(array("explain" => "An error was detected on environment declaration",
                "solution" => "Please check the environement declaration.", "external" => "yes")));
        }
        $hosts = file_get_contents(ROOT_HOST_FILES.'hosts.'.strtolower(IUMIO_ENV).'.json');

        if (empty(trim($hosts))) {
            self::displayError((array("explain" => "You are not allowed to access this file.", "solution" =>
                'Check '.basename(__FILE__).' for more information.', "external" => "yes")));
        } else {
            $hosts = json_decode($hosts);
            if (isset($hosts->allowed) && isset($hosts->denied)) {
                if (isset($_SERVER['HTTP_CLIENT_IP'])
                    || isset($_SERVER['HTTP_X_FORWARDED_FOR'])
                    || php_sapi_name() === 'cli-server') {
                    self::displayError((array("explain" => "You are not allowed to access this file.", "solution" =>
                        'Check '.basename(__FILE__).' for more information.', "external" => "yes")));
                } else {
                    $allowed = (array) $hosts->allowed;
                    $denied = (array) $hosts->denied;

                    if ((in_array("", array_map('trim', $allowed)) && in_array(
                        "",
                        array_map('trim', $denied)
                    )) || (in_array(
                        "",
                        array_map('trim', $allowed)
                    ) &&  in_array("*", $denied))) {
                        self::displayError((array("explain" => "You are not allowed to access this file.",
                            "solution" => 'Check '.basename(__FILE__).' for more information.',
                            "external" => "yes")));
                    } elseif (in_array(@$_SERVER['REMOTE_ADDR'], $denied) || (in_array("*", $denied) &&
                            !in_array(@$_SERVER['REMOTE_ADDR'], $allowed))) {
                        self::displayError((array("explain" => "You are not allowed to access this file.", "solution" =>
                            'Check '.basename(__FILE__).' for more information.', "external" => "yes")));
                    } elseif ((!in_array(@$_SERVER['REMOTE_ADDR'], $allowed) && in_array(
                        @$_SERVER['REMOTE_ADDR'],
                        $denied
                    )) || in_array(@$_SERVER['REMOTE_ADDR'], $allowed) &&
                        in_array(@$_SERVER['REMOTE_ADDR'], $denied)) {
                        self::displayError((array("explain" => "You are not allowed to access this file.", "solution" =>
                            'Check '.basename(__FILE__).' for more information.', "external" => "yes")));
                    } else {
                        return (1);
                    }
                }
            } else {
                self::displayError((array("explain" => "You are not allowed to access this file.", "solution" =>
                    'Check '.basename(__FILE__).' for more information.', "external" => "yes")));
            }
        }
        return (0);
    }
}
