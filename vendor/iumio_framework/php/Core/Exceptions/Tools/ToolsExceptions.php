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

namespace iumioFramework\Exception\Tools;

use iumioFramework\Core\Base\Json\JsonListener;

/**
 * Class ToolsExceptions
 * @package iumioFramework\Exception\Tools
 * @author RAFINA Dany <danyrafina@gmail.com>
 */
class ToolsExceptions
{

    /** Check if UIDIE exist in logs files
     * @param string $uidie The unique identifier of iumio Exeception
     * @return bool If exists or not
     */
    final static public function checkUidieExist(string $uidie):bool
    {
        $logs_dev = (array) JsonListener::open(ROOT_LOGS."dev.log.json");
        $logs_prod = (array) JsonListener::open(ROOT_LOGS."prod.log.json");

        foreach ($logs_dev as $one)
        {
            if ($one->uidie == $uidie) return (true);
        }

        foreach ($logs_prod as $one)
        {
            if ($one->uidie == $uidie) return (true);
        }

        return (false);
    }

    /** Generate an unique identifier of iumio Exeception
     * @return string The UIDIE
     */
    final static public function generate_uidie():string
    {
        $uidie_nok = true;
        $length = 12;
        $str = "";

        while ($uidie_nok == true) {

            $characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
            $max = count($characters) - 1;
            for ($i = 0; $i < $length; $i++) {
                $rand = mt_rand(0, $max);
                $str .= $characters[$rand];
            }
            $uidie_nok = self::checkUidieExist($str);
        }
        return ($str);
    }

    /** Get ip client
     * @return string the client ip
     */
    final static public function getClientIp():string
    {
        if (isset($_SERVER['HTTP_CLIENT_IP'])) return $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) return $_SERVER['HTTP_X_FORWARDED_FOR'];
        else return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
    }

    /** Get Logs list for specific environment
     * @return array Logs list
     */
    static public function getLogs():array
    {
        return ((array) JsonListener::open(ROOT_LOGS.strtolower(IUMIO_ENV).".log.json"));
    }
}