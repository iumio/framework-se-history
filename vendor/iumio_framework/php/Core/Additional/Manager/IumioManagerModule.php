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
     * @param array $options Method parameters
     */
    public function __construct(array $options = array());
}