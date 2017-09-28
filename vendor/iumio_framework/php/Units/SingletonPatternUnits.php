<?php

/**
 *
 *  * This is an iumio Framework component
 *  *
 *  * (c) RAFINA DANY <danyrafina@gmail.com>
 *  *
 *  * iumio Framework - iumio Components
 *  *
 *  * To get more information about licence, please check the licence file
 *
 */

namespace iumioFramework\Core\Units;

use iumioFramework\Core\Requirement\Patterns\SingletonPattern;

/**
 * Class SingletonPatternUnits
 * @package iumioFramework\Core\Units
 * @author RAFINA Dany <danyrafina@gmail.com>
 */
class SingletonPatternUnits extends SingletonPattern
{

    public function __construct(int ...$ints)
    {
    }

    public function test()
    {
        echo "TEST1";
    }

}