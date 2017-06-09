<?php

/*
 * This is an iumio Framework component
 *
 * (c) RAFINA DANY <danyrafina@gmail.com>
 *
 * iumio Framework - iumio Components
 *
 * To get more information about licence, please check the licence file
 */

namespace iumioFramework\Exception\Server;
use ArrayObject;

/**
 * Class Server000
 * @package iumioFramework\Exception\Server
 * @author RAFINA Dany <danyrafina@gmail.com>
 */
class Server000 extends AbstractServer
{
    /**
     * Server000 constructor.
     * @param ArrayObject $component
     * @param $none string parameter not used. it's for the interface
     */
    public function __construct(ArrayObject $component, string $none = null)
    {
        $this->code = '000';
        $this->codeTitle = 'No app registered';
        $this->explain =  'No app was registered in apps.json';
        $this->solution = "Please create an app with app manager";
        $this->env = NULL;
        parent::__construct($component, 'No app registered');
    }
}


