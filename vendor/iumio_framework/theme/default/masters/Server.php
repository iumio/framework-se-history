<?php

namespace iumioFramework\Theme\Server;
use ArrayObject;

/**
 * Interface Server
 * @package iumioFramework\Theme\Server
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

interface Server
{
    /**
     * Server constructor.
     * @param ArrayObject $component Component to declare server error
     */
    public function __construct(ArrayObject $component);

    /** Display server error to user
     * @return mixed
     */
    public function display();
}