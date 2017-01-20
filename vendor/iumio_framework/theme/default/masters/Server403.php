<?php

namespace IumioFramework\Theme\Server;
use ArrayObject;

/**
 * Class Server403
 * @package IumioFramework\Theme\Server
 */
class Server403 extends \Exception implements Server
{
    protected $code = '403';
    private $codeTitle = 'FORBIDEEN';
    private $explain =  'You are not allowed to access this file.';
    private $solution = NULL;
    private $env = NULL;


    /**
     * Server403 constructor.
     * @param ArrayObject $component
     */
    public function __construct(ArrayObject $component)
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
    }

    /**
     *
     */
    public function display()
    {
        header('HTTP/1.0 403 Forbideen');

        include_once  THEME.'default/views/layout.iumio.php';
        die();
    }
}


