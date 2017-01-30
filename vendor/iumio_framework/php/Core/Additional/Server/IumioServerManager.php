<?php

namespace IumioFramework\Core\Additionnal\Server;

/**
 * Class IumioServer
 * @package IumioFramework\Core\Additionnal\Server
 * @author RAFINA Dany <danyrafina@gmail.com>
 */
class IumioServerManager
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
            throw new \Exception("Iumio Server Error : Cannot create $type element => ".$exception);
        }

        return (1);
    }

    /** Move an element on the server
     * @param string $path Element Path
     * @param string $to Move to
     * @return int Result
     * @throws \Exception Generate Error
     */
    static public function move(string $path, string $to):int
    {
        try
        {
            rename($path, $to);
        }
        catch (\Exception $exception)
        {
            throw new \Exception("Iumio Server Error : Cannot move $path to $to => ".$exception);
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
                    if (is_dir($path)) {
                        try {
                            self::recursiveRmdir($path);
                        } catch (\Exception $e) {
                            throw new \Exception("Iumio Server Manager delete error =>" . $e->getMessage());
                        }
                    }
                    break;
                case "file":
                    if (file($path)) {
                        try {
                            unlink($path);
                        } catch (\Exception $e) {
                            throw new \Exception("Iumio Server Manager delete error =>" . $e->getMessage());
                        }
                    }
                    break;
            }

        }
        catch (\Exception $exception)
        {
            throw new \Exception("Iumio Server Error : Cannot delete $type element => ".$exception);
        }

        return (1);
    }

    static private function recursiveRmdir($dir) {
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

}