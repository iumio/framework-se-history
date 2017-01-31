<?php

namespace IumioFramework\Core\Additionnal\Console\Manager\Display;
use IumioFramework\Core\Additionnal\Console\Manager\Display\Style\IumioManagerColor as OColor;

/**
 * Class IumioManagerOutput
 * @package IumioFramework\Core\Additionnal\Console\Manager\Display
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class IumioManagerOutput
{

    static protected $managerColor = NULL;

    /** display Success Message
     * @param string $message Message to display
     * @param string $exit Exit script
     */
    final static public function displayAsSuccess(string $message, string $exit = "yes")
    {
        $colors = self::getManagerColorInstance();
        echo $colors->getColoredString($message, "black", "green") . "\n";
        if ($exit == "yes") exit();
    }

    /** display Notice Message
     * @param string $message Message to display
     * @param string $exit Exit script
     */
    final static public function displayAsNotice(string $message, string $exit = "yes")
    {
        $colors = self::getManagerColorInstance();
        echo $colors->getColoredString($message, "black", "yellow") . "\n";
        if ($exit == "yes") exit();
    }

    /** display Error Message
     * @param string $message Message to display
     * @param string $exit Exit script
     */
    final static public function displayAsError(string $message, string $exit = "yes")
    {
        $colors = self::getManagerColorInstance();
        echo $colors->getColoredString($message, "white", "red") . "\n";
        if ($exit == "yes") exit();
    }

    /** Get OColor instance
     * @return OColor OColor instance
     */
    final static protected function getManagerColorInstance():OColor
    {
        return((self::$managerColor == NULL)? self::$managerColor = new OColor() : self::$managerColor);
    }
}