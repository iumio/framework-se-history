<?php


namespace iumioFramework\Manager\Console\Module\App;

use iumioFramework\Core\Additionnal\Console\Manager\Display\iumioManagerOutput as IMO;

/**
 * Class AppManagerOutput
 * @package iumioFramework\Manager\Console\Module\App
 * @author RAFINA Dany <danyrafina@gmail.com>
 */
class AppManagerOutput extends IMO
{

    /** display Success Message
     * @param string $message Message to display
     * @param string $exit Exit script
     */
    static public function outputAsSuccess(string $message, string $exit = "yes")
    {
        $colors = self::getManagerColorInstance();
        echo "\n\n".$colors->getColoredString($message, "black", "green");
        if ($exit == "yes") exit();
    }

    /** display As Normal Message
     * @param string $message Message to display
     * @param string $exit Exit script
     */
    static public function outputAsNormal(string $message, string $exit = "yes")
    {
        $colors = self::getManagerColorInstance();
        echo "\n\n".$colors->getColoredString($message, "black", "green", false);
        if ($exit == "yes") exit();
    }

    /** display for read line Message
     * @param string $message Message to display
     * @param string $exit Exit script
     */
    static public function outputAsReadLine(string $message, string $exit = "yes")
    {
        $colors = self::getManagerColorInstance();
        echo "\n".$colors->getColoredStringReadLine($message, "yellow", "transparent");
        if ($exit == "yes") exit();
    }

    /** display Notice Message
     * @param string $message Message to display
     * @param string $exit Exit script
     */
    final static public function outputAsNotice(string $message, string $exit = "yes")
    {
        $colors = self::getManagerColorInstance();
        echo "\n\n".$colors->getColoredString($message, "black", "yellow");
        if ($exit == "yes") exit();
    }

    /** display Error Message
     * @param string $message Message to display
     * @param string $exit Exit script
     */
    final static public function outputAsError(string $message, string $exit = "yes")
    {
        $colors = self::getManagerColorInstance();
        echo "\n\n".$colors->getColoredString($message, "white", "red");
        if ($exit == "yes") exit();
    }

    /** display for end Success Message
     * @param string $message Message to display
     * @param string $exit Exit script
     */
    static public function outputAsEndSuccess(string $message, string $exit = "yes")
    {
        $colors = self::getManagerColorInstance();
        self::clear();
        echo $colors->getColoredString($message, "black", "green");
        if ($exit == "yes") exit();
    }

    /** Clear CLI text
     * @return bool As a success
     */
    final static public function clear():bool
    {
        return (parent::clear());
    }
}