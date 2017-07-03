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
        $this->clear($appname, $env);
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
                    Server::copy(ROOT . "/apps/" . ($appname) . "/Front/Resources/", ROOT . "/web/components/apps/dev/" . strtolower($appname), 'directory', true);
                else if (strtolower($env) == "prod")
                    Server::copy(ROOT . "/apps/" . ($appname) . "/Front/Resources/", ROOT . "/web/components/apps/prod/" . strtolower($appname), 'directory', false);
                else {
                    Server::copy(ROOT . "/apps/" . ($appname) . "/Front/Resources/", ROOT . "/web/components/apps/dev/" . strtolower($appname), 'directory', true);
                    Server::copy(ROOT . "/apps/" . ($appname) . "/Front/Resources/", ROOT . "/web/components/apps/prod/" . strtolower($appname), 'directory', false);
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

    /** Get all info for each app assets
     * @return int
     */
    public function assetsinfoAllActivity():int
    {
        /**
         * 0 : AppName
         * 1 : Have assets (1 ==> contains assets, 0 ==> not exist,  2 ==> Empty)
         * 3 : Perms on Dev
         * 4 : Perms on Prod
         * 5 : Status dev (0==> "Need to publish (redColor)", 1==> "OK (Green Color)")
         * 6 : Status prod (0==> "Need to publish (redColor)", 1==> "OK (Green Color)")
         * 7 : Action (Modal with url clear prod and dev , url publish prod and dev)
         */

        $appm = $this->getMaster("Apps");
        $apps = $appm->getAllApps();
        $diff = new Diff();
        $assetsapp = array();
        foreach ($apps as $app => $val) {

            $appname = $val->name;
            $app_assets = ROOT . "/apps/" . ($appname) . "/Front/Resources/";
            $app_webassets_dev = ROOT . "/web/components/apps/dev/" . strtolower($appname);
            $app_webassets_prod = ROOT . "/web/components/apps/prod/" . strtolower($appname);

            $hassets = 0;
            $prod_hassets = 0;
            $dev_hassets = 0;

            if (is_dir($app_assets)) $hassets++;
            if (is_dir($app_webassets_dev)) $dev_hassets++;
            if (is_dir($app_webassets_prod)) $prod_hassets++;
            if ($hassets == 1 && $this->dir_is_empty($app_assets)) $hassets = 2;


            $perm_dev = ($dev_hassets == 1)? substr(sprintf('%o', fileperms($app_webassets_dev)), -4) : 0000;
            $perm_prod = ($prod_hassets == 1)? substr(sprintf('%o', fileperms($app_webassets_prod)), -4) : 0000;

            $clear_dev = $this->generateRoute("iumio_manager_assets_manager_clear", array("appname" => $appname, "env" => "dev"), null, true);
            $publish_dev = $this->generateRoute("iumio_manager_assets_manager_publish", array("appname" => $appname, "env" => "dev"), null, true);;
            $clear_prod = $this->generateRoute("iumio_manager_assets_manager_clear", array("appname" => $appname, "env" => "prod"), null, true);;
            $publish_prod = $this->generateRoute("iumio_manager_assets_manager_publish", array("appname" => $appname, "env" => "prod"), null, true);

            $clear_all = $this->generateRoute("iumio_manager_assets_manager_clear", array("appname" => $appname, "env" => "all"), null, true);;
            $publish_all = $this->generateRoute("iumio_manager_assets_manager_publish", array("appname" => $appname, "env" => "all"), null, true);

            $status_dev = 1;
            $status_prod = 1;


            if ($hassets == 1) {
                $webapp = ($this->recursive_scandir($app_assets));

                foreach ($webapp as $key => $value)
                    $webapp[$key] = str_replace(ROOT . "/apps/" . ($appname) . "/Front/Resources/", "", $value);
            }

            //// DEV ///

            if ($dev_hassets == 1 && $hassets == 1) {
                $webdev = ($this->recursive_scandir($app_webassets_dev));

                foreach ($webdev as $key => $value)
                    $webdev[$key] = str_replace(ROOT . "/web/components/apps/dev/" . strtolower($appname), "", $value);

                if (count(array_diff($webapp, $webdev)) > 0)
                    $status_dev = 0;

                if ($dev_hassets == 1 && $status_dev == 1 && $hassets == 1) {
                    for ($i = 0; $i < count($webapp); $i++) {
                        if (!file_exists(ROOT . "/web/components/apps/dev/" . strtolower($appname) . "/" . $webdev[$i])) {
                            $status_dev = 0;
                            break;
                        }
                        $def = $diff::compareFiles(ROOT . "/web/components/apps/dev/" . strtolower($appname) . "/" . $webdev[$i], ROOT . "/apps/" . ($appname) . "/Front/Resources/" . $webapp[$i]);
                        for ($u = 0; $u < count($def); $u++) {
                            if ($def[$u][1] > 0) {
                                $status_dev = 0;
                                break;
                            }
                        }
                        if ($status_dev == 0) break;
                    }
                }
            }
            else
                $status_dev = 0;

            /// END ///


            //// PROD ///

            if ($prod_hassets == 1 &&  $hassets == 1) {
                $webprod = ($this->recursive_scandir($app_webassets_prod));

                foreach ($webprod as $key => $value)
                    $webprod[$key] = str_replace(ROOT . "/web/components/apps/prod/" . strtolower($appname), "", $value);

                if (count(array_diff($webapp, $webprod)) > 0)
                    $status_prod = 0;

                if ($prod_hassets == 1 && $status_prod == 1) {
                    for ($i = 0; $i < count($webapp); $i++) {
                        if (!file_exists(ROOT . "/web/components/apps/prod/" . strtolower($appname) . "/" . $webprod[$i])) {
                            $status_dev = 0;
                            break;
                        }
                        $def = $diff::compareFiles(ROOT . "/web/components/apps/prod/" . strtolower($appname) . "/" . $webprod[$i], ROOT . "/apps/" . ($appname) . "/Front/Resources/" . $webprod[$i]);
                        for ($u = 0; $u < count($def); $u++) {
                            if ($def[$u][1] > 0) {
                                $status_prod = 0;
                                break;
                            }
                        }
                        if ($status_prod == 0) break;
                    }
                }
            }
            else
                $status_prod = 0;

            /// END ///
            ///
            array_push($assetsapp,
                array("name" => $appname,
                    "haveassets" => $hassets,
                    "dev_perms" => $perm_dev,
                    "prod_perms" => $perm_prod,
                    "status_dev" => $status_dev,
                    "status_prod" => $status_prod,
                    "clear" => array("dev" => $clear_dev, "prod" => $clear_prod, "all" => $clear_all),
                    "publish" => array("dev" => $publish_dev, "prod" => $publish_prod, "all" => $publish_all)
                )
            );
        }

        return ((new Response())->JSON_RENDER(array("code" => 200, "msg" => "OK", "results" => $assetsapp)));

    }

    /** Scan directory and subdirectory
     * @param string $dir Path
     * @return array
     */
    public function recursive_scandir(string $dir)
    {
        $contents = array();

        foreach (scandir($dir) as $file)
        {
            if ($file == '.' || $file == '..') continue;

            $path = $dir.DIRECTORY_SEPARATOR.$file;

            if(is_dir($path))
                $contents = array_merge($contents, $this->recursive_scandir($path));
            else
                $contents[] = $path;
        }
        return ($contents);
    }

    /**
     * Check if a directory is empty (a directory with just '.svn' or '.git' is empty)
     *
     * @param string $dirname
     * @return bool
     */
    public function dir_is_empty($dirname)
    {
        if (!is_dir($dirname)) return false;
        foreach (scandir($dirname) as $file)
        {
            if (!in_array($file, array('.','..','.svn','.git'))) return false;
        }
        return true;
    }

}