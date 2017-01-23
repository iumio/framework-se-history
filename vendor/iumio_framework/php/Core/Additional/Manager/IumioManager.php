<?php

namespace  IumioFramework\Core\Additionnal\Console\Manager;
use IumioFramework\Core\Additionnal\Console\Manager\IumioArgs as Args;

/**
 * Class IumioManager
 * @package IumioFramework\Core\Additionnal\Console\Manager
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class IumioManager
{

    /** Run manager console
     * @param int $argc Argument number
     * @param array $argv Arguments
     */
    final public function run(int $argc, array $argv)
    {
        $ar = new Args();
        $ar->getArgs($argc, $argv);
    }
}