<?php

include_once __DIR__."/Server.php";


class Server403 implements Server
{
    private $code = '403';
    private $codeTitle = 'FORBIDEEN';
    private $explain =  'You are not allowed to access this file.';
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


