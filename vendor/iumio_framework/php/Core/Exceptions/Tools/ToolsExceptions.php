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

use iumioFramework\Core\Base\FrameworkEnvironment;
use iumioFramework\Core\Base\Json\JsonListener;
use iumioFramework\Exception\Server\AbstractServer;
use iumioFramework\Exception\Server\Server500;

/**
 * Class ToolsExceptions
 * @package iumioFramework\Exception\Tools
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <danyrafina@gmail.com>
 */
class ToolsExceptions
{

    /** Check if UIDIE exist in logs files
     * @param string $uidie The unique identifier of iumio Exeception
     * @return bool If exists or not
     */
    final public static function checkUidieExist(string $uidie):bool
    {
        AbstractServer::checkFileLogExist(ROOT_LOGS."dev.log.json");
        AbstractServer::checkFileLogExist(ROOT_LOGS."prod.log.json");
        $logs_dev = (array) JsonListener::open(ROOT_LOGS."dev.log.json");
        $logs_prod = (array) JsonListener::open(ROOT_LOGS."prod.log.json");

        foreach ($logs_dev as $one) {
            if ($one->uidie == $uidie) {
                return (true);
            }
        }

        foreach ($logs_prod as $one) {
            if ($one->uidie == $uidie) {
                return (true);
            }
        }

        return (false);
    }

    /** Generate an unique identifier of iumio Exeception
     * @return string The UIDIE
     */
    final public static function generateUidie():string
    {
        $uidie_nok = true;
        $length = 12;
        $str = "";

        while ($uidie_nok == true) {
            $characters = array_merge(range('A', 'Z'), range('a', 'z'), range(
                '0',
                '9'
            ));
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
    final public static function getClientIp():string
    {
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
        }
    }

    /** Get Logs list for specific environment
     * @param $env string Current Environement of iumio Framework
     * @return array Logs list
     * @throws Server500
     */
    public static function getLogs(string $env = ''):array
    {
        if ($env != "") {
            if (!in_array(strtolower($env), array('dev', 'prod'))) {
                throw new Server500(new \ArrayObject(array("explain" => "Invalid environement name : $env",
                    "solution" => "Set the correct environment name (dev or prod)")));
            }
        } else {
            $env = IUMIO_ENV;
        }
        return ((array) JsonListener::open(ROOT_LOGS.strtolower($env).".log.json"));
    }

    /**
     * @param string $err_no
     * @param string $err_msg
     * @throws Server500
     */
    final public static function errorHandler(string $err_no, string $err_msg)
    {
        //throw new Server500(new \ArrayObject(array("explain" => $err_msg, "solution" => "Error level : $err_no")));
    }

    /** Get the error name according to error level
     * @param string $errorlevel The error level
     * @return string the error name
     */
    final public static function errorMap(string $errorlevel):string
    {
        switch ($errorlevel)
        {
            case 1:
                return ("Fatal error");
                break;
            case 2:
                return ("Warning");
                break;
            case 4:
                return ("Syntax error");
                break;
            case 8192:
                return ("Suggestion");
                break;
            default:
                return ("Unknown error");
                break;
        }
    }

    /** Set shutdown handler
     * @throws Server500 The reporting error
     */
    final public static function shutdownFunctionHandler()
    {
        FrameworkEnvironment::checkDefiner();
        $lasterror = error_get_last();
        if (defined('IUMIO_ENV') == false) {
            echo $lasterror['message'];
            exit(1);
        }

        if (isset($lasterror['type']) == true) {
            if ($lasterror['type'] === E_ERROR) {
                $mess = explode("Stack trace", $lasterror['message']);
                throw new Server500(new \ArrayObject(array("explain" => $mess[0],
                    "type_error" => self::errorMap($lasterror['type']),
                    "file_error" => $lasterror["file"], "line_error" => $lasterror["line"])));
            } elseif ($lasterror['type'] === E_PARSE) {
                $mess = explode("Stack trace", $lasterror['message']);
                throw new Server500(new \ArrayObject(array("explain" => $mess[0],
                    "type_error" => self::errorMap($lasterror['type']),
                    "file_error" => $lasterror["file"], "line_error" => $lasterror["line"])));
            } else {
                trigger_error($lasterror['message'], $lasterror['type']);
            }
        }
    }
    /** Set exception handler
     * @throws Server500 The reporting error
     */
    final public static function exceptionHandler(\Throwable $exception)
    {
        FrameworkEnvironment::checkDefiner();
        if (defined('IUMIO_ENV')) {
            throw new Server500(new \ArrayObject(array("explain" => $exception->getMessage())));
        }
        else {
            echo $exception->getMessage();
            exit(1);
        }
    }

    /**
     * Restore previous handlers
     */
    final public static function restoreHandlers()
    {
        restore_exception_handler();
        restore_error_handler();
    }
}
