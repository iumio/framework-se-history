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

namespace iumioFramework\Exception\Access;

use iumioFramework\Core\Base\File\FileListener;
use iumioFramework\Core\Base\Http\HttpResponse;
use iumioFramework\Core\Base\Json\JsonListener;
use iumioFramework\Core\Requirement\Environment\FEnv;
use iumioFramework\Exception\Tools\ToolsExceptions;

/**
 * Class Access200
 * @package iumioFramework\Exception\Access
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */

class Access200 extends \Exception
{

    /**
     * Access200 constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->writeFileError();
    }

    /** Write exception in .log file
     * @return int Success
     * @throws \Exception
     */
    final protected function writeFileError():int
    {
        $h = (new \DateTime())->format("Y-m-d H:i:s");
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
        $debug['env'] = $d1.FEnv::get("framework.env").$d2;
        $debug['method'] = $d1.$_SERVER['REQUEST_METHOD'].$d2;
        $debug['trace'] = $d1.json_encode($this->getTrace()).$d2;
        $debug['uri'] = $d1.$_SERVER['REQUEST_URI'].$d2;

        $debug['referer'] = $d1.(isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null).$d2;

        $strlog =  implode(" ", $debug);
        $f = new FileListener();
        $logfile = FEnv::get(((FEnv::get("framework.env") === "dev")?
            "framework.logs.debug.dev.file" : "framework.logs.debug.prod.file"));
        $f->open($logfile, "a+", true);
        $f->put($strlog);
        $f->close();
        return (1);
    }

}
