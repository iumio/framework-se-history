<?php

namespace iumioFramework\Manager\Console\Module;

/**
 * Interface iumioManagerModule
 * @package iumioFramework\Manager\Console\Module
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

interface iumioManagerModule
{
    /** Display result in prompt
     * @return mixed
     */
    public function __render();

    /** Alter function
     * @return mixed
     */
    public function __alter();

    /**
     * iumioManagerModule constructor.
     * @param array $options Method parameters
     */
    public function __construct(array $options = array());
}