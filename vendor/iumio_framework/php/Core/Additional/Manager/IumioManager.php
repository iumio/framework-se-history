<?php

namespace  IumioFramework\Core\Additionnal\Console\Manager;
use IumioFramework\Core\Additionnal\Console\Manager\IumioArgs as Args;

/**
 * Class IumioManager
 * @package IumioFramework\Core\Additionnal\Console\Manager
 */

class IumioManager
{
    /** Run manager console
     * @param int $argc
     * @param array $argv
     */
    final public function run(int $argc, array $argv)
    {
        $ar = new Args();
        $ar->getArgs($argc, $argv);
    }
}