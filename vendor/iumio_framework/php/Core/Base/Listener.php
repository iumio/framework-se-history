<?php

/**
 * IUMIO FRAMEWORK PROJECT
 * @author Dany RAFINA <danyrafina@compared.fr>
 */

namespace IumioFramework\Core\Base;

/**
 * Interface
 * @package IumioFramework\Core\Base
 */

interface Listener
{

    /**
     * @param $listener
     * @return mixed
     */
    public function registerListener($listener):void;

    /**
     *
     */
    public function open():void;

    /**
     *
     */
    public function render():void;

    /**
     *
     */
    public function close():void;


}