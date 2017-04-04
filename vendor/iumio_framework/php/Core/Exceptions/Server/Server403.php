<?php

namespace iumioFramework\Exception\Server;
use ArrayObject;

/**
 * Class Server403
 * @package iumioFramework\Exception\Server
 * @author RAFINA Dany <danyrafina@gmail.com>
 */
class Server403 extends AbstractServer
{
    /**
     * Server403 constructor.
     * @param ArrayObject $component
     * @param $none string parameter not used. it's for the interface
     */
    public function __construct(ArrayObject $component, string $none = null)
    {
        $this->code = '403';
        $this->codeTitle = 'FORBIDEEN';
        $this->explain =  'You are not allowed to access this file.';
        $this->solution = NULL;
        $this->env = NULL;
        parent::__construct($component, 'Forbideen');
    }

}


