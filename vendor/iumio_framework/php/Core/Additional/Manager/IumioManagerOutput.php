<?php

namespace IumioFramework\Core\Additionnal\Console\Manager\Display;
use IumioFramework\Core\Additionnal\Console\Manager\Display\Style\IumioManagerColor;

/**
 * Class IumioManagerOutput
 * @package IumioFramework\Core\Additionnal\Console\Manager\Display
 */

class IumioManagerOutput
{
    /** Display message on command line
     * @param $message
     * @return int
     */
    final static public function display($message):int
    {
        $colors = new IumioManagerColor();

        // Test some basic printing with Colors class
        echo $colors->getColoredString("Testing Colors class, this is purple string on yellow background.", "purple", "yellow") . "\n";
        echo $colors->getColoredString("Testing Colors class, this is blue string on light gray background.", "blue", "light_gray") . "\n";
        echo $colors->getColoredString("Testing Colors class, this is red string on black background.", "red", "black") . "\n";
        echo $colors->getColoredString("Testing Colors class, this is cyan string on green background.", "cyan", "green") . "\n";
        echo $colors->getColoredString("Testing Colors class, this is cyan string on default background.", "cyan") . "\n";
        echo $colors->getColoredString("Testing Colors class, this is default string on cyan background.", null, "cyan") . "\n";

        echo "TEST $message \n";
        exit();
    }
}