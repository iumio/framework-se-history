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
 * Interface ServerInterface
 * @package iumioFramework\Exception\Server
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */

interface ServerInterface
{
    /**
     * Server constructor.
     * @param ArrayObject $component Component to declare server error
     * @param string $header_message Header message
     */
    public function __construct(ArrayObject $component, string $header_message);

    /** Display server error to user
     * @param string $code Header code
     * @param string $message Header message
     * @return mixed None
     */
    public function display(string $code, string $message);
}
