<?php

namespace iumioFramework\Exception\Server;
use ArrayObject;

/**
 * Class Server500
 * @package iumioFramework\Exception\Server
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class Server500 extends AbstractServer
{
    /**
     * Server500 constructor.
     * @param ArrayObject $component
     * @param $none string parameter not used. it's for the interface
     */
    public function __construct(ArrayObject $component, string $none = null)
    {
        $this->code = '500';
        $this->codeTitle = 'INTERNAL ERROR';
        $this->explain =  'An internal error was generated. Please referer to server log';
        $this->solution = NULL;
        $this->env = NULL;
        parent::__construct($component, 'Internal Error');
    }
}


