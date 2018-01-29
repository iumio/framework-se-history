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

namespace iumioFramework\Core\Requirement\Environment;

use iumioFramework\Core\Base\Http\ParameterRequest;
use iumioFramework\Exception\Server\Server403;
use ArrayObject;
use iumioFramework\Exception\Server\Server500;

/**
 * Class FrameworkEnvironment
 * @package iumioFramework\Core\Requirement
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */

class FrameworkEnvironment
{

    public static $consts =
        ["IUMIO_ENV", "HOST", "HOST_CURRENT", "ROOT", "ELEMS", "BIN",
            "CONFIG_DIR", "BASE_APPS", "ROOT_VENDOR", "ROOT_MANAGER",
            "ADDITIONALS", "ROOT_HOST_FILES", "ROOT_VENDOR_LIBS",
            "ROOT_CACHE", "ROOT_COMPILED", "ROOT_LOGS", "CACHE_DEV",
            "CACHE_PROD", "COMPILED_DEV", "COMPILED_PROD", "SERVER_VIEWS",
            "SERVER", "WEB_ASSETS", "ROOT_WEB", "ROOT_WEB_ASSETS",
            "WEB_LIBS", "ROOT_WEB_LIBS", "ROOT_WEB_COMPONENTS",
            "WEB_FRAMEWORK", "WEB_COMPONENTS", "ROOT_APPS", "OVERRIDES"];

    protected static $framework_paths = array();
    public static $env_file = "index.php";

    /**
     * Define all environment constants
     * @param string $env Environmment
     * @return int Is a success
     * @throws \Exception
     */
    public static function definer(string $env):int
    {
        $base = realpath(__DIR__ . "/../../../../../")."/";

        define('IUMIO_ENV', $env);

        $current = self::getProtocol()."://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
        $current_temp = substr($current, 0, strpos($current, self::getFileEnv($env)));
        if (strlen($current_temp) > 0) {
            $current = $current_temp;
        }
        if ($current[strlen($current) - 1] == "/") {
            $current = substr($current, 0, (strlen($current) - 1));
        }

        self::$framework_paths =
            [
                "host" =>  self::getProtocol()."://".$_SERVER['HTTP_HOST'],
                "host.current" =>  $current,
                "host.web.components" =>  $current."/components/",
                "host.web.components.apps" =>  $current."/components/apps/",
                "host.web.components.libs" =>  $current."/components/libs/",
                "host.web.components.libs.framework" =>  $current."/components/libs/iumio_framework/",
                "framework.env" =>  $env,
                "framework.root" =>  $base,
                "framework.elements" =>  $base."elements/",
                "framework.bin" =>  $base."bin/",
                "framework.config" =>  $base."elements/config_files/",
                "framework.config.api" =>  $base."elements/config_files/api/",
                "framework.config.core" =>  $base."elements/config_files/core/",
                "framework.config.core.services.file" =>  $base."elements/config_files/core/services/services.json",
                "framework.config.core.apps.file" =>  $base."elements/config_files/core/apps.json",
                "framework.config.core.config.file" =>  $base."elements/config_files/core/framework.config.json",
                "framework.config.db.file" =>  $base."elements/config_files/db/databases.json",
                "framework.config.autoloader" =>  $base."elements/config_files/engine_autoloader/",
                "framework.config.autoloader.dev.file" =>  $base."elements/config_files/engine_autoloader/map.class.dev.json",
                "framework.config.autoloader.prod.file" =>  $base."elements/config_files/engine_autoloader/map.class.prod.json",
                "framework.config.hosts.dev.file" =>  $base."elements/config_files/hosts/hosts.dev.json",
                "framework.config.hosts.prod.file" =>  $base."elements/config_files/hosts/hosts.prod.json",
                "framework.config.smarty.file" =>  $base."elements/config_files/smarty_config/smarty.json",
                "framework.baseapps" =>  $base."vendor/iumio_framework/BaseApps/",
                "framework.baseapps.apps.file" =>  $base."vendor/iumio_framework/BaseApps/apps.json",
                "framework.vendor_iumio" =>  $base."vendor/iumio_framework/",
                "framework.fcm" =>  $base."vendor/iumio_framework/Core/Additional/Manager/",
                "framework.additional" =>  $base."vendor/iumio_framework/Core/Additional/",
                "framework.hosts" =>  $base."elements/config_files/hosts/",
                "framework.vendor" =>  $base."vendor/",
                "framework.cache" =>  $base."elements/cache/",
                "framework.compiled" =>  $base."elements/compiled/",
                "framework.logs" =>  $base."elements/logs/",
                "framework.logs.dev.file" =>  $base."elements/logs/dev.log",
                "framework.logs.prod.file" =>  $base."elements/logs/prod.log",
                "framework.logs.debug.dev.file" =>  $base."elements/logs/debug.dev.log.json",
                "framework.logs.debug.prod.file" =>  $base."elements/logs/debug.prod.log.json",
                "framework.cache.dev" =>  $base."elements/cache/dev/",
                "framework.cache.prod" =>  $base."elements/cache/prod/",
                "framework.compiled.dev" =>  $base."elements/compiled/dev/",
                "framework.compiled.prod" =>  $base."elements/compiled/prod/",
                "framework.exceptions" =>  $base."vendor/iumio_framework/Core/Exceptions/Server/",
                "framework.exceptions_view" =>  $base."vendor/iumio_framework/Core/Exceptions/Server/views/",
                "framework.web" =>  $base."public/",
                "framework.web.components" =>  $base."public/components/",
                "framework.web.components.apps" =>  $base."public/components/apps/",
                "framework.web.components.libs" =>  $base."public/components/libs/",
                "framework.web.components.libs.framework" =>  $base."public/components/libs/iumio_framework/",
                "framework.apps" =>  $base."apps/",
                "framework.overrides" =>  $base."elements/overrides/",
                "app.front" =>  $base."apps/%app_name%/Front/",
                "app.master" =>  $base."apps/%app_name%/Master/",
                "app.routing" =>  $base."apps/%app_name%/Routing/",
                "app.views" =>  $base."apps/%app_name%/Front/views/",
                "app.resources" =>  $base."apps/%app_name%/Front/Resources/",
                "baseapp.front" =>  $base."vendor/iumio_framework/BaseApps/%app_name%/Front/",
                "baseapp.master" =>  $base."vendor/iumio_framework/BaseApps/%app_name%/Master/",
                "baseapp.routing" =>  $base."vendor/iumio_framework/BaseApps/%app_name%/Routing/",
                "baseapp.views" =>  $base."vendor/iumio_framework/BaseApps/%app_name%/Front/views/",
                "baseapp.resources" =>  $base."vendor/iumio_framework/BaseApps/%app_name%/Front/Resources/",
            ];


        return (1);
    }
    
    /** Get environment file
     * @param string $env Environment name
     * @return string Environment file
     * @throws \Exception
     */
    public static function getFileEnv(string $env):string
    {
        $env = strtolower($env);
        if (in_array($env, array("dev", "prod"))) {
            return (self::$env_file);
        } else {
            throw new \Exception("Environment Error : Environment $env doesn't exist");
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
    }

    /**
     * Get protocol
     * @return string Protocol value
     */
    private static function getProtocol()
    {
        return ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off')? "https" : "http");
    }

    /** Check if host is allowed to access at this environment
     * @return int Is allowed
     * @throws Server403 If host not allowed
     * @throws Server500 If Environment does not exist
     */
    public static function hostAllowed():int
    {
        if (!in_array(self::$framework_paths["framework.env"], array("dev", "prod"))) {
            throw new Server500(new ArrayObject(array("explain" => "An error was detected on environment declaration",
                "solution" => "Please check the environement declaration.", "external" => "yes")));
        }
        $host_env = FEnv::get((FEnv::get("framework.env"))?
            "framework.config.hosts.dev.file" : "framework.config.hosts.prod.file");
        $hosts = file_get_contents($host_env);

        if (empty(trim($hosts))) {
            self::displayError((array("explain" => "You are not allowed to access this file.", "solution" =>
                'Check '.basename(__FILE__).' for more information.', "external" => "yes")));
        } else {
            $hosts = json_decode($hosts);
            if (isset($hosts->allowed) && isset($hosts->denied)) {
                if (isset($_SERVER['HTTP_CLIENT_IP'])
                    || isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
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

    /** Generate a location path using constant
     * @param string $global The constant name
     * @param string $path The path imploded with constant name
     * @return string The location string
     * @throws Server500 If constant name does not exist
     */
    public static function generateLocation(string $global, string $path) {
        $global = strtoupper($global);
        if (defined($global)) {
            return ($global.$path);
        }
        else {
            throw new Server500(new ArrayObject(
                array("explain" => "Undefined global ".$global.
                    " for FrameworkEnvironment.", "solution" => "Please Check the global name")));
        }
    }
}
