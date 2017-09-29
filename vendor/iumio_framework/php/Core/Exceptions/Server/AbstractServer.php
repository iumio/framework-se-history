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

namespace iumioFramework\Exception\Server;

use ArrayObject;
use iumioFramework\Core\Additionnal\Template\SmartyEngineTemplate;
use iumioFramework\Core\Base\Http\HttpResponse;
use iumioFramework\Core\Base\Json\JsonListener as JL;
use iumioFramework\Exception\Tools\ToolsExceptions;
use iumioFramework\Masters\MasterCore;

/**
 * Class AbstractServer
 * @package iumioFramework\Exception\Server
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <danyrafina@gmail.com>
 */
abstract class AbstractServer extends \Exception implements ServerInterface
{
    protected $code = 0;
    protected $codeTitle = null;
    protected $explain = null ;
    protected $solution = null;
    protected $env = null;
    protected $external = false;
    protected $time = false;
    protected $color_class = array(500 => "navbar-ct-red", "default" => "navbar-ct-orange", 200 => "navvar-ct-green");
    protected $color_class_checked = "navbar-ct-orange";
    protected $uidie = null;
    protected $client_ip = null;
    protected $inlog = true;



    /**
     * Server000 constructor.
     * @param ArrayObject $component Error elements
     * @param string $header_message Header message
     */
    public function __construct(ArrayObject $component, string $header_message)
    {
        if (isset($this->color_class[$this->code])) {
            $this->color_class_checked = $this->color_class[$this->code];
        }

        $this->time = new \DateTime();
        $this->uidie = ToolsExceptions::generateUidie();
        $this->env = IUMIO_ENV;
        $this->client_ip = ToolsExceptions::getClientIp();
        $it = $component->getIterator();
        foreach ($it as $one => $value) {
            if ($it->key() == "codeTitle") {
                $this->codeTitle = $value;
            } elseif ($it->key() == "explain") {
                $this->explain = $value;
            } elseif ($it->key() == "solution") {
                $this->solution = $value;
            } elseif ($it->key() == "inlog") {
                $this->inlog = $value;
            } elseif ($it->key() == "external") {
                $this->external = ($value == "yes")? $value : "no";
            }
            if ($this->solution == null) {
                $this->solution = "Please check your app configuration";
            }
        }

        //parent::__construct(HttpResponse::getPhrase($this->code), $this->code);
        if ($this->inlog) {
            $this->writeJsonError();
        }
        $this->display($this->code, $header_message);
    }


    /** Display server error to user
     * @param string $code Header code
     * @param string $message Header message
     * @return mixed None
     * @throws \Exception
     */
    public function display(string $code, string $message)
    {
        if (ob_get_contents()) {
            ob_end_clean();
        }

        @header($_SERVER['SERVER_PROTOCOL'] .' '.
            (($code == 000)? 500 : $code).' '.HttpResponse::getPhrase($code), true, $code);
        if ($this->checkExceptionOverride($code)) {
            $this->displayOverride($code, $message);
        } elseif ($this->external || IUMIO_ENV == "PROD") {
            include_once(SERVER_VIEWS.'html/'.$code.'.html');
        } else {
            include_once  SERVER_VIEWS.'layout.exception.php';
        }
        //return (false);
        exit();
    }


    /** Display exception error override
     * @param string $code Error code
     * @param string $message Error message
     */
    public function displayOverride(string $code, string $message)
    {
        $sm = SmartyEngineTemplate::getSmartyInstance("iumio");
        $sm->assign(array("code" => $code, "message" => $message, "er_object" => $this));

        $sm->display($code.SmartyEngineTemplate::$viewExtention);
    }


    /** Write exception in .json file
     * @return int Success
     */
    final protected function writeJsonError():int
    {
            $debug = array();
            $debug["uidie"] = $this->uidie;
            $debug['time'] = $this->time;
            $debug['client_ip'] = $this->client_ip;
            $debug['code'] = $this->code;
            $debug['code_title'] = $this->codeTitle;
            $debug['explain'] = $this->explain;
            $debug['solution'] = $this->solution;
            $debug['method'] = $_SERVER['REQUEST_METHOD'];
            $debug['trace'] = $this->getTrace();
            $debug['referer'] = $_SERVER['REQUEST_URI'];
            $log = (array) JL::open(ROOT_LOGS.strtolower(IUMIO_ENV).".log.json");
            $c = count($log);
            $log[$c] = $debug;
            $log = (object) $log;
            JL::put(
                ROOT_LOGS.strtolower(IUMIO_ENV).".log.json",
                json_encode($log, JSON_PRETTY_PRINT)
            );
            return (1);
    }

    /**
     * @param int $code
     */
    final public function setCode(int $code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed|null
     */
    public function getCodeTitle()
    {
        return $this->codeTitle;
    }

    /**
     * @param mixed|null $codeTitle
     */
    public function setCodeTitle($codeTitle)
    {
        $this->codeTitle = $codeTitle;
    }

    /**
     * @return mixed|null
     */
    public function getExplain()
    {
        return $this->explain;
    }

    /**
     * @param mixed|null $explain
     */
    public function setExplain($explain)
    {
        $this->explain = $explain;
    }

    /**
     * @return null|string
     */
    public function getSolution()
    {
        return $this->solution;
    }

    /**
     * @param null|string $solution
     */
    public function setSolution($solution)
    {
        $this->solution = $solution;
    }

    /**
     * @return null|string
     */
    public function getEnv()
    {
        return $this->env;
    }

    /**
     * @param null|string $env
     */
    public function setEnv($env)
    {
        $this->env = $env;
    }

    /**
     * @return bool|mixed|string
     */
    public function getExternal()
    {
        return $this->external;
    }

    /**
     * @param bool|mixed|string $external
     */
    public function setExternal($external)
    {
        $this->external = $external;
    }

    /**
     * @return bool|\DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param bool|\DateTime $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @return array
     */
    public function getColorClass(): array
    {
        return $this->color_class;
    }

    /**
     * @param array $color_class
     */
    public function setColorClass(array $color_class)
    {
        $this->color_class = $color_class;
    }

    /**
     * @return mixed|string
     */
    public function getColorClassChecked()
    {
        return $this->color_class_checked;
    }

    /**
     * @param mixed|string $color_class_checked
     */
    public function setColorClassChecked($color_class_checked)
    {
        $this->color_class_checked = $color_class_checked;
    }

    /**
     * @return null|string
     */
    public function getUidie()
    {
        return $this->uidie;
    }

    /**
     * @param null|string $uidie
     */
    public function setUidie($uidie)
    {
        $this->uidie = $uidie;
    }


    /** Check if Exception template is override
     * @param int $code Code for template exception
     * @return int If is override or not
     */
    final private function checkExceptionOverride(int $code):int
    {
        if (file_exists(OVERRIDES."Exceptions/views/$code".SmartyEngineTemplate::$viewExtention) &&
            IUMIO_ENV == "PROD") {
            return (1);
        }
        return (0);
    }


    /** Get Logs list for specific environment
     * @param $env string environment name
     * @return array Logs list
     */
    public static function getLogs($env = ""):array
    {
        return (ToolsExceptions::getLogs($env));
    }
}
