<?php

namespace IumioFramework\Core\Additionnal\Server;

/**
 * Class IumioServer
 * @package IumioFramework\Core\Additionnal\Server
 */
class IumioServerManager
{
    /** Create an element on the server
     * @param string $path Element Path
     * @param string $type Element type
     * @return int
     * @throws \Exception
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

}