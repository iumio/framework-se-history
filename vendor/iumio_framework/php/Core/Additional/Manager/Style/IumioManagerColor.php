<?php

namespace IumioFramework\Core\Additionnal\Console\Manager\Display\Style;

/**
 * Class IumioManagerColor
 * @package IumioFramework\Core\Additionnal\Console\Manager\Display\Style
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class IumioManagerColor
{
    private $foreground_colors = array();
    private $background_colors = array();

    /**
     * IumioManagerColor constructor.
     */
    public function __construct() {
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
     * @return string Colored string
     */
    public function getColoredString(string $string, string $foreground_color = null, string $background_color = null):string
    {
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


    /** Returns all foreground color names
     * @return array Foreground color name array
     */
    public function getForegroundColors():array
    {
        return (array_keys($this->foreground_colors));
    }


    /** Returns all background color names
     * @return array Background Color name array
     */
    public function getBackgroundColors():array
    {
        return (array_keys($this->background_colors));
    }
}