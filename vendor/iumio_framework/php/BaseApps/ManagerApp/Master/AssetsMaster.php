<?php

namespace ManagerApp\Master;
use iumioFramework\Masters\iumioUltimaMaster as Master;
use iumioFramework\Core\Base\Http\Response\Response;
use iumioFramework\Core\Additionnal\Server\iumioServerManager as Server;
use ManagerApp\Master\Libs\Diff;

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
     * @param string $appname App name
     * @param string $env Environment
     * @return int
     */
    public function publishActivity(string $appname, string $env):int
    {
        $this->publish($appname, $env);
        return ((new Response())->JSON_RENDER(array("code" => 200, "msg" => "OK")));
    }


    /** Call Server publish assets
     * @param string $appname App name
     * @param string $env Environment
     */
    public function publish(string $appname, string $env)
    {
        if ($appname == "_all") {
            $dirs = scandir(ROOT."/apps/");
            foreach ($dirs as $dir) {
                if ($dir == ".") continue;
                if ($dir == "..") continue;
                if (!is_dir(ROOT . "/apps/" . $dir)) continue;
                if (in_array(strtolower($env), array("dev", "prod", "all"))) {
                    if (strtolower($env) === "dev")
                        Server::copy(ROOT . "/apps/" . $dir . "/Front/Resources/", ROOT . "/web/components/apps/dev/" . strtolower($dir), 'directory', true);
                    else if (strtolower($env) == "prod")
                        Server::copy(ROOT . "/apps/" . $dir . "/Front/Resources/", ROOT . "/web/components/apps/prod/" . strtolower($dir), 'directory', false);
                    else {
                        Server::copy(ROOT . "/apps/" . $dir . "/Front/Resources/", ROOT . "/web/components/apps/dev/" . strtolower($dir), 'directory', true);
                        Server::copy(ROOT . "/apps/" . $dir . "/Front/Resources/", ROOT . "/web/components/apps/prod/" . strtolower($dir), 'directory', false);
                    }

                }
            }
        }
        else if ($appname !== "")
        {
            if (in_array(strtolower($env), array("dev", "prod", "all"))) {
                if (strtolower($env) === "dev")
                    Server::copy(ROOT . "/apps/" . ($appname) . "/Front/Resources/", ROOT . "/web/components/apps/dev/" . ($appname), 'directory', true);
                else if (strtolower($env) == "prod")
                    Server::copy(ROOT . "/apps/" . ($appname) . "/Front/Resources/", ROOT . "/web/components/apps/prod/" . ($appname), 'directory', false);
                else {
                    Server::copy(ROOT . "/apps/" . ($appname) . "/Front/Resources/", ROOT . "/web/components/apps/dev/" . ($appname), 'directory', true);
                    Server::copy(ROOT . "/apps/" . ($appname) . "/Front/Resources/", ROOT . "/web/components/apps/prod/" . ($appname), 'directory', false);
                }

            }
        }
    }

    /** clear assets of all or one app
     * @param string $appname App name
     * @param string $env Environment
     * @return int JSON response
     */
    public function clearActivity(string $appname, string $env):int
    {
        $this->clear($appname, $env);
        return ((new Response())->JSON_RENDER(array("code" => 200, "msg" => "OK")));
    }

    /** clear assets of all or one app
     * @param string $appname App name
     * @param string $env Environment
     * @return int JSON response
     */
    public function clear(string $appname, string $env):int
    {
        if ($appname == "_all" && in_array(strtolower($env), array("dev", "prod", "all")))
        {
            if (in_array(strtolower($env), array("dev", "prod")))
            {
                Server::delete(ROOT_WEB_ASSETS.strtolower($env), 'directory');
                Server::create(ROOT_WEB_ASSETS.strtolower($env), 'directory');
            }
            else
            {
                Server::delete(ROOT_WEB_ASSETS.("dev"), 'directory');
                Server::create(ROOT_WEB_ASSETS.("dev"), 'directory');

                Server::delete(ROOT_WEB_ASSETS.("prod"), 'directory');
                Server::create(ROOT_WEB_ASSETS.("prod"), 'directory');
            }

        }
        if ($appname != "" && in_array(strtolower($env), array("dev", "prod", "all")))
        {
            if (in_array(strtolower($env), array("dev", "prod")))
                Server::delete(ROOT_WEB_ASSETS.strtolower($env)."/".strtolower($appname), 'directory');
            else
            {
                Server::delete(ROOT_WEB_ASSETS.("dev")."/".strtolower($appname), 'directory');
                Server::delete(ROOT_WEB_ASSETS.strtolower("prod")."/".strtolower($appname), 'directory');
            }

        }
        return (1);

    }

    public function assetsinfoAllActivity()
    {
        $diff = new Diff();
        $cout = 0;
        print_r($diff::compareFiles(ROOT . "/apps/" . "TellMeApp" . "/Front/Resources/" ."/public/css/index.css", ROOT . "/web/components/apps/dev/" . strtolower("tellmeapp")."/public/css/index.css"));

        //$dirs = scandir(ROOT."/apps/TellMeApp/Resources/public/css/");
        exit();
        foreach ($dirs as $dir) {
            if ($dir == ".") continue;
            if ($dir == "..") continue;
            print_r($diff::compareFiles(ROOT . "/apps/" . $dir . "/Front/Resources/" . strtolower($dir)."/public/css/index.css"));
            if (!is_dir(ROOT . "/apps/" . $dir)) continue;
            if (in_array(strtolower($env), array("dev", "prod", "all"))) {
                if (strtolower($env) === "dev")
                    Server::copy(ROOT . "/apps/" . $dir . "/Front/Resources/", ROOT . "/web/components/apps/dev/" . strtolower($dir), 'directory', true);
                else if (strtolower($env) == "prod")
                    Server::copy(ROOT . "/apps/" . $dir . "/Front/Resources/", ROOT . "/web/components/apps/prod/" . strtolower($dir), 'directory', false);
                else {
                    Server::copy(ROOT . "/apps/" . $dir . "/Front/Resources/", ROOT . "/web/components/apps/dev/" . strtolower($dir), 'directory', true);
                    Server::copy(ROOT . "/apps/" . $dir . "/Front/Resources/", ROOT . "/web/components/apps/prod/" . strtolower($dir), 'directory', false);
                }

            }
        }

    }

}