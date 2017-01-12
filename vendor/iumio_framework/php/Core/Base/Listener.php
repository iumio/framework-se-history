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
     * @return int
     */
    public function open():int;

    /**
     * @return array
     */
    public function render():array;

    /**
     * @param Resource $oneRouter
     * @return int
     */
    public function close(Resource $oneRouter):int;

    /**
     * @return int
     */
    public function listingRouters():int;

}