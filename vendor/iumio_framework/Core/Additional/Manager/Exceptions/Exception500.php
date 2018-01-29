<?php

/**
 *
 *  * This is an iumio Framework component
 *  *
 *  * (c) RAFINA DANY <danyrafina@gmail.com>
 *  *
 *  * iumio Framework - iumio Components
 *  *
 *  * To get more information about licence, please check the licence file
 *
 */

namespace iumioFramework\Core\Console\Exceptions;

use ArrayObject;
use iumioFramework\Core\Console\FEnvFcm;

/**
 * Class Exception500
 * @package iumioFramework\Exception\Server
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */

class Exception500 extends AbstractFcmException
{
    /**
     * Exception500 constructor.
     * @param ArrayObject $component
     * @param $none string parameter not used. it's for the interface
     * @throws \Exception
     */
    public function __construct(ArrayObject $component, string $none = null)
    {
        $this->code = '500';
        $this->codeTitle = 'INTERNAL ERROR';
        $this->explain =  'An internal error was generated. Please referer to server log';
        $this->solution = null;
        $this->env = FEnvFcm::get("framework.env");
        parent::__construct($component, 'Internal Error');
    }
}
