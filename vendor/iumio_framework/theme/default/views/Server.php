<?php

/**
 * Class Server
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