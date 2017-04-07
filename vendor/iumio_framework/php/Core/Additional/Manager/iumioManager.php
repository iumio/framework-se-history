<?php

namespace  iumioFramework\Core\Additionnal\Console\Manager;

/**
 * Class iumioManager
 * @package iumioFramework\Core\Additionnal\Console\Manager
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class iumioManager
{

    /** Run manager console
     * @param int $argc Argument number
     * @param array $argv Arguments
     */
    final public function run(int $argc, array $argv)
    {
        $ar = new iumioArgs();
        $ar->getArgs($argc, $argv);
    }
}