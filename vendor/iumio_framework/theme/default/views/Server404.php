<?php

include_once __DIR__."/Server.php";


class Server404 implements Server
{
    private $code = '404';
    private $codeTitle = 'NOT FOUND';
    private $explain =  'The ressource you try to access is not found.';
    private $solution = NULL;
    private $env = NULL;


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

    public function display()
    {
        include_once 'layout.iumio.php';
        die();
    }
}


