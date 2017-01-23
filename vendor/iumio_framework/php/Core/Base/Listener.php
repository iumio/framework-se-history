<?php

/**
 * IUMIO FRAMEWORK PROJECT
 * @author Dany RAFINA <danyrafina@compared.fr>
 */

namespace IumioFramework\Core\Base;

/**
 * Interface
 * @package IumioFramework\Core\Base
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

interface Listener
{

    /**
     * @return int
     */
    public function open():int;

    /**
     * @return array
     */
    public function render():array;

    /**
     * @param $oneRouter
     * @return int
     */
    public function close($oneRouter):int;

    /**
     * @return int
     */
    public function listingRouters():int;

}