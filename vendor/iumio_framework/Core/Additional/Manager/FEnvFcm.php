<?php

/**
 *
 *  * This is an iumio Framework component
 *  *
 *  * (c) RAFINA DANY <danyrafina@gmail.com>
 *  *
 *  * iumio Framework - iumio Components
 *  *
 *  * To get more information about licence, please check the licence file
 *
 */

namespace iumioFramework\Core\Console;

use iumioFramework\Additional\Manager\Module\ToolsManager;
use iumioFramework\Core\Console\Exceptions\Exception500;
use iumioFramework\Requirement\Environment\FEnvInterface;
use iumioFramework\Setup\Requirements\Tools;


/**
 * Class FEnvFcm
 * @package iumioFramework\Core\Console
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */
class FEnvFcm implements FEnvInterface
{

    /**
     * Framework environment paths
     * @var null|array
     */
    private static $framework_paths = null;


    /** Initialize a envinronment framework paths
     * @return bool If is a success
     * @throws \Exception
     */
    public static function __initialize():bool {

        $env = (new ToolsManager())->getCurrentEnv();
        $base =  realpath(__DIR__.'/../../../../../').DIRECTORY_SEPARATOR;
        self::$framework_paths =
            [
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
        return (true);

    }


    /** Get a path value in framework_path
     * @param string $param Parameter name (index name)
     * @param string $appname App name (default set to null)
     * @return mixed The path value
     * @throws Exception500 If parameter name does not exist
     */
    public static function get(string $param, string $appname = null) {
        if (isset(self::$framework_paths[$param])) {
            if (strpos(self::$framework_paths[$param], "%app_name%") !== false) {
                if ($appname != null) {
                    return (str_replace("%app_name%", $appname,
                        self::$framework_paths[$param]));
                }
                elseif (isset(self::$framework_paths["app.call"])) {
                    return (str_replace("%app_name%", self::$framework_paths["app.call"],
                        self::$framework_paths[$param]));
                }
                else {
                    throw new Exception500(new \ArrayObject(array("explain" =>
                        "Undefined [app.call] index", "solution" =>
                        "Please refer to the framework documentation to get the proper path.")));
                }
            }
            else {
                return (self::$framework_paths[$param]);
            }
        }
        else {
            throw new Exception500(new \ArrayObject(array("explain" =>
                "Undefined [$param] path", "solution" =>
                "Please refer to the framework documentation to get the proper path.")));
        }

    }

    /**
     * Set or edit path value in framework_path
     * @param $index string The path name
     * @param $value mixed The path value (not only a string)
     * @return int The adding success
     */
    public static function set(string $index, $value):int {
        self::$framework_paths[$index] = $value;
        if (isset(self::$framework_paths[$index])) {
            return (1);
        }
        else {
            return (0);
        }
    }

    /**
     * Check if element is isset in path framework
     * @param string $index Element index
     * @return bool The result of isset (false : not isset; true : is isset)
     */
    public static function isset(string $index):bool {
        return (isset(self::$framework_paths[$index])? 1 : 0);
    }

    /**
     * Remove an element by index
     * @param string $index Element index
     * @return int If element is removed
     *
     */
    public static function remove(string $index):int {
        unset(self::$framework_paths[$index]);
        if (isset(self::$framework_paths[$index])) {
            return (0);
        }
        else {
            return (1);
        }
    }

    /**
     * Get protocol
     * @return string Protocol value
     */
    private static function getProtocol()
    {
        return ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off')? "https" : "http");
    }
}