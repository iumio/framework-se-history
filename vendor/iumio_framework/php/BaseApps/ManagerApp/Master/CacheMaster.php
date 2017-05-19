<?php

namespace ManagerApp\Master;
use iumioFramework\Masters\iumioUltimaMaster as Master;
use iumioFramework\Core\Base\Http\Response\Response;
use iumioFramework\Core\Additionnal\Server\iumioServerManager as Server;

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



}