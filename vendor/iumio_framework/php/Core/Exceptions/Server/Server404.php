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
 * Class Server404
 * @package iumioFramework\Exception\Server
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <danyrafina@gmail.com>
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
        $this->explain =  'The resource you try to access is not found.';
        $this->solution = null;
        $this->env = null;
        parent::__construct($component, 'Not found');
    }
}
