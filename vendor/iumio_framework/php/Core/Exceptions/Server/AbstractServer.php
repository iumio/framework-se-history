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
use iumioFramework\Core\Base\Debug\Debug;
use iumioFramework\Core\Base\Http\HttpResponse;


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


    /**
     * Server000 constructor.
     * @param ArrayObject $component Error elements
     * @param string $header_message Header message
     */
    public function __construct(ArrayObject $component, string $header_message)
    {
        $this->env = ENVIRONMENT;
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
        }

        parent::__construct(HttpResponse::getPhrase($this->code), $this->code);
        Debug::output("[".$this->code." ".$this->codeTitle."] : ".$this->explain." : ".$this->solution);
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
}