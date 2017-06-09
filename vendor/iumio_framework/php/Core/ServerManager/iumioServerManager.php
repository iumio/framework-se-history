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

namespace iumioFramework\Core\Additionnal\Server;

/**
 * Class iumioServer
 * @package iumioFramework\Core\Additionnal\Server
 * @author RAFINA Dany <danyrafina@gmail.com>
 */
class iumioServerManager
{
    /** Create an element on the server
     * @param string $path Element Path
     * @param string $type Element type
     * @return int Result
     * @throws \Exception Generate Error
     */
    static public function create(string $path, string $type):int
    {
        try
        {
            switch ($type)
            {
                case "directory":
                    if (!is_dir($path))
                        mkdir($path);
                    break;
                case "file":
                    if (!file($path))
                        touch($path);
                    break;
            }

        }
        catch (\Exception $exception)
        {
            throw new \Exception("iumio Server Error : Cannot create $type element => ".$exception);
        }

        return (1);
    }

    /** Move an element on the server
     * @param string $path Element Path
     * @param string $to Move to
     * @param bool $symlink Is symlink
     * @return int Result
     * @throws \Exception Generate Error
     */
    static public function move(string $path, string $to, bool $symlink = false):int
    {
        try
        {
            if ($symlink != false) symlink($path, $to); else rename($path, $to);
        }
        catch (\Exception $exception)
        {
            throw new \Exception("iumio Server Error : Cannot move $path to $to => ".$exception);
        }

        return (1);
    }


    /** Copy an element on the server
     * @param string $path Element Path
     * @param string $to Move to
     * @param string $type Element type
     * @param bool $symlink Is symlink
     * @return int Result
     * @throws \Exception Generate Error
     */
    static public function copy(string $path, string $to, string $type, bool $symlink = false):int
    {
        try
        {
            if ($symlink != false) @symlink($path, $to);
            else if ($symlink == false && $type == "directory") self::recursiveCopy($path, $to);
            else if ($symlink == false && $type == "file") copy($path, $to);
            else throw new \Exception("iumio Server Error on Copy: Element type is not regonized");
        }
        catch (\Exception $exception)
        {
            throw new \Exception("iumio Server Error : Cannot move $path to $to => ".$exception);
        }

        return (1);
    }


    /** Delete an element on the server
     * @param string $path Element Path
     * @param string $type Element type
     * @return int Result
     * @throws \Exception Generate Error
     */
    static public function delete(string $path, string $type):int
    {
        try
        {
            switch ($type)
            {
                case "directory":
                    if (is_link($path)) unlink($path);
                    else if (is_dir($path)) {
                        try {
                            self::recursiveRmdir($path);
                        } catch (\Exception $e) {
                            throw new \Exception("iumio Server Manager delete error =>" . $e->getMessage());
                        }
                    }
                    break;
                case "file":
                    if (is_link($path)) unlink($path);
                    else if (file($path)) {
                        try {
                            unlink($path);
                        } catch (\Exception $e) {
                            throw new \Exception("iumio Server Manager delete error =>" . $e->getMessage());
                        }
                    }
                    break;
            }

        }
        catch (\Exception $exception)
        {
            throw new \Exception("iumio Server Error : Cannot delete $type element => ".$exception);
        }

        return (1);
    }

    /** Recursive remove directory
     * @param string $dir dir path
     */
    static private function recursiveRmdir(string $dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir."/".$object) == "dir") self::recursiveRmdir($dir."/".$object); else unlink($dir."/".$object);
                }
            }
            reset($objects);
            rmdir($dir);
        }
    }

    /** Copy directory recursivly
     * @param string $src directory source
     * @param string $dst directory destination
     */
    static private function recursiveCopy(string $src, string $dst) {
        $dir = opendir($src);
        @mkdir($dst);
        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if ( is_dir($src . '/' . $file) ) {
                    static::recursiveCopy($src . '/' . $file,$dst . '/' . $file);
                }
                else {
                    copy($src . '/' . $file,$dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }

    /** Check if element is readable
     * @param string $path Element path
     * @return bool Is element is readable or not
     */
    static public function checkIsReadable(string $path):bool
    {
        return (is_readable($path));
    }


    /** Check if element is executable
 * @param string $path Element path
 * @return bool Is element is executable or not
 */
    static public function checkIsExecutable(string $path):bool
    {
        return (is_executable($path));
    }

    /** Check if element is writable
     * @param string $path Element path
     * @return bool Is element is writable or not
     */
    static public function checkIsWritable(string $path):bool
    {
        return (is_writable($path));
    }

}