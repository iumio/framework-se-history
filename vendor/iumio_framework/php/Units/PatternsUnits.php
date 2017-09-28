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

/**
 * Class PatternsUnits
 * @package iumioFramework\Core\Units
 * @author RAFINA Dany <danyrafina@gmail.com>
 */
class PatternsUnits
{
    public function assertSingleton()
    {
        $sl = SingletonPatternUnits::getInstance(1);
        $sl->test();
    }
}