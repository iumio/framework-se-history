<?php

namespace iumioFramework\Exception\Server;
use ArrayObject;

/**
 * Class Server404
 * @package iumioFramework\Exception\Server
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class Server404 extends AbstractServer
{
    /**
     * Server404 constructor.
     * @param ArrayObject $component
     * @param $none string parameter not used. it's for the interface
     */
    public function __construct(ArrayObject $component, string $none = null)
    {
        $this->code = '404';
        $this->codeTitle = 'NOT FOUND';
        $this->explain =  'The ressource you try to access is not found.';
        $this->solution = NULL;
        $this->env = NULL;
        parent::__construct($component, 'Not found');
    }
}


