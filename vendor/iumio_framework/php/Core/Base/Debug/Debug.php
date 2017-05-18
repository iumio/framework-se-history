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

                $debug = json_encode($debug);
                $log = json_decode(JL::open(ROOT_LOGS.strtolower(ENVIRONMENT).".log.json"));
                print_r($log);
                exit();

                /*$f = json_decode(file_get_contents(ROOT_PROJECT."/elements/config_files/apps.json"));
                $lastapp = 0;
                foreach ($f as $one => $val) $lastapp++;
                if ($this->params['isdefault'] == "yes")
                {
                    foreach ($f as $one => $val)
                    {
                        if ($val->isdefault == "yes") {
                            $val->isdefault = "no";
                            break;
                        }
                    }
                }
                $f->$lastapp = new \stdClass();
                $f->$lastapp->name = $this->params['appname'];
                $f->$lastapp->isdefault = $this->params['isdefault'];
                $f->$lastapp->class = "\\".$this->params['appname']."\\".$this->params['appname'];
                $ndate = new \DateTime('UTC');
                $f->$lastapp->creation = $ndate;
                $f->$lastapp->update = $ndate;
                $f = json_encode($f);
                file_put_contents(ROOT_PROJECT."/elements/config_files/apps.json", $f);*/


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