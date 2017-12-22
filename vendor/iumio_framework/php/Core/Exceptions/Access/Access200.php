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

use iumioFramework\Core\Base\File\FileListener;
use iumioFramework\Core\Base\Http\HttpResponse;
use iumioFramework\Core\Base\Json\JsonListener;
use iumioFramework\Exception\Tools\ToolsExceptions;

/**
 * Class Access200
 * @package iumioFramework\Exception\Access
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <danyrafina@gmail.com>
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
     * @deprecated
     */
    final private function writeJson():int
    {
        $debug = array();
        $debug["uidie"] = ToolsExceptions::generateUidie();
        $debug['time'] = (new \DateTime())->format("Y-m-d H:m:s");
        $debug['client_ip'] = ToolsExceptions::getClientIp();
        $debug['code'] = 200;
        $debug['code_title'] = HttpResponse::getPhrase(200);
        $debug['explain'] = "OK";
        $debug['solution'] = "OK";
        $debug['method'] = $_SERVER['REQUEST_METHOD'];
        $debug['trace'] = $this->getTrace();
        $debug['uri'] = $_SERVER['REQUEST_URI'];
        $debug['referer'] = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
        $log = (array) JsonListener::open(ROOT_LOGS.strtolower(IUMIO_ENV).".log.json");
        $c = count($log);
        $log[$c] = $debug;
        $log = (object) $log;
        JsonListener::put(ROOT_LOGS.strtolower(IUMIO_ENV).".log.json",
            json_encode($log));
        return (1);
    }

    /** Write exception in .log file
     * @return int Success
     * @throws \Exception
     */
    final protected function writeFileError():int
    {
        $h = (new \DateTime())->format("Y-m-d H:m:s");
        $code = 200;
        $d1 = "[";
        $d2 = "]";
        $debug = array();
        $debug['time'] = $d1.$h.$d2;
        $debug["uidie"] = $d1.ToolsExceptions::generateUidie().$d2;
        $debug['client_ip'] = $d1.ToolsExceptions::getClientIp().$d2;
        $debug['code'] = $d1.$code.$d2;
        $debug['code_title'] = $d1.HttpResponse::getPhrase(200).$d2;
        $debug['explain'] = $d1."OK".$d2;
        $debug['solution'] = $d1."OK".$d2;
        $debug['env'] = $d1.IUMIO_ENV.$d2;
        $debug['method'] = $d1.$_SERVER['REQUEST_METHOD'].$d2;
        $debug['trace'] = $d1.json_encode($this->getTrace()).$d2;
        $debug['uri'] = $d1.$_SERVER['REQUEST_URI'].$d2;

        $debug['referer'] = $d1.(isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null).$d2;

        $strlog =  implode(" ", $debug);
        $f = new FileListener();
        $f->open(ROOT_LOGS.strtolower(IUMIO_ENV).".log", "a+", true);
        $f->put($strlog);
        $f->close();
        return (1);
    }

}
