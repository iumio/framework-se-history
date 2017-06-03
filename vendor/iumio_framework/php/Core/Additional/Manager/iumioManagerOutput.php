<?php

namespace iumioFramework\Core\Additionnal\Console\Manager\Display;
use iumioFramework\Core\Additionnal\Console\Manager\Display\Style\iumioManagerColor as OColor;

/**
 * Class iumioManagerOutput
 * @package iumioFramework\Core\Additionnal\Console\Manager\Display
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class iumioManagerOutput
{

    static protected $managerColor = NULL;

    /** display Success Message
     * @param string $message Message to display
     * @param string $exit Exit script
     * @param bool $header If header is display
     */
    final static public function displayAsSuccess(string $message, string $exit = "yes", bool $header = true)
    {
        $colors = self::getManagerColorInstance();
        echo "\n\n".$colors->getColoredString($message, "black", "green", $header);
        if ($exit == "yes") exit();
    }

    /** display Notice Message
     * @param string $message Message to display
     * @param string $exit Exit script
     */
    final static public function displayAsNotice(string $message, string $exit = "yes")
    {
        $colors = self::getManagerColorInstance();
        echo "\n\n".$colors->getColoredString($message, "black", "yellow");
        if ($exit == "yes") exit();
    }

    /** display Error Message
     * @param string $message Message to display
     * @param string $exit Exit script
     */
    final static public function displayAsError(string $message, string $exit = "yes")
    {
        $colors = self::getManagerColorInstance();
        echo "\n\n".$colors->getColoredString($message, "white", "red");
        if ($exit == "yes") exit();
    }

    /** display As Normal Message
     * @param string $message Message to display
     * @param string $exit Exit script
     */
    static public function displayAsNormal(string $message, string $exit = "yes")
    {
        $colors = self::getManagerColorInstance();
        echo "\n\n".$colors->getColoredString($message, "black", "green", false);
        if ($exit == "yes") exit();
    }

    /** display for read line Message
     * @param string $message Message to display
     * @param string $exit Exit script
     */
    static public function displayAsReadLine(string $message, string $exit = "yes")
    {
        $colors = self::getManagerColorInstance();
        echo "\n".$colors->getColoredStringReadLine($message, "black", "transparent");
        if ($exit == "yes") exit();
    }

    /** display for end Success Message
     * @param string $message Message to display
     * @param string $exit Exit script
     */
    static public function displayAsEndSuccess(string $message, string $exit = "yes")
    {
        $colors = self::getManagerColorInstance();
        self::clear();
        echo "\n".$colors->getColoredString($message, "black", "green");
        if ($exit == "yes") exit();
    }

    /** Get OColor instance
     * @return OColor OColor instance
     */
    final static protected function getManagerColorInstance():OColor
    {
        return((self::$managerColor == NULL)? self::$managerColor = new OColor() : self::$managerColor);
    }

    /** Clear the command line text
     * @return bool As a success
     */
    final static public function clear():bool
    {
        echo chr(27).chr(91).'H'.chr(27).chr(91).'J'; // ^[H^[J;
        return (true);
    }
}