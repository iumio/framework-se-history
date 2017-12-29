<?php

/*
 * This is an iumio Framework component
 *
 * (c) RAFINA DANY <dany.rafina@iumio.com>
 *
 * iumio Framework - iumio Components
 *
 * To get more information about licence, please check the licence file
 */

namespace iumioFramework\Core\Base\Debug;

use DateTime;
use iumioFramework\Core\Base\Debug\DebugInterface;
use iumioFramework\Core\Base\Json\JsonListener as JL;
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
     * @return bool Result
     * @throws Server500
     */
    public static function output(string $message, string $interface = 'file'):bool
    {
        if (self::$logstatus == true) {
            self::input($message);

            if ($interface == 'file') {
                $debug = array();
                $debug['time'] = self::$logformat['time'];
                $debug['content'] = self::$logformat['msg'];
                $log = (array) JL::open(ROOT_LOGS.'debug'.strtolower(IUMIO_ENV).".log.json");
                $c = count($log);
                $log[$c] = $debug;
                $log = (object) $log;
                JL::put(
                    ROOT_LOGS.'debug'.strtolower(IUMIO_ENV).".log.json",
                    json_encode($log, JSON_PRETTY_PRINT)
                );
            } elseif ($interface == 'display') {
                echo "<br> Time : " . self::$logformat['time'] . " ### Content : " . self::$logformat['msg'] . "<br>";
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
        return ((array) JL::open(ROOT_LOGS.'debug'.strtolower(IUMIO_ENV).".log.json"));
    }
}
