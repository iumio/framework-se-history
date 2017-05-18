<?php

namespace ManagerApp\Master;
use iumioFramework\Masters\iumioUltimaMaster as Master;
use iumioFramework\Core\Base\Http\Response\Response;
use iumioFramework\Core\Additionnal\Server\iumioServerManager as Server;

/**
 * Class AssetsMaster
 * @package iumioFramework\Core\Manager
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class AssetsMaster extends Master
{
    /**
     * Going to assets manager
     */
    public function assetsActivity()
    {
        return ($this->render("assetsmanager"));
    }

    /** Publish assets
     * @return int
     */
    public function publishActivity():int
    {
        $this->publish();
        return ((new Response())->JSON_RENDER(array("code" => 200, "msg" => "OK")));
    }


    /** Call Server publish assets
     */
    private function publish()
    {
        $dirs = scandir(ROOT."/apps/");

        foreach ($dirs as $dir) {
            if ($dir == ".") continue;
            if ($dir == "..") continue;
            if (!is_dir(ROOT."/apps/".$dir)) continue;
            Server::copy(ROOT."/apps/".$dir."/Front/Resources/", ROOT."/web/components/apps/".strtolower($dir), 'directory', true);
        }
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