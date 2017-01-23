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
     */
    final static public function displayAsSuccess(string $message)
    {
        $colors = self::getManagerColorInstance();
        echo $colors->getColoredString($message, "black", "green") . "\n";
        exit();
    }

    /** display Notice Message
     * @param string $message Message to display
     */
    final static public function displayAsNotice(string $message)
    {
        $colors = self::getManagerColorInstance();
        echo $colors->getColoredString($message, "black", "yellow") . "\n";
        exit();
    }

    /** display Error Message
     * @param string $message Message to display
     */
    final static public function displayAsError(string $message)
    {
        $colors = self::getManagerColorInstance();
        echo $colors->getColoredString($message, "red", "black") . "\n";
        exit();
    }

    /** Get OColor instance
     * @return OColor OColor instance
     */
    final static protected function getManagerColorInstance():OColor
    {
        return((self::$managerColor == NULL)? self::$managerColor = new OColor() : self::$managerColor);
    }
}