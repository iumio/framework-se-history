<?php

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
    protected $code = NULL;
    protected $codeTitle = NULL;
    protected $explain = NULL ;
    protected $solution = NULL;
    protected $env = NULL;


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
        }

        Debug::output("[".$this->code." ".$this->codeTitle."] : ".$this->explain." : ".$this->solution);
        $this->display($this->code, $header_message);
    }


    /** Display server error to user
     * @param string $code Header code
     * @param string $message Header message
     * @return mixed None
     */
    public function display(string $code, string $message)
    {
        if (ob_get_contents()) ob_end_clean();
        header('HTTP/1.0 '.$code.' '.HttpResponse::getPhrase($code));
        include_once  SERVER_VIEWS.'layout.iumio.php';
        die();
    }
}