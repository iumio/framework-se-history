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

namespace iumioFramework\Core\Console\Module;

/**
 * Interface ModuleManager
 * @package iumioFramework\Core\Console\Module
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
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
