<?php

namespace iumioFramework\Theme\Server;
use ArrayObject;

/**
 * Class Server500
 * @package iumioFramework\Theme\Server
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class Server500 extends \Exception implements Server
{
    protected $code = '500';
    private $codeTitle = 'INTERNAL ERROR';
    private $explain =  'An internal error was generated. Please referer to server log';
    private $solution = NULL;
    private $env = NULL;


    /**
     * Server500 constructor.
     * @param ArrayObject $component
     */
    public function __construct(ArrayObject $component)
    {
        $this->env = ENVIRONMENT;
        $it = $component->getIterator();
        foreach ($it as $one => $value)
        {
            if ($it->key() == "code")
                $this->code = $value;
            if ($it->key() == "codeTitle")
                $this->codeTitle = $value;
            else if ($it->key() == "explain")
                $this->explain = $value;
            else if ($it->key() == "solution")
                $this->solution = $value;
        }
        $this->display();
    }

    /**
     * Display 500 error
     */
    public function display()
    {
        header('HTTP/1.0 500 Internal Error');

        include_once THEME.'/default/views/layout.iumio.php';
        die();
    }
}


