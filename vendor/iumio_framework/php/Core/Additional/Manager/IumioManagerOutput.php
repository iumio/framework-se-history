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
     * @param string $message
     * @param string $textColor
     * @param string $backColor
     */
    final static public function display(string $message, string $textColor, string $backColor)
    {
        $colors = new IumioManagerColor();
        echo $colors->getColoredString($message, strtolower($textColor), strtolower($backColor)) . "\n";
        exit();
    }
}