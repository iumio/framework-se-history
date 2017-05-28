<?php

namespace ManagerApp\Master;
use iumioFramework\Masters\iumioUltimaMaster as Master;
use iumioFramework\Core\Base\Http\Response\Response;
use iumioFramework\Core\Additionnal\Server\iumioServerManager as Server;
use DirectoryIterator;

/**
 * Class CacheMaster
 * @package iumioFramework\Core\Manager
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class CacheMaster extends Master
{
    /**
     * Going to cache manager
     */
    public function cacheActivity()
    {
        return ($this->render("cachemanager", array("selected" => "cachemanager")));
    }

    /** Clear cache system with specific environment
     * @param string $env Environment name
     * @return int
     */
    public function cacheClearActivity(string $env):int
    {
        $this->callDelCreaServer($env);
        return ((new Response())->JSON_RENDER(array("code" => 200, "msg" => "OK")));
    }


    /** Call Server delete and create function
     * @param string $env Environment name
     */
    private function callDelCreaServer(string $env)
    {
        Server::delete(ROOT_CACHE."$env/", 'directory');
        Server::create(ROOT_CACHE."$env/", 'directory');
    }

    /** Delete a cache for all environment
     */
    private function deleteAllCache()
    {
        $a = array("dev", "preprod", "prod");
        for ($i = 0; $i < count($a); $i++)
            $this->callDelCreaServer($a[$i]);
    }


    /** Clear cache system
     */
    public function cacheClearAllActivity()
    {
        $this->deleteAllCache();
        return ((new Response())->JSON_RENDER(array("code" => 200, "msg" => "OK")));
    }

    /** Get all cache directory
     * @return int
     */
    public function getAllEnvActivity()
    {
        $directory = array();
        $iterator = new DirectoryIterator(ROOT_CACHE);
        foreach ($iterator as $dir_info) {
            if ($dir_info->isDir() && !$dir_info->isDot()) {
                //echo $dir_info->getSize()."<br>";
                $octal_perms = substr(sprintf('%o', $dir_info->getPerms()), -4);
                $perms = false;
                if ($octal_perms === "0777" || $octal_perms === "0775"  || $octal_perms === "0755" || $octal_perms === "7775" || $octal_perms === "7777" || $octal_perms === "7755")
                    $perms = true;
                array_push($directory, array("path" => $dir_info->getRealPath(), "name" => $dir_info->getFilename(),
                    "size" => ($this->formatBytes($dir_info->getSize())), "nperms" => $octal_perms,
                    "perms" => $perms, "status" => (($this->checkFolderIsEmptyOrNot(ROOT_CACHE.$dir_info->getFilename()) == true)? "Empty" : "Is not empty"),
                    "env" => $dir_info->getFilename(),
                    "clear" => $this->generateRoute("iumio_manager_cache_manager_remove", array("env" => $dir_info->getFilename()), null, true)));
            }
        }

        return ((new Response())->JSON_RENDER(array("code" => 200, "results" => $directory)));
    }


    /** Check if directory is empty or not
     * @param string $folderName Directory name
     * @return bool empty or not
     */
    private function checkFolderIsEmptyOrNot(string $folderName):bool
    {
        $files = array ();
        if ($handle = opendir ($folderName)) {
            while ( false !== ($file = readdir ($handle))) {
                if ($file != "." && $file != ".." ) {
                    $files [] = $file;
                }
            }
            closedir ( $handle );
        }
        return ((count ($files) === 0) ?  true : false);
    }


    private function formatBytes(int $bytes, int $precision = 2): string
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        // Uncomment one of the following alternatives
        // $bytes /= pow(1024, $pow);
        // $bytes /= (1 << (10 * $pow));

        return round($bytes, $precision) . ' ' . $units[$pow];
    }



}