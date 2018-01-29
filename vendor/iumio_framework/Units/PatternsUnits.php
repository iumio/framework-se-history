<?php

/**
 *
 *  * This is an iumio Framework component
 *  *
 *  * (c) RAFINA DANY <dany.rafina@iumio.com>
 *  *
 *  * iumio Framework - iumio Components
 *  *
 *  * To get more information about licence, please check the licence file
 *
 */

namespace iumioFramework\Core\Units;

use iumioFramework\Units\FrameworkUnits;

/**
 * Class PatternsUnits
 * @package iumioFramework\Core\Units
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */
class PatternsUnits extends FrameworkUnits
{
    public function assertSingleton()
    {
        $sl = SingletonPatternUnits::getInstance(1);
        $sl->test();
    }
    public function execute()
    {
        // TODO: Implement execute() method.
    }
}
