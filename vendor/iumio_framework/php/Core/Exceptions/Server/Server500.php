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
 * Class Server500
 * @package iumioFramework\Exception\Server
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
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
        $this->solution = null;
        $this->env = IUMIO_ENV;
        parent::__construct($component, 'Internal Error');
    }
}
