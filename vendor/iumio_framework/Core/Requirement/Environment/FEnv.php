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

namespace iumioFramework\Core\Requirement\Environment;

use iumioFramework\Core\Base\Http\ParameterRequest;
use iumioFramework\Exception\Server\Server403;
use ArrayObject;
use iumioFramework\Exception\Server\Server500;
use iumioFramework\Requirement\Environment\FEnvInterface;

/**
 * Class FEnv
 * This class is an alias of FrameworkEnvironment
 * @package iumioFramework\Core\Requirement
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */

class FEnv extends FrameworkEnvironment implements FEnvInterface
{

    /** Get a path value in framework_path
     * @param string $param Parameter name (index name)
     * @param string $appname App name (default set to null)
     * @return mixed The path value
     * @throws Server500 If parameter name does not exist
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
                    throw new Server500(new ArrayObject(array("explain" =>
                        "Undefined [app.call] index", "solution" =>
                        "Please refer to the framework documentation to get the proper path.")));
                }
            }
            else {
                return (self::$framework_paths[$param]);
            }
        }
        else {
            throw new Server500(new ArrayObject(array("explain" =>
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
     * @return bool The result of isset (false: not isset; true : is isset)
     */
    public static function isset(string $index):bool {
        return (isset(self::$framework_paths[$index])? true : false);
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
}
