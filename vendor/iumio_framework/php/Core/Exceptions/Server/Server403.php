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
 * Class Server403
 * @package iumioFramework\Exception\Server
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
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
        $this->solution = null;
        $this->env = IUMIO_ENV;
        parent::__construct($component, 'Forbideen');
    }
}
