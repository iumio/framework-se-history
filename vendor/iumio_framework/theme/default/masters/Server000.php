<?php

namespace IumioFramework\Theme\Server;
use ArrayObject;

/**
 * Class Server000
 * @package IumioFramework\Theme\Server
 * @author RAFINA Dany <danyrafina@gmail.com>
 */
class Server000 extends \Exception implements Server
{
    protected $code = '000';
    private $codeTitle = 'No app registered';
    private $explain =  'No app was registered in apps.json';
    private $solution = "PLEASE CREATE AN APP WITH APP-MANAGER (PHP CORE/MANAGER APP-MANAGER NEW-PROJECT)";
    private $env = NULL;

    /**
     * Server000 constructor.
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
        $this->display();
    }

    /**
     * Display 000 Error
     */
    public function display()
    {
        header('HTTP/1.0 000 No app registered');
        include_once  THEME.'default/views/layout.iumio.php';
        die();
    }
}


