<?php

namespace IumioFramework\Manager\Console\Module;

/**
 * Interface IumioManagerModule
 * @package IumioFramework\Manager\Console\Module
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

interface IumioManagerModule
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
     * IumioManagerModule constructor.
     */
    public function __construct();
}