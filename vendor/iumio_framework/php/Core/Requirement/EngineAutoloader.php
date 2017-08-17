<?php

/*
 * This is an iumio Framework component
 *
 * (c) RAFINA DANY <danyrafina@gmail.com>
 *
 * iumio Framework - iumio Components
 *
 * To get more information about licence, please check the licence file
 */

/**
 * Class EngineAutoloader
 * This class loads a class when is calling
 * @author RAFINA Dany <danyrafina@gmail.com>
 */
class EngineAutoloader {

    static public $diff = 0;
    static public $env = "DEV";

    /** Register this class
     * @param $class string Class name
     * @return bool
     */
    static public function register(string $class)
    {
        self::checkPermission();
        // $date = new DateTime();
        /*if (self::$env != "DEV")
        {
            self::buildClassMap(self::$env);
            $map = self::getMapClass();
            {
                if (!@include_once $map[$class])
                {

                    // FIX FUNCTION SMARTY PLUGIN
                    if (strpos($class, "Smarty_Internal_Compile_") !== false)
                        return (true);
                    try
                    {
                        include_once __DIR__."/../Exceptions/Server/Server500.php";
                        $e = new \iumioFramework\Exception\Server\Server500(new ArrayObject(array("explain" => "iumioEngineAutoloader : Undefined class ".$class, "solution" => "Refer to your app configuration.")));
                        $e->display("500", "FATAL ERROR");
                    }
                    catch (Exception $e)
                    {
                        die("iumioEngineAutoloader : Undefined class ".$class);
                    }

                }
            }
        }
        else
        {*/

            self::buildClassMap(self::$env);
            $map = self::getMapClass();
            if (isset($map[$class]))
            {
                    if (!@include_once $map[$class])
                    {
                        // FIX FUNCTION SMARTY PLUGIN
                        if (strpos($class, "Smarty_Internal_Compile_") !== false)
                            return (true);
                        try
                        {
                            include_once  __DIR__."/../Exceptions/Server/Server500.php";
                            throw new \iumioFramework\Exception\Server\Server500(new ArrayObject(array("explain" => "iumioEngineAutoloader : Undefined class ".$class, "solution" => "Refer to your app configuration.")));
                        }
                        catch (Exception $e)
                        {
                            die("iumioEngineAutoloader : Undefined class ".$class);
                        }
                    }
            }
            else {
                self::buildClassMap(self::$env, true);
                $map = self::getMapClass();
                {
                    if (!@include_once $map[$class])
                    {
                        // FIX FUNCTION SMARTY PLUGIN
                        if (strpos($class, "Smarty_Internal_Compile_") !== false)
                            return true;
                        try
                        {
                            include_once  __DIR__."/../Exceptions/Server/Server500.php";
                            throw new  \iumioFramework\Exception\Server\Server500(new ArrayObject(array("explain" => "iumioEngineAutoloader : Undefined class ".$class, "solution" => "Refer to your app configuration.")));
                        }
                        catch (Exception $e)
                        {
                            die("iumioEngineAutoloader : Undefined class ".$class);
                        }
                    }
                }
            }
        //}

        // $dateend = new DateTime();
        // self::$diff =  self::$diff  + ($dateend->getTimestamp() - $date->getTimestamp());
    }

    /**
     * Build a class map to improve iumio Framework performance
     * @param $env string Application Environment
     * @param $rebuild bool Instruction to rebuild map file class
     * @return bool If map class was rewrite
     */
    static private function buildClassMap(string $env, bool $rebuild = false):bool
    {
        $path = realpath(__DIR__."/../../../../..");

        try
        {
            $map = file_get_contents($path."/elements/config_files/map_".(($env == "DEV")? "dev_" : "")."class.json");
        }
        catch (Exception $e)
        {
            $map = "";
        }

        if (empty($map) || $rebuild == true) {
            $myfile = fopen($path."/elements/config_files/map_".(($env == "DEV")? "dev_" : "")."class.json", "w") or die("Unable to open file!");
            fwrite($myfile, "", strlen(""));
            fclose($myfile);
            $json = array();
            foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path)) as $filename) {
                if (strpos($filename, '.php') !== false) {
                    $classname2 = self::classes_in_file($filename->getPathname());
                    for ($u = 0; $u < count($classname2[0]); $u++)
                    {
                        $json[((isset($classname2[0]['namespace']) && $classname2[0]['namespace'] != "" ?($classname2[0]['namespace'])."\\" : "")).
                        ((isset($classname2[0]['classes']))? $classname2[0]['classes'][0]['name'] : $classname2[0][$u]['name'])] = $filename->getPathname();
                    }

                }
            }
            file_put_contents($path . "/elements/config_files/map_".(($env == "DEV")? "dev_" : "")."class.json", json_encode($json, JSON_PRETTY_PRINT));
            return (true);
        }
        return (false);
        // print_r($json);
    }


    /** Return maps class in array mode
     * @return array Map class
     */
    static private function getMapClass():array
    {
        $path = realpath(__DIR__."/../../../../..");
        $map = file_get_contents($path."/elements/config_files/map_".((self::$env == "DEV")? "dev_" : "")."class.json");
        return ((array)json_decode($map));
    }

    /** Get class name from file path
     * @param string $file string location file
     * @return mixed
     */
    static private function classes_in_file(string $file)
    {

        $classes = $nsPos = $final = array();
        $foundNS = FALSE;
        $ii = 0;

        if (!file_exists($file)) return NULL;

        $php_code = file_get_contents($file);
        $tokens = token_get_all($php_code);
        $count = count($tokens);

        for ($i = 0; $i < $count; $i++)
        {
            if(!$foundNS && $tokens[$i][0] == T_NAMESPACE)
            {
                $nsPos[$ii]['start'] = $i;
                $foundNS = TRUE;
            }
            elseif( $foundNS && ($tokens[$i] == ';' || $tokens[$i] == '{') )
            {
                $nsPos[$ii]['end']= $i;
                $ii++;
                $foundNS = FALSE;
            }
            elseif ($i-2 >= 0 && $tokens[$i - 2][0] == T_CLASS && $tokens[$i - 1][0] == T_WHITESPACE && $tokens[$i][0] == T_STRING)
            {
                if($i-4 >=0 && $tokens[$i - 4][0] == T_ABSTRACT)
                {
                    $classes[$ii][] = array('name' => $tokens[$i][1], 'type' => 'ABSTRACT CLASS');
                }
                else
                {
                    $classes[$ii][] = array('name' => $tokens[$i][1], 'type' => 'CLASS');
                }
            }
            elseif ($i-2 >= 0 && $tokens[$i - 2][0] == T_INTERFACE && $tokens[$i - 1][0] == T_WHITESPACE && $tokens[$i][0] == T_STRING)
            {
                $classes[$ii][] = array('name' => $tokens[$i][1], 'type' => 'INTERFACE');
            }
        }

        if (empty($classes)) return NULL;

        if(!empty($nsPos))
        {
            foreach($nsPos as $k => $p)
            {
                $ns = '';
                for($i = $p['start'] + 1; $i < $p['end']; $i++)
                    $ns .= $tokens[$i][1];

                $ns = trim($ns);
                $final[$k] = array('namespace' => $ns, 'classes' => $classes[$k+1]);
            }
            $classes = $final;
        }
        return $classes;
    }

    /**
     * Check the correct permission in directory :
     * /elements
     * /
     */
    static public function checkPermission():int
    {
        $base =  __DIR__."/../../../../../";
        if (!is_executable($base."elements/") || !is_readable($base."elements/") || !is_writable($base."elements/"))
            throw new \Exception("Directory [elements] have not good permission : Must be read, write, executable permission");
        if (!is_executable($base."apps") || !is_readable($base."apps") || !is_writable($base."apps"))
            throw new \Exception("Directory [apps] have not good permission : Must be read, write, executable permission");
        if (!is_executable($base."web/components/apps") || !is_readable($base."web/components/apps") || !is_writable($base."web/components/apps"))
            throw new \Exception("Directory [web/components/apps] have not good permission : Must be read, write, executable permission");
        if (!is_executable($base."web/components/baseapps") || !is_readable($base."web/components/baseapps") || !is_writable($base."web/components/baseapps"))
            throw new \Exception("Directory [web/components/baseapps] have not good permission : Must be read, write, executable permission");
        return (1);

    }
}

spl_autoload_register('EngineAutoloader::register');