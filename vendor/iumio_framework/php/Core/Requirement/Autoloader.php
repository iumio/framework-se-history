<?php


/**
 * Class Autoloader
 * This class loads a class when is calling
 * @author RAFINA Dany <danyrafina@gmail.com>
 */
class Autoloader {

    /** Register this class
     * @param $class string Class name
     */
    static public function register(string $class)
    {
        $path = realpath(__DIR__."/../../../../..");
        $array2 = explode(chr(92), $class);
        $count2 = count($array2) - 1;
        $class = $array2[$count2].".php";
        foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path)) as $filename) {
            if (strpos($filename, '.php') !== false) {
                $array = explode("/", $filename);
                $count = count($array) - 1;
                if ($array[$count] == $class)
                    include_once $filename;
            }
        }
    }
}

spl_autoload_register('Autoloader::register');