<?php

/*
 * This is an iumio Framework component
 *
 * (c) RAFINA DANY <dany.rafina@iumio.com>
 *
 * iumio Framework - iumio Components
 *
 * To get more information about licence, please check the licence file
 */

namespace iumioFramework\Exception\Server;

use ArrayObject;

/**
 * Class Server405
 * @package iumioFramework\Exception\Server
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */

class Server405 extends AbstractServer
{
    /**
     * Server405 constructor.
     * @param ArrayObject $component
     * @param $none string parameter not used. it's for the interface
     */
    public function __construct(ArrayObject $component, string $none = null)
    {
        $this->code = '405';
        $this->codeTitle = 'Method Not Allowed';
        $this->explain =  'The request method is not allowed.';
        $this->solution = null;
        $this->env = IUMIO_ENV;
        parent::__construct($component, 'Method Not Allowed');
    }
}
