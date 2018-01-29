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

namespace iumioFramework\Core\Requirement;
use iumioFramework\Exception\Server\Server500;

/**
 * Class EngineAutoloader
 * This class loads a class when is calling
 * @package iumioFramework\Core\Requirement
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */
class EngineAutoloader
{

    static public $diff = 0;
    static public $env = "dev";

    /** Register this class
     * @param $class string Class name
     * @return bool
     * @throws \Exception
     */
    public static function register(string $class)
    {
        self::checkPermission();
        self::buildClassMap(self::$env);
        $map = self::getMapClass();
        if (isset($map[$class])) {
            if (isset($map[$class]) && !@include_once $map[$class][0]) {
                // FIX FUNCTION SMARTY PLUGIN
                if (strpos($class, "Smarty_Internal_Compile_") !== false) {
                    return (true);
                }
                try {
                    @include_once  __DIR__."/../Exceptions/Server/Server500.php";
                    throw new \iumioFramework\Exception\Server\Server500(new \ArrayObject(array("explain" =>
                        "EngineAutoloader : Undefined class ".$class,
                        "solution" => "Refer to your app configuration.", "inlog" => false)));
                } catch (\Exception $e) {
                    die("EngineAutoloader : Undefined class ".$class);
                }
            }
        } else {
            self::buildClassMap(self::$env, true);
            $map = self::getMapClass();
            {
            if (isset($map[$class]) && !@include_once $map[$class][0]) {
                // FIX FUNCTION SMARTY PLUGIN
                if (strpos($class, "Smarty_Internal_Compile_") !== false) {
                    return true;
                }
                try {
                    @include_once  __DIR__."/../Exceptions/Server/Server500.php";
                    throw new  \iumioFramework\Exception\Server\Server500(new \ArrayObject(
                        array("explain" => "EngineAutoloader : Undefined class ".$class,
                            "solution" => "Refer to your app configuration.",
                            "inlog" => false)
                    ));
                } catch (\Exception $e) {
                    die("EngineAutoloader : Undefined class ".$class);
                }
            }
            }
        }
    }

    /**
     * Build a class map to improve iumio Framework performance
     * @param $env string Application Environment
     * @param $rebuild bool Instruction to rebuild map file class
     * @return bool If map class was rewrite
     */
    public static function buildClassMap(string $env, bool $rebuild = false):bool
    {
        $path = realpath(__DIR__."/../../../../").DIRECTORY_SEPARATOR;

        try {
            $map = file_get_contents($path.
                "elements/config_files/engine_autoloader/map.class.". ($env).".json");
        } catch (\Exception $e) {
            $map = "";
        }

        if (empty($map) || $rebuild == true) {
            $myfile = fopen($path."elements/config_files/engine_autoloader/map.class.".
                ($env).".json", "w") or die("Unable to open file!");
            fwrite($myfile, "", strlen(""));
            fclose($myfile);
            $json = array();
            $dt = new \DateTime();
            $dt = $dt->format("Y-m-d H:i:s");
            foreach (new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path)) as $filename) {
                if (strpos($filename, '.php') !== false) {
                    $classname2 = self::classesInFile($filename->getPathname());
                    for ($u = 0; $u < count($classname2[0]); $u++) {

                        $json[((isset($classname2[0]['namespace']) && $classname2[0]['namespace']
                        != "" ?($classname2[0]['namespace'])."\\" : "")).
                        ((isset($classname2[0]['classes']))? $classname2[0]['classes'][0]['name']
                            : $classname2[0][$u]['name'])] = array($filename->getPathname(), $dt);
                    }
                }
            }
            file_put_contents($path . "elements/config_files/engine_autoloader/map.class.".
                ($env).".json", json_encode($json, JSON_PRETTY_PRINT));
            return (true);
        }
        return (false);
    }


    /** Return maps class in array mode
     * @return array Map class
     */
    private static function getMapClass():array
    {
        $path = realpath(__DIR__."/../../../../").DIRECTORY_SEPARATOR;
        $map = file_get_contents($path.
            "elements/config_files/engine_autoloader/map.class.".self::$env.".json");
        return ((array)json_decode($map));
    }

    /** Get class name from file path
     * @param string $file string location file
     * @return mixed
     */
    private static function classesInFile(string $file)
    {

        $classes = $nsPos = $final = array();
        $foundNS = false;
        $ii = 0;

        if (!file_exists($file)) {
            return null;
        }

        $php_code = file_get_contents($file);
        $tokens = token_get_all($php_code);
        $count = count($tokens);

        for ($i = 0; $i < $count; $i++) {
            if (!$foundNS && $tokens[$i][0] == T_NAMESPACE) {
                $nsPos[$ii]['start'] = $i;
                $foundNS = true;
            } elseif ($foundNS && ($tokens[$i] == ';' || $tokens[$i] == '{')) {
                $nsPos[$ii]['end']= $i;
                $ii++;
                $foundNS = false;
            } elseif ($i-2 >= 0 && $tokens[$i - 2][0] == T_CLASS && $tokens[$i - 1][0] ==
                T_WHITESPACE && $tokens[$i][0] == T_STRING) {
                if ($i-4 >=0 && $tokens[$i - 4][0] == T_ABSTRACT) {
                    $classes[$ii][] = array('name' => $tokens[$i][1], 'type' => 'ABSTRACT CLASS');
                } else {
                    $classes[$ii][] = array('name' => $tokens[$i][1], 'type' => 'CLASS');
                }
            } elseif ($i-2 >= 0 && $tokens[$i - 2][0] == T_INTERFACE && $tokens[$i - 1][0] ==
                T_WHITESPACE && $tokens[$i][0] == T_STRING) {
                $classes[$ii][] = array('name' => $tokens[$i][1], 'type' => 'INTERFACE');
            }
        }

        if (empty($classes)) {
            return null;
        }

        if (!empty($nsPos)) {
            foreach ($nsPos as $k => $p) {
                $ns = '';
                for ($i = $p['start'] + 1; $i < $p['end']; $i++) {
                    $ns .= $tokens[$i][1];
                }

                $ns = trim($ns);
                $final[$k] = array('namespace' => $ns, 'classes' => $classes[$k+1]);
            }
            $classes = $final;
        }
        return $classes;
    }

    /**
     * Check the correct permission in directory :
     * @throws \Exception
     */
    public static function checkPermission():int
    {
        $base =  realpath(__DIR__."/../../../../").DIRECTORY_SEPARATOR;
        if (!is_executable($base."elements/") || !is_readable($base."elements/") ||
            !is_writable($base."elements/")) {
            throw new \Exception("Directory [elements] have not the correct permissions : 
            Must be read, write, executable permissions");
        }
        if (!is_executable($base."apps") || !is_readable($base."apps") ||
            !is_writable($base."apps")) {
            throw new \Exception("Directory [apps] have not the correct permissions : 
            Must be read, write, executable permissions");
        }
        if (!is_executable($base."public/components/apps") ||
            !is_readable($base."public/components/apps") ||
            !is_writable($base."public/components/apps")) {
            throw new \Exception("Directory [public/components/apps] have not the correct permissions :
             Must be read, write, executable permissions");
        }
        if (!is_executable($base."public/components/baseapps") ||
            !is_readable($base."public/components/baseapps") ||
            !is_writable($base."public/components/baseapps")) {
            throw new \Exception("Directory [public/components/baseapps] have not the correct permissions :
             Must be read, write, executable permissions");
        }
        return (1);
    }
}

spl_autoload_register('\iumioFramework\Core\Requirement\EngineAutoloader::register');
