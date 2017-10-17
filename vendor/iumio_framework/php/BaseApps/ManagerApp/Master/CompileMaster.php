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


namespace ManagerApp\Masters;

use iumioFramework\Masters\MasterCore;
use iumioFramework\Core\Base\Http\Response\Response;
use iumioFramework\Core\Additionnal\Server\ServerManager as Server;
use DirectoryIterator;

/**
 * Class CompileMaster
 * @package iumioFramework\Core\Manager
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <danyrafina@gmail.com>
 */

class CompileMaster extends MasterCore
{
    /**
     * Going to compile manager
     */
    public function compileActivity()
    {
        return ($this->render("compilemanager", array("selected" => "compilemanager")));
    }

    /** Clear compile system with specific environment
     * @param string $env Environment name
     * @return int
     */
    public function compileClearActivity(string $env):int
    {
        $this->callDelCreaServer($env);
        return ((new Response())->jsonRender(array("code" => 200, "msg" => "OK")));
    }


    /** Call Server delete and create function
     * @param string $env Environment name
     */
    private function callDelCreaServer(string $env)
    {
        Server::delete(ROOT_COMPILED."$env/", 'directory');
        Server::create(ROOT_COMPILED."$env/", 'directory');
    }

    /** Delete a compile for all environment
     */
    private function deleteAllCompile()
    {
        $a = array("dev", "prod");
        for ($i = 0; $i < count($a); $i++) {
            $this->callDelCreaServer($a[$i]);
        }
    }


    /** Compile cache system
     */
    public function compileClearAllActivity()
    {
        $this->deleteAllCompile();
        return ((new Response())->jsonRender(array("code" => 200, "msg" => "OK")));
    }

    /** Get all compile directory
     * @return int
     */
    public function getAllEnvActivity()
    {
        $directory = array();
        $iterator = new DirectoryIterator(ROOT_COMPILED);
        foreach ($iterator as $dir_info) {
            if ($dir_info->isDir() && !$dir_info->isDot()) {
                $octal_perms = substr(sprintf('%o', $dir_info->getPerms()), -4);
                $perms = false;

                if ($octal_perms == "0777" || $octal_perms == "0775"  || $octal_perms == "0755" ||
                    $octal_perms == "7775" || $octal_perms == "7777" || $octal_perms == "7755") {
                    $perms = true;
                }
                array_push($directory, array("path" => $dir_info->getRealPath(), "name" => $dir_info->getFilename(),
                    "size" => ($this->fileSizeConvert($this->folderSize($dir_info->getRealPath()))),
                    "nperms" => $octal_perms,
                    "perms" => $perms, "status" => (($this->checkFolderIsEmptyOrNot(ROOT_COMPILED.
                            $dir_info->getFilename()) == true)? "Empty" : "Not empty"),
                    "env" => $dir_info->getFilename(),
                    "clear" => $this->generateRoute(
                        "iumio_manager_compile_manager_remove",
                        array("env" => $dir_info->getFilename()),
                        null,
                        true
                    )));
            }
        }

        return ((new Response())->jsonRender(array("code" => 200, "results" => $directory)));
    }


    /** Check if directory is empty or not
     * @param string $folderName Directory name
     * @return bool empty or not
     */
    private function checkFolderIsEmptyOrNot(string $folderName):bool
    {
        $files = array ();
        if ($handle = opendir($folderName)) {
            while (false !== ($file = readdir($handle))) {
                if ($file != "." && $file != "..") {
                    $files [] = $file;
                }
            }
            closedir($handle);
        }
        return ((count($files) === 0) ?  true : false);
    }


    /** Get size folder
     * @param string $dir Dir path
     * @return int folder size
     */
    private function folderSize(string $dir):int
    {
        $size = 0;
        foreach (glob(rtrim($dir, '/').'/*', GLOB_NOSORT) as $each) {
            $size += is_file($each) ? filesize($each) : $this->folderSize($each);
        }
        return ($size);
    }

    /**
     * Converts bytes into human readable file size.
     *
     * @param int $bytes Directory size
     * @return string human readable file size (2,87 МB)

     */
    private function fileSizeConvert(int $bytes)
    {
        $bytes = floatval($bytes);
        $result = "0 B";
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

        foreach ($arBytes as $arItem) {
            if ($bytes >= $arItem["VALUE"]) {
                $result = $bytes / $arItem["VALUE"];
                $result = str_replace(".", ",", strval(round($result, 2)))." ".$arItem["UNIT"];
                break;
            }
        }
        return $result;
    }
}
