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

namespace iumioFramework\Core\Base\Debug;

use DateTime;
use iumioFramework\Base\Renderer\Renderer;
use iumioFramework\Core\Base\Debug\DebugInterface;
use iumioFramework\Core\Base\Json\JsonListener as JL;
use iumioFramework\Core\Requirement\Environment\FEnv;
use iumioFramework\Exception\Server\Server500;

/**
 * Class Debug
 * @package iumioFramework\Core\Base\Debug
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */

class Debug implements DebugInterface
{
    static private $logformat;
    static private $logstatus;

    /** Display a message
     * @param string $message String message
     * @param string $interface Manner to display message
     * @return mixed Result
     * @throws Server500
     */
    public static function output(string $message, string $interface = 'file')
    {
        $env = FEnv::get("framework.env");
        $file_debug = FEnv::get(($env === "dev")? "framework.logs.debug.dev.file" : "framework.logs.debug.prod.file");
        if (self::$logstatus == true) {
            self::input($message);

            if ($interface == 'file') {
                $debug = array();
                $debug['time'] = self::$logformat['time'];
                $debug['content'] = self::$logformat['msg'];
                $log = (array) JL::open($file_debug);
                $c = count($log);
                $log[$c] = $debug;
                $log = (object) $log;
                JL::put(
                    $file_debug, json_encode($log, JSON_PRETTY_PRINT)
                );
                
                JL::close($file_debug);
            } elseif ($interface == 'screen') {
                return (new Renderer())->textRenderer("<br>Time : " . self::$logformat['time'] .
                    " ### Content : " . self::$logformat['msg'] . "<br>");
            }
            else {
                throw new Server500(new \ArrayObject(array("explain" => "Undefined interface $interface",
                    "solution" => "interface available for debug [file, screen]", "line_error" => "43")));
            }
        }

        return true;
    }

    /** Create template display
     * @param string $message Message to display
     * @return bool Result
     */
    public static function input(string $message):bool
    {
        $now = new DateTime();
        $now = $now->format('Y-m-d H:i:s');
        $message = trim($message);

        self::$logformat = array("time" => $now, "msg" => $message);

        return true;
    }


    /** Enable Logs
     * @return bool Is enabled result
     */
    public static function enabled():bool
    {
        self::$logstatus = true;
        return true;
    }

    /** Disable Logs
     * @return bool Is disabled result
     */
    public static function disabled():bool
    {
        self::$logstatus = false;
        return true;
    }

    /** Get debug Logs list for specific environment
     * @return array Logs list
     * @throws Server500
     */
    public static function getLogs():array
    {
        return ((array) JL::open(FEnv::get(($env === "dev")? "framework.logs.debug.dev.file" :
            "framework.logs.debug.prod.file")));
    }
}
