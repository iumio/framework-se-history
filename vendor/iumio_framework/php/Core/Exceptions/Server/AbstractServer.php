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
use iumioFramework\Core\Base\Http\HttpResponse;
use iumioFramework\Core\Base\Json\JsonListener as JL;


/**
 * Class AbstractServer
 * @package iumioFramework\Exception\Server
 * @author RAFINA Dany <danyrafina@gmail.com>
 */
abstract class AbstractServer extends \Exception implements ServerInterface
{
    protected $code = 0;
    protected $codeTitle = NULL;
    protected $explain = NULL ;
    protected $solution = NULL;
    protected $env = NULL;
    protected $external = false;
    protected $time = false;
    protected $color_class = array(500 => "navbar-ct-red", "default" => "navbar-ct-orange");
    protected $color_class_checked = "navbar-ct-orange";
    protected $uidie = NULL;
    protected $client_ip = NULL;



    /**
     * Server000 constructor.
     * @param ArrayObject $component Error elements
     * @param string $header_message Header message
     */
    public function __construct(ArrayObject $component, string $header_message)
    {
        if (isset($this->color_class[$this->code]))
            $this->color_class_checked = $this->color_class[$this->code];

        $this->time = new \DateTime();
        $this->uidie = $this->generate_uidie();
        $this->env = ENVIRONMENT;
        $this->client_ip = $this->getClientIp();
        $it = $component->getIterator();
        foreach ($it as $one => $value)
        {
            if ($it->key() == "codeTitle")
                $this->codeTitle = $value;
            else if ($it->key() == "explain")
                $this->explain = $value;
            else if ($it->key() == "solution")
                $this->solution = $value;
            else if ($it->key() == "external")
                $this->external = ($value == "yes")? $value : "no";
            if ($this->solution == NULL)
                $this->solution = "Please check your app configuration";
        }

        parent::__construct(HttpResponse::getPhrase($this->code), $this->code);
        $this->writeJsonError("[".$this->code." ".$this->codeTitle."] : ".$this->explain." : ".$this->solution);
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
        if (ob_get_contents())
            ob_end_clean();
        //ob_end_clean();r
        //echo $_SERVER['SERVER_PROTOCOL'] .''.$code.' '.HttpResponse::getPhrase($code);
        @header($_SERVER['SERVER_PROTOCOL'] .' '.(($code == 000)? 500 : $code).' '.HttpResponse::getPhrase($code), true, $code);
        if ($this->external || ENVIRONMENT == "PROD")
            include_once (SERVER_VIEWS.strtolower(ENVIRONMENT).'/'.$code.'.html');
        else
             require_once  SERVER_VIEWS.'layout.iumio.php';
        exit();
    }

    /** Check if UIDIE exist in logs files
     * @param string $uidie The unique identifier of iumio Exeception
     * @return bool If exists or not
     */
    public function checkUidieExist(string $uidie):bool
    {
        $logs_dev = (array) JL::open(ROOT_LOGS."dev.log.json");
        $logs_prod = (array) JL::open(ROOT_LOGS."prod.log.json");

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
    public function generate_uidie():string
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


    /** Write exception in .json file
     * @return int Success
     */
    final private function writeJsonError():int
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
            $log = (array) JL::open(ROOT_LOGS.strtolower(ENVIRONMENT).".log.json");
            $c = count($log);
            $log[$c] = $debug;
            $log = (object) $log;
            JL::put(ROOT_LOGS.strtolower(ENVIRONMENT).".log.json", json_encode($log, JSON_PRETTY_PRINT));

            return (1);
    }


    /** Get ip client
     * @return string the client ip
     */
    final public function getClientIp():string
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
        return ((array) JL::open(ROOT_LOGS.strtolower(ENVIRONMENT).".log.json"));
    }
}