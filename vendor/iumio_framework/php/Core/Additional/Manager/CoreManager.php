<?php

namespace iumioFramework\Core\Console;

/**
 * Class CoreManager
 * @package iumioFramework\Core\Console
 * @author RAFINA Dany <danyrafina@gmail.com>
 */
class CoreManager
{
    private static $currentModule = "Main";

    /** Run manager console
     * @param int $argc Argument number
     * @param array $argv Arguments
     */
    final public function run(int $argc, array $argv)
    {
        $ar = new ArgsManager();
        $ar->getArgs($argc, $argv);
    }

    /** Get current module
     * @return string Current module name
     */
    static public function getCurrentModule():string
    {
        return self::$currentModule;
    }

    /** Set new current module
     * @param string $currentModule The current module
     */
    static public function setCurrentModule(string $currentModule)
    {
        self::$currentModule = $currentModule;
    }


}