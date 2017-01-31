<?php

namespace IumioFramework\Theme\Server;
use ArrayObject;

/**
 * Class Server404
 * @package IumioFramework\Theme\Server
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class Server404 extends \Exception implements Server
{
    protected $code = '404';
    private $codeTitle = 'NOT FOUND';
    private $explain =  'The ressource you try to access is not found.';
    private $solution = NULL;
    private $env = NULL;


    /**
     * Server404 constructor.
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
     * Display 404 error
     */
    public function display()
    {
        header('HTTP/1.0 404 Not Found');

        include_once THEME.'/default/views/layout.iumio.php';
        die();
    }
}


