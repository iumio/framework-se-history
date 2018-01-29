<?php

/**
 *
 *  * This is an iumio Framework component
 *  *
 *  * (c) RAFINA DANY <dany.rafina@iumio.com>
 *  *
 *  * iumio Framework - iumio Components
 *  *
 *  * To get more information about licence, please check the licence file
 *
 */

namespace iumioFramework\Exception\Server;

use ArrayObject;
use iumioFramework\Core\Requirement\Environment\FEnv;

/**
 * Class Server401
 * @package iumioFramework\Exception\Server
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */
class Server401 extends AbstractServer
{
    /**
     * Server403 constructor.
     * @param ArrayObject $component
     * @param $none string parameter not used. it's for the interface
     */
    public function __construct(ArrayObject $component, string $none = null)
    {
        $this->code = '401';
        $this->codeTitle = 'UNAUTHORIZED';
        $this->explain =  'An authentification is required to access this file.';
        $this->solution = null;
        $this->env = FEnv::get("framework.env");
        parent::__construct($component, 'Unauthirized');
    }
}
