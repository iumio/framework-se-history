<?php


namespace IumioFramework\Core\Base\Debug;
use DateTime;

// INCLUDED REMOVE NEXT VERSION
include_once 'DebugInterface.php';

/**
 * Class Debug
 * @package IumioFramework\Core\Base\Debug
 */

class Debug implements DebugInterface
{
    static private $logformat;
    static private $logstatus;

    /**
     * @param string $message
     * @param string $interface
     * @return bool
     */
    static public function output(string $message, string $interface = 'file'):bool
    {
        if (self::$logstatus == true) {
            self::input($message);

            if ($interface == 'file')
                ;
            else if ($interface == 'display')
                echo "<br> Time : " . self::$logformat['time'] . " ### Content : " . self::$logformat['msg'] . "<br>";
        }

        return true;
    }

    /**
     * @param string $message
     * @return bool
     */
    static public function input(string $message):bool
    {
        $now = new DateTime();
        $now = $now->format('Y-m-d H:m:s');
        $message = trim($message);

        self::$logformat = array("time" => $now, "msg" => $message);

        return true;

    }

   static public function enabled():bool
   {
       self::$logstatus = true;
       return true;
   }

   static public function disabled():bool
   {
       self::$logstatus = false;
       return true;
   }

}