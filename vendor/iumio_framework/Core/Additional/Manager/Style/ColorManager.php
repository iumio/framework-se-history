<?php

/**
 *
 *  * This is an iumio Framework component
 *  *
 *  * (c) RAFINA DANY <dany.rafina@iumio.com>
 *  *
 *  * iumio Framework - iumio Components
 *  *
 *  * To get more information about licence, please check the licence file
 *
 */

namespace iumioFramework\Core\Console\Display\Style;

use iumioFramework\Core\Console\CoreManager;

/**
 * Class ColorManager
 * @package iumioFramework\Core\Console\Display\Style
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */

class ColorManager
{
    private $foreground_colors = array();
    private $background_colors = array();

    /**
     * ColorManager constructor.
     */
    public function __construct()
    {
        // Set up shell colors
        $this->foreground_colors['black'] = '0;30';
        $this->foreground_colors['dark_gray'] = '1;30';
        $this->foreground_colors['blue'] = '0;34';
        $this->foreground_colors['light_blue'] = '1;34';
        $this->foreground_colors['green'] = '0;32';
        $this->foreground_colors['light_green'] = '1;32';
        $this->foreground_colors['cyan'] = '0;36';
        $this->foreground_colors['light_cyan'] = '1;36';
        $this->foreground_colors['red'] = '0;31';
        $this->foreground_colors['light_red'] = '1;31';
        $this->foreground_colors['purple'] = '0;35';
        $this->foreground_colors['light_purple'] = '1;35';
        $this->foreground_colors['brown'] = '0;33';
        $this->foreground_colors['yellow'] = '1;33';
        $this->foreground_colors['light_gray'] = '0;37';
        $this->foreground_colors['white'] = '1;37';

        $this->background_colors['black'] = '40';
        $this->background_colors['red'] = '41';
        $this->background_colors['green'] = '42';
        $this->background_colors['yellow'] = '43';
        $this->background_colors['blue'] = '44';
        $this->background_colors['magenta'] = '45';
        $this->background_colors['cyan'] = '46';
        $this->background_colors['light_gray'] = '47';
    }


    /** Return colored string
     * @param string $string message
     * @param string|null $foreground_color Foreground color
     * @param string|null $background_color Background color
     * @param bool $header If header is present
     * @return string Colored string
     */
    public function getColoredString(
        string $string,
        string $foreground_color = null,
        string $background_color = null,
        bool $header = true):string {
        if ($header) {
            $title = "Console Manager - ".CoreManager::getCurrentModule();
            $titleSeparator = $this->copyContent("-", strlen($title) + 10);
            $string = "\n\n" . $title . "\n" . $titleSeparator . "\n\n" . $string . "\n\n";
        } else {
            $string = "\n\n" . $string . "\n\n";
        }
        $string = $this->resizeContent($string);
        $colored_string = "";


        // Check if given foreground color found
        if (isset($this->foreground_colors[$foreground_color])) {
            $colored_string .= "\033[" . $this->foreground_colors[$foreground_color] . "m";
        }
        // Check if given background color found
        if (isset($this->background_colors[$background_color])) {
            $colored_string .= "\033[" . $this->background_colors[$background_color] . "m";
        }

        // Add string and end coloring
        $colored_string .=  $string . "\033[0m";

        return ($colored_string);
    }


    /** Return colored string for readline action
     * @param string $string message
     * @param string|null $foreground_color Foreground color
     * @param string|null $background_color Background color
     * @return string Colored string
     */
    public function getColoredStringReadLine(string $string, string $foreground_color = null,
                                             string $background_color = null ):string {
        $string = $this->resizeContent($string, 0);
        $colored_string = "";

        // Check if given foreground color found
        if (isset($this->foreground_colors[$foreground_color])) {
            $colored_string .= "\033[" . $this->foreground_colors[$foreground_color] . "m";
        }
        // Check if given background color found
        if (isset($this->background_colors[$background_color])) {
            $colored_string .= "\033[" . $this->background_colors[$background_color] . "m";
        }

        // Add string and end coloring
        $colored_string .=  $string . "\033[0m";

        return ($colored_string);
    }

    /** Resize a string (check the max length string line) and apply to all string line
     * @param string $content String content
     * @param int $space blank string
     * @return string new String
     */
    final private function resizeContent(string $content, int $space = 3):string
    {
        $maxLine = 0;
        $newString = "";
        foreach (preg_split("/((\r?\n)|(\r\n?))/", $content) as $line) {
            if ($maxLine < strlen($line)) {
                $maxLine = strlen($line);
            }
        }

        foreach (preg_split("/((\r?\n)|(\r\n?))/", $content) as $line) {
            $slength = strlen($line);
            $diff = abs($maxLine - $slength);


            $tmpStr = $this->copyContent(" ", $diff);
            $spaceRs = $this->copyContent(" ", $space);
            if ($space != 0) {
                $newString .= $spaceRs.$line.$tmpStr.$spaceRs."\n";
            } else {
                $newString .= "\n".$spaceRs.$line.$tmpStr.$spaceRs." ";
            }
        }
        return ($newString);
    }


    /** Returns all foreground color names
     * @return array Foreground color name array
     */
    public function getForegroundColors():array
    {
        return (array_keys($this->foreground_colors));
    }

    /** Copy a string several times
     * @param string $content Content to copy
     * @param int $coef Coefficient
     * @return string The result of opy
     * @method copyContent
     */
    final private function copyContent(string $content, int $coef):string
    {
        $str = "";
        for ($i = 0; $i < $coef; $i++) {
            $str = $str.$content;
        }
        return ($str);
    }

    /** Returns all background color names
     * @return array Background Color name array
     */
    public function getBackgroundColors():array
    {
        return (array_keys($this->background_colors));
    }
}
