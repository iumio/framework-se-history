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


namespace iumioFramework\Setup\Requirements;

session_start();
/**
 * Class Tools
 * @package iumioFramework\Setup\Requirements
 * @author RAFINA Dany <danyrafina@gmail.com>
 */
class Tools
{

    public static $php_accept               = 7;
    public static $framework_build_accept   = 201738;
    public static $framework_version_accept = "0.3.8";
    public static $libs                     = array(
        "web/components/libs/jquery/"       => "jQuery libs not found : check if 'composer install' command had be done",
        "web/components/libs/font-awesome/" => "Font-awesome libs not found : check if 'composer install' command had be done",
        "web/components/libs/bootstrap/"    => "Bootstrap libs not found : check if 'composer install' command had be done",
        "vendor/libs/smarty/"               => "Smarty libs not found : check if 'composer install' command had be done"
    );

    public static $php_extensions           = array(
        "zip"                               => "libzip is not loaded or not installed : check your extension installation"
    );

    public static $apache_extensions        = array(
        "mod_rewrite"                       => "mod_rewrite is not found in your server: Please install this extension"
    );

    /** Check the php version
     * @return string If php version is compatible
     */
    final static public function checkPhpVersion()
    {
        $phpv = phpversion();

        if ($phpv >= self::$php_accept)
            return (json_encode(array("code" => 200, "results" => "OK", "phpv" => $phpv)));
        else
            return (json_encode(array("code" => 500, "results" => "NOK", "phpv" => $phpv, "msg" => "The version of PHP is incompatible with iumio Framework. You must have the version min 7.0.0 of PHP on the webserver.")));

    }

    /** Check the iumio Framework version
     * @return string If iumio Framework version is compatible
     */
    final static public function checkFrameworkBuildVersion()
    {
        $f = fopen('../../vendor/iumio_framework/php/Core/Requirement/iumioCore.php', 'r');
        $v = 0;
        $build = 0;
        $e = 0;
        $st = 0;
        while ($line = fgets($f, 8192))
        {
            if ($v != 0 && $build != 0 && $e != 0 && $st != 0)
                break;
            if (strpos($line, 'const VERSION =') !== false)
                $v = $line;
            if (strpos($line, 'const VERSION_BUILD =') !== false)
                $build = $line;
            if (strpos($line, 'const VERSION_EDITION =') !== false)
                $e = $line;
            if (strpos($line, 'const VERSION_STAGE =') !== false)
                $st = $line;
        }

        fclose($f);

        $v = explode('=', $v);
        $build = explode('=', $build);
        $e = explode('=', $e);
        $st = explode('=', $st);
        $v = trim(str_replace(';', '', $v[count($v) - 1]));
        $build = trim(str_replace(';', '', $build[count($build) - 1]));
        $e = trim(str_replace(';', '', $e[count($e) - 1]));
        $st = trim(str_replace(';', '', $st[count($st) - 1]));
        $v = str_replace("'", '', $v);
        $e = str_replace("'", '', $e);
        $st = str_replace("'", '', $st);

        if ($build >= self::$framework_build_accept)
        {
            $_SESSION['version'] = trim($v);
            return (json_encode(array("code" => 200, "results" => "OK", "fv" => trim($v), "edition" => $e, 'stage' => $st)));
        }
        else
            return (json_encode(array("code" => 500, "results" => "NOK", "fv" => self::$framework_version_accept, "msg" => "The version of iumio Framework is incompatible with iumio installer. You must have the version min " . self::$framework_version_accept . " of iumio Framework on the webserver.")));

    }


    /**
     * Check the correct permission in directory :
     * /elements
     * /apps
     * @return int Correct permissions or not
     */
    final static public function checkPermission()
    {
        $base =  __DIR__."/../../";
        if (!self::checkIsExecutable($base."elements/") || !self::checkIsReadable($base."elements/") || !self::checkIsWritable($base."elements/"))
            return (json_encode(array("code" => 500, "results" => "NOK", "wr" => "elements", "msg" => "Folder elements/ does not have correct permission. Must be read, write, executable permission")));

        if (!self::checkIsExecutable($base."apps/") || !self::checkIsReadable($base."apps/") || !self::checkIsWritable($base."apps/"))
            return (json_encode(array("code" => 500, "results" => "NOK", "wr" => "apps/", "msg" => "Folder apps/ does not have correct permission. Must be read, write, executable permission")));

        return (json_encode(array("code" => 200, "results" => "OK")));

    }

    /** Check if dir is empty or not
     * @param $dir string Dir path
     * @return bool|null If empty or not
     */
    final static public function is_dir_empty($dir) {
        if (!is_readable($dir)) return (null);
        $handle = opendir($dir);
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") return (false);
        }
        return (true);
    }

    /**
     * Check if librairies required are installed
     * @return int Are installed or not
     */
    final static public function checkLibrariesRequired()
    {
        $base =  __DIR__."/../../";
        foreach (self::$libs as $lib => $val)
        {
            if (!is_dir($base.$lib) || !self::checkIsReadable($base.$lib) || !self::checkIsWritable($base.$lib) || self::is_dir_empty($base.$lib))
                return (json_encode(array("code" => 500, "results" => "NOK", "libsr" => $lib, "msg" => $val)));
        }

        foreach (self::$php_extensions as $lib => $val)
        {
            if (!extension_loaded($lib))
                return (json_encode(array("code" => 500, "results" => "NOK", "libsr" => $lib, "msg" => $val)));
        }

        return (json_encode(array("code" => 200, "results" => "OK")));
    }

    /** Check if element is readable
     * @param string $path Element path
     * @return bool Is element is readable or not
     */
    final static public function checkIsReadable($path)
    {
        return (is_readable($path));
    }


    /** Check if element is executable
     * @param string $path Element path
     * @return bool Is element is executable or not
     */
    final static public function checkIsExecutable($path)
    {
        return (is_executable($path));
    }

    /** Check if element is writable
     * @param string $path Element path
     * @return bool Is element is writable or not
     */
    final static public function checkIsWritable($path)
    {
        return (is_writable($path));
    }

    /**
     * Processing to create app
     * @param $appname string The application name
     * @param $temp string If template is required
     * @param $version string iumio Framework version
     * @return string App process is a successs
     */
    final static public function createAppProcess($appname, $temp, $version)
    {
        $base = __DIR__."/../../";
        include_once $base."vendor/iumio_framework/php/Core/ServerManager/iumioServerManager.php";
        $temdirbase = $base."vendor/iumio_framework/php/Core/Additional/Manager/Module/AppManager/AppTemplate";
        $tempdir = ($temp == "0")? $temdirbase.'/notemplate/{appname}' : $temdirbase.'/template/{appname}';
        \iumioFramework\Core\Additionnal\Server\iumioServerManager::copy($tempdir, $base."/apps/".$appname, 'directory');
        $napp = $base."/apps/".$appname;

        // APP
        $f = file_get_contents($napp."/{appname}.php.local");
        $str = str_replace("{appname}", $appname, $f);
        file_put_contents($napp."/{appname}.php.local", $str);
        rename($napp."/{appname}.php.local", $napp."/$appname.php");

        // RT
        $f = file_get_contents($napp."/Routing/default.rt");
        $str = str_replace("{appname}", $appname, $f);
        file_put_contents($napp."/Routing/default.rt", $str);

        // MASTER
        $f = file_get_contents($napp."/Master/DefaultMaster.php.local");
        $str = str_replace("{appname}", $appname, $f);
        file_put_contents($napp."/Master/DefaultMaster.php.local", $str);
        rename($napp."/Master/DefaultMaster.php.local", $napp."/Master/DefaultMaster.php");

        // REGISTER TO APP CORE
        $f = json_decode(file_get_contents($base."/elements/config_files/core/apps.json"));
        $lastapp = 0;

        if (!is_object($f))
            $f = new \stdClass();

        foreach ($f as $one => $val) $lastapp++;

        $f->$lastapp = new \stdClass();
        $f->$lastapp->name = $appname;
        $f->$lastapp->enabled = "yes";
        $f->$lastapp->prefix = "";
        $f->$lastapp->class = "\\".$appname."\\".$appname;
        $ndate = new \DateTime('UTC');
        $f->$lastapp->creation = $ndate;
        $f->$lastapp->update = $ndate;
        $f = json_encode($f, JSON_PRETTY_PRINT);
        file_put_contents($base."/elements/config_files/core/apps.json", $f);
        if ($temp == "1")
            \iumioFramework\Core\Additionnal\Server\iumioServerManager::copy($base."/apps/".$appname."/Front/Resources/", $base."/web/components/apps/dev/".strtolower($appname), 'directory', true);

        self::initialJSON($version);
        unset($_SESSION['version']);
        return ("OK");
    }

    /**
     * Build initial.json
     * @param $version string Framework version
     */
    final static protected function initialJSON($version)
    {
        $base = __DIR__."/../../";
        $f = json_decode(file_get_contents($base."/elements/config_files/core/initial.json"));
        if (empty($f))
        {
            $std = new \stdClass();
            $std->installation = new \DateTime();
            $std->version = $version;
            $std->user = get_current_user();
            $std->location = realpath($base);
            $std->os = PHP_OS;

            $rs = json_encode($std, JSON_PRETTY_PRINT);
            file_put_contents($base."/elements/config_files/core/initial.json", $rs);
        }
    }
}


/**
 * Check url parameters
 */
if (isset($_REQUEST) && isset($_REQUEST["action"]))
{
    if ($_REQUEST["action"] == "phpv")
        echo (\iumioFramework\Setup\Requirements\Tools::checkPhpVersion());
    else if ($_REQUEST["action"] == "fv")
        echo (\iumioFramework\Setup\Requirements\Tools::checkFrameworkBuildVersion());
    else if ($_REQUEST["action"] == "wr")
        echo (\iumioFramework\Setup\Requirements\Tools::checkPermission());
    else if ($_REQUEST["action"] == "libsr")
        echo (\iumioFramework\Setup\Requirements\Tools::checkLibrariesRequired());
    else if ($_REQUEST["action"] == "createapp")
    {
        if (isset($_REQUEST["appname"], $_REQUEST["template"], $_SESSION["version"]) && $_REQUEST["appname"] != "" && $_REQUEST["template"] != "" && $_SESSION["version"] != "")
            echo (\iumioFramework\Setup\Requirements\Tools::createAppProcess($_REQUEST["appname"], $_REQUEST["template"], $_SESSION["version"]));
        else
            echo (json_encode(array("code" => 500, "results" => "NOK", "msg" => "Missing required parameter")));
    }
    else
        echo (json_encode(array("code" => 500, "results" => "NOK", "msg" => "No valid route")));
}
