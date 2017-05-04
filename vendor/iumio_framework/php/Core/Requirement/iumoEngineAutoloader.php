<?php


/**
 * Class iumioEngineAutoloader
 * This class loads a class when is calling
 * Edited with new iumio Engine Autoloader
 * @author RAFINA Dany <danyrafina@gmail.com>
 */
class iumoEngineAutoloader {

    static public $diff = 0;

    /** Register this class
     * @param $class string Class name
     */
    static public function register(string $class)
    {
        self::buildClassMap();

        $date = new DateTime();
          $map = self::getMapClass();
        // print_r($map);
        // echo $class;
         include_once $map[$class];
        /*$path = realpath(__DIR__."/../../../../..");
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

        }*/
        $dateend = new DateTime();
        self::$diff =  self::$diff  + ($dateend->getTimestamp() - $date->getTimestamp());
    }

    /**
     * Build a class map to improve iumio Framework performance
     * @return bool If map class was rewrite
     */
    static private function buildClassMap():bool
    {
        $path = realpath(__DIR__."/../../../../..");
        $map = file_get_contents($path."/elements/config_files/map_class.json");
        if (empty($map)) {
            $json = array();
            foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path)) as $filename) {
                if (strpos($filename, '.php') !== false) {
                    $array = explode("/", $filename);
                    $count = count($array) - 1;
                    //$a = new SplFileInfo();
                    //$a->getBasename()
                    // $classname = self::get_class_from_file($filename->getPathname());
                    $classname2 = self::classes_in_file($filename->getPathname());
                    // print_r ( $classname2)."<br>";
                    // $json[$classname] = $filename->getPathname();
                    // echo substr($filename->getFilename(), 0, (strlen($filename->getFilename()) - 4))."<br>";
                    // echo substr($classname, (strlen($classname) - 1), (strlen($classname)))."<br>";
                    // echo $filename."<br>";
                    /*if (substr($classname, (strlen($classname) - 1), (strlen($classname))) == "\\")
                    {
                        $name = substr($filename->getFilename(), 0, (strlen($filename->getFilename()) - 4));
                        $json[$classname.$name] = $filename->getPathname();
                    }
                    else
                        $json[$classname] = $filename->getPathname();*/
                    $json[((isset($classname2[0]['namespace']) && $classname2[0]['namespace'] != "" ?($classname2[0]['namespace'])."\\" : "")).((isset($classname2[0]['classes']))? $classname2[0]['classes'][0]['name'] : $classname2[0][0]['name'])] = $filename->getPathname();
                    // echo "$array[$count] <br>";
                }
            }
            file_put_contents($path . "/elements/config_files/map_class.json", json_encode($json));
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
        $map = file_get_contents($path."/elements/config_files/map_class.json");
        return ((array)json_decode($map));
    }

    /** Get class name from file path
     * @param string $file string location file
     * @return array
     */
    static private function classes_in_file(string $file):array
    {

        $classes = $nsPos = $final = array();
        $foundNS = FALSE;
        $ii = 0;

        if (!file_exists($file)) return NULL;

        $er = error_reporting();
        error_reporting(E_ALL ^ E_NOTICE);

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

    /** Get class name from file path
     * @param $path_to_file string location file
     * @return string Class name with namespace
     */
    static private function get_class_from_file(string $path_to_file):string
    {
        // Grab the contents of the file
        $contents = file_get_contents($path_to_file);

        // Start with a blank namespace and class
        $namespace = $class = "";

        // Set helper values to know that we have found the namespace/class token and need to collect the string values after them
        $getting_namespace = $getting_class = false;

        // Go through each token and evaluate it as necessary
        foreach (token_get_all($contents) as $token) {

            // If this token is the namespace declaring, then flag that the next tokens will be the namespace name
            if (is_array($token) && $token[0] == T_NAMESPACE) {
                $getting_namespace = true;
            }

            // If this token is the class declaring, then flag that the next tokens will be the class name
            if (is_array($token) && $token[0] == T_CLASS) {
                $getting_class = true;
            }

            // While we're grabbing the namespace name...
            if ($getting_namespace === true) {

                // If the token is a string or the namespace separator...
                if(is_array($token) && in_array($token[0], [T_STRING, T_NS_SEPARATOR])) {

                    // Append the token's value to the name of the namespace
                    $namespace .= $token[1];

                }
                else if ($token === ';') {

                    // If the token is the semicolon, then we're done with the namespace declaration
                    $getting_namespace = false;

                }
            }

            // While we're grabbing the class name...
            if ($getting_class === true) {

                // If the token is a string, it's the name of the class
                if(is_array($token) && $token[0] == T_STRING) {

                    // Store the token's value as the class name
                    $class = $token[1];

                    // Got what we need, stope here
                    break;
                }
            }
        }

        // Build the fully-qualified class name and return it
        return ($namespace ? $namespace . '\\' . $class : $class);

    }
}

spl_autoload_register('iumoEngineAutoloader::register');