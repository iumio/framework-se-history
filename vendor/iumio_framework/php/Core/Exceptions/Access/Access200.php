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

namespace iumioFramework\Exception\Access;
use iumioFramework\Core\Base\Http\HttpResponse;
use iumioFramework\Core\Base\Json\JsonListener;
use iumioFramework\Exception\Tools\ToolsExceptions;

/**
 * Class Access200
 * @package iumioFramework\Exception\Access
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class Access200 extends \Exception
{

    /**
     * Access200 constructor.
     */
    public function __construct()
    {
        $this->writeJson();
    }

    /** Write exception in .json file
     * @return int Success
     */
    final private function writeJson():int
    {
        $debug = array();
        $debug["uidie"] = ToolsExceptions::generate_uidie();
        $debug['time'] = new \DateTime();
        $debug['client_ip'] = ToolsExceptions::getClientIp();
        $debug['code'] = 200;
        $debug['code_title'] = HttpResponse::getPhrase(200);
        $debug['explain'] = "OK";
        $debug['solution'] = "OK";
        $debug['method'] = $_SERVER['REQUEST_METHOD'];
        $debug['trace'] = $this->getTrace();
        $debug['referer'] = $_SERVER['REQUEST_URI'];
        $log = (array) JsonListener::open(ROOT_LOGS.strtolower(IUMIO_ENV).".log.json");
        $c = count($log);
        $log[$c] = $debug;
        $log = (object) $log;
        JsonListener::put(ROOT_LOGS.strtolower(IUMIO_ENV).".log.json", json_encode($log, JSON_PRETTY_PRINT));
        return (1);
    }

}


