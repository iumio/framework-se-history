<?php

namespace iumioFramework\Core\Console\Module;

/**
 * Interface ModuleManager
 * @package iumioFramework\Core\Console\Module
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

interface ModuleManager
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
     * ModuleManager constructor.
     * @param array $options Method parameters
     */
    public function __construct(array $options = array());
}