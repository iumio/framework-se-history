<?php


namespace iumioFramework\Core\Base\Debug;
use DateTime;
use iumioFramework\Core\Base\Debug\DebugInterface;
use iumioFramework\Core\Base\Json\JsonListener as JL;


/**
 * Class Debug
 * @package iumioFramework\Core\Base\Debug
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class Debug implements DebugInterface
{
    static private $logformat;
    static private $logstatus;

    /** Display a message
     * @param string $message String message
     * @param string $interface Manner to display message
     * @return bool Result
     */
    static public function output(string $message, string $interface = 'file'):bool
    {
        if (self::$logstatus == true) {
            self::input($message);

            if ($interface == 'file')
            {
                $debug = array();
                $debug['time'] = self::$logformat['time'];
                $debug['content'] = self::$logformat['msg'];
                $log = (array) JL::open(ROOT_LOGS.strtolower(ENVIRONMENT).".log.json");
                $c = count($log);
                $log[$c] = $debug;
                $log = (object) $log;
                JL::put(ROOT_LOGS.strtolower(ENVIRONMENT).".log.json", json_encode($log));
            }
            else if ($interface == 'display')
                echo "<br> Time : " . self::$logformat['time'] . " ### Content : " . self::$logformat['msg'] . "<br>";
        }

        return true;
    }

    /** Create template display
     * @param string $message Message to display
     * @return bool Result
     */
    static public function input(string $message):bool
    {
        $now = new DateTime();
        $now = $now->format('Y-m-d H:m:s');
        $message = trim($message);

        self::$logformat = array("time" => $now, "msg" => $message);

        return true;

    }

    /** Enable Logs
     * @return bool Is enabled result
     */
   static public function enabled():bool
   {
       self::$logstatus = true;
       return true;
   }

    /** Disable Logs
     * @return bool Is disabled result
     */
   static public function disabled():bool
   {
       self::$logstatus = false;
       return true;
   }

}