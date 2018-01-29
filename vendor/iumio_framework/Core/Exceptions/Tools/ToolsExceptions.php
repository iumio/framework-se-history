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

namespace iumioFramework\Exception\Tools;

use iumioFramework\Core\Base\File\FileListener;
use iumioFramework\Core\Requirement\Environment\FEnv;
use iumioFramework\Core\Requirement\Environment\FrameworkEnvironment;
use iumioFramework\Core\Base\Json\JsonListener;
use iumioFramework\Exception\Server\AbstractServer;
use iumioFramework\Exception\Server\Server500;

/**
 * Class ToolsExceptions
 * @package iumioFramework\Exception\Tools
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */
class ToolsExceptions
{
    /** Check if UIDIE exist in logs files
     * @param string $uidie The unique identifier of iumio Exeception
     * @return bool If exists or not
     * @throws Server500
     * @throws \Exception
     */
    final public static function checkUidieExist(string $uidie):bool
    {
        AbstractServer::checkFileLogExist(FEnv::get("framework.logs.dev.file"));
        AbstractServer::checkFileLogExist(FEnv::get("framework.logs.prod.file"));
        $fdev = new FileListener();
        $fprod = new FileListener();
        $logs_dev = $fdev->openFileAsArray(FEnv::get("framework.logs.dev.file"));
        $logs_prod = $fprod->openFileAsArray(FEnv::get("framework.logs.prod.file"));

        foreach ($logs_dev as $one) {
            if ($one['uidie'] == $uidie) {
                $fdev->close();
                return (true);
            }
        }

        foreach ($logs_prod as $one) {
            if ($one['uidie'] == $uidie) {
                $fprod->close();
                return (true);
            }
        }
        $fdev->close();
        $fprod->close();
        return (false);
    }

    /** Generate an unique identifier of iumio Exeception
     * @return string The UIDIE
     */
    final public static function generateUidie():string
    {
        // i for iumio
        $str = "i";
        // Create a string with Alphabetic letter
        $str .= chr(rand( 65, 90 ));
        // Insert the timestamp
        $str .= time();
        // Create an other unique identifier with lenght 5
        $uniqid = substr(uniqid ("X"), 5);
        // concat all
        $str .= substr($uniqid, 5);

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
     * @param $end int Break the loop with a limit for log list
     * @param $uidie string|null Unique Identifier of iumio Exception
     * @return array Logs list
     * @throws Server500
     * @throws \Exception
     */
    public static function getLogs(string $env = '', int $end = 0, string $uidie = null):array
    {
        if ($env != "") {
            if (!in_array(strtolower($env), array('dev', 'prod'))) {
                throw new Server500(new \ArrayObject(array("explain" => "Invalid environement name : $env",
                    "solution" => "Set the correct environment name (dev or prod)")));
            }
        } else {
            $env = FEnv::get("framework.env");
        }
        $f = new FileListener();
        $f->openFileAsArray(FEnv::get("framework.logs").strtolower($env).".log");
        $a =  array();

        $ar = $f->reverse($end);
        foreach ($ar as $line)
        {
            $line = trim($line);
            if (isset($line[0]) && $line[0] == "[") {
                $line = substr_replace($line, '', 0, 1);
            }

            if (isset($line[(strlen($line) - 1)]) && $line[(strlen($line) - 1)] == "]") {
                $line = substr_replace($line, '', (strlen($line) - 1), 1);
            }
            $na =  explode("] [", $line);
            if (!isset($na[1])) {
                continue;
            }
            if ($uidie != null) {
                if ($na[1] != $uidie) {
                    continue;
                }
                else {
                    $f->close();
                    if (isset($na[12])) {
                        return (
                        array(
                            "time" => $na[0], "uidie" => $na[1],
                            "client_ip" => $na[2], "code" => $na[3],
                            "code_title" => $na[4], "explain" => $na[5],
                            "solution" => $na[6], "env" => $na[7],
                            "method" => $na[8], "trace" => json_decode($na[9]),
                            "uri" => $na[10], "referer" => $na[11],
                            "type_error" => $na[12], "file_error" => $na[13],
                            "line_error" => $na[14]
                        )
                        );
                    }
                    else {
                        return (
                        array(
                            "time" => $na[0], "uidie" => $na[1],
                            "client_ip" => $na[2], "code" => $na[3],
                            "code_title" => $na[4], "explain" => $na[5],
                            "solution" => $na[6], "env" => $na[7],
                            "method" => $na[8], "trace" => json_decode($na[9]),
                            "uri" => $na[10], "referer" => $na[11],
                        )
                        );
                    }
                }
            }
            if (isset($na[12])) {
                array_push($a,
                    array(
                        "time" => $na[0], "uidie" => $na[1],
                        "client_ip" => $na[2], "code" => $na[3],
                        "code_title" => $na[4], "explain" => $na[5],
                        "solution" => $na[6], "env" => $na[7],
                        "method" => $na[8], "trace" => json_decode($na[9]),
                        "uri" => $na[10], "referer" => $na[11],
                        "type_error" => $na[12], "file_error" => $na[13],
                        "line_error" => $na[14]
                    )
                );
            }
            else {
                array_push($a,
                    array(
                        "time" => $na[0], "uidie" => $na[1],
                        "client_ip" => $na[2], "code" => $na[3],
                        "code_title" => $na[4], "explain" => $na[5],
                        "solution" => $na[6], "env" => $na[7],
                        "method" => $na[8], "trace" => json_decode($na[9]),
                        "uri" => $na[10], "referer" => $na[11],
                    )
                );
            }


        }
        $f->close();
        return ($a);
    }

    /** Set iumio framework custom handler
     * @param string $err_no Error type value
     * @param string $err_msg Error message
     * @param string $errfile Error file
     * @param string $errline Error line
     */
    final public static function errorHandler(string $err_no, string $err_msg, string $errfile, string $errline)
    {
        throw new Server500(new \ArrayObject(array("explain" => $err_msg,
            "type_error" => self::errorMap($err_no), "line_error" => $errline, "file_error" => $errfile)));
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
            case 8:
                return ("Notice");
                break;
            case 16:
                return ("Core error");
                break;
            case 32:
                return ("Core warning");
                break;
            case 64:
                return ("Compiled error");
                break;
            case 128:
                return ("Compiled warning");
                break;
            case 256:
                return ("Framework error");
                break;
            case 512:
                return ("Framework warning");
                break;
            case 1024:
                return ("Framework notice");
                break;
            case 2048:
                return ("Framework Suggestion");
                break;
            case 4096:
                return ("Recoverable error");
                break;
            case 8192:
                return ("Deprecated");
                break;
            case 16384:
                return ("Framework deprecated");
                break;
            default:
                return ("Error");
                break;

        }
    }

    /** Set shutdown handler
     * @throws Server500 The reporting error
     */
    final public static function shutdownFunctionHandler()
    {
        $lasterror = error_get_last();
        if (!FEnv::isset("framework.env")) {
            die($lasterror['message']);
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
            } elseif ($lasterror['type'] === E_WARNING) {
                $mess = explode("Stack trace", $lasterror['message']);
                throw new Server500(new \ArrayObject(array("explain" => $mess[0],
                    "type_error" => self::errorMap($lasterror['type']),
                    "file_error" => $lasterror["file"], "line_error" => $lasterror["line"])));
            } else {
                trigger_error($lasterror['message']);
            }
        }

        exit(1);
    }
    /** Set exception handler
     * @param \Throwable $exception The exception object
     * @throws Server500 The reporting error
     */
    final public static function exceptionHandler(\Throwable $exception)
    {
        if (FEnv::isset("framework.env")) {
            throw new Server500(new \ArrayObject(array("explain" => $exception->getMessage(),
                "trace" => $exception->getTrace(), "line_error" => $exception->getLine(),
                "file_error" => $exception->getFile(), "type_error" => self::errorMap($exception->getCode()))));
        }
        else {
            die($exception->getMessage());
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
