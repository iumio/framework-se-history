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
        return ($this->render("assetsmanager", array("selected" => "assetsmanager")));
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
    public function publish()
    {
        $dirs = scandir(ROOT."/apps/");

        foreach ($dirs as $dir) {
            if ($dir == ".") continue;
            if ($dir == "..") continue;
            if (!is_dir(ROOT."/apps/".$dir)) continue;
            Server::copy(ROOT."/apps/".$dir."/Front/Resources/", ROOT."/web/components/apps/".strtolower($dir), 'directory', true);
        }
    }

    /** clear assets of all or one app
     * @param string $appname App name
     * @return int JSON response
     */
    public function clearActivity(string $appname):int
    {
        if ($appname == "_all")
            Server::delete(ROOT_WEB_ASSETS, 'directory');
        else
            Server::delete(ROOT_WEB_ASSETS.strtolower($appname), 'directory');
        return ((new Response())->JSON_RENDER(array("code" => 200, "msg" => "OK")));
    }

    /** clear assets of all or one app
     * @param string $appname App name
     * @return int JSON response
     */
    public function clear(string $appname):int
    {
        if ($appname == "_all")
        {
            Server::delete(ROOT_WEB_ASSETS, 'directory');
            Server::create(ROOT_WEB_ASSETS, 'directory');
        }
        else
            Server::delete(ROOT_WEB_ASSETS.strtolower($appname), 'directory');
        return (1);



    }

}