<?php

/*
 * This is an iumio Framework component
 *
 * (c) RAFINA DANY <dany.rafina@iumio.com>
 *
 * iumio Framework - iumio Components
 *
 * To get more information about licence, please check the licence file
 */


namespace ManagerApp\Masters;

use iumioFramework\Base\Renderer\Renderer;
use iumioFramework\Core\Additionnal\Server\ServerManager;
use iumioFramework\Core\Additionnal\Zip\ZipEngine;
use iumioFramework\Exception\Server\Server500;
use iumioFramework\Masters\MasterCore;
use iumioFramework\Core\Base\Json\JsonListener as JL;

/**
 * Class AppsMaster
 * @package iumioFramework\Core\Manager
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */

class AppsMaster extends MasterCore
{

    /**
     * Going to app manager
     */
    public function appsActivity()
    {
        return ($this->render("appmanager", array("selected" => "appmanager")));
    }

    /**
     * Going to base app manager
     */
    public function baseAppsActivity()
    {
        return ($this->render("baseappmanager", array("selected" => "baseappmanager")));
    }


    /**
     * Get all apps
     * @return \stdClass $file Apps
     */
    public function getAllApps():\stdClass
    {
        $file = JL::open(CONFIG_DIR."core/apps.json");
        foreach ($file as $one) {
            $one->link_edit_save = $this->generateRoute(
                "iumio_manager_app_manager_edit_save_app",
                array("appname" => $one->name),
                null,
                true
            );

            $one->link_auto_dis_ena = $this->generateRoute(
                "iumio_manager_app_manager_auto_dis_ena_app",
                array("appname" => $one->name),
                null,
                true
            );

            $one->link_remove = $this->generateRoute(
                "iumio_manager_app_manager_remove_app",
                array("appname" => $one->name),
                null,
                true
            );

            $one->link_export = $this->generateRoute(
                "iumio_manager_app_manager_export_app",
                array("appname" => $one->name),
                null,
                true
            );
        }
        return ($file);
    }

    /** Get app statistics
     * @return array App statistics
     */
    public function getStatisticsApp():array
    {

        $f = $this->getAllApps();
        $fc = 0;
        $fenable = 0;
        $fprefix = 0;

        foreach ($f as $one) {
            if ($one->enabled == "yes") {
                $fenable++;
            }
            if ($one->prefix != "") {
                $fprefix++;
            }
            $fc++;
        }

        return (array("number" => $fc, "prefixed" => $fprefix, "enabled" => $fenable));
    }

    /**
     * Get all simple app
     */
    public function getSimpleAppsActivity():Renderer
    {
        return ((new Renderer())->jsonRenderer(array("code" => 200, "msg" => "OK", "results" => $this->getAllApps())));
    }


    /** Switch app to default
     * @param string $appname App name
     * @return Renderer
     * @throws Server500
     */
    public function switchDefaultActivity(string $appname):Renderer
    {
        $file = JL::open(CONFIG_DIR."core/apps.json");
        foreach ($file as $one => $val) {
            if ($val->isdefault == "yes") {
                $val->isdefault = "no";
                $val->update = new \DateTime('UTC');
            }
            if ($val->name == $appname) {
                $val->update = new \DateTime();
                $val->isdefault = "yes";
            }
        }

        $file = json_encode($file, JSON_PRETTY_PRINT);
        JL::put(CONFIG_DIR."core/apps.json", $file);
        return ((new Renderer())->jsonRenderer(array("code" => 200, "msg" => "OK")));
    }

    /** auto change enabled or disabled app
     * @param string $appname App name
     * @return int
     */
    public function autoDisabledOrEnabledActivity(string $appname):Renderer
    {
        $file = JL::open(CONFIG_DIR."core/apps.json");
        foreach ($file as $one => $val) {
            if ($val->name == $appname) {
                if ($val->enabled == "yes") {
                    $val->enabled = "no";
                } elseif ($val->enabled == "no") {
                    $val->enabled = "yes";
                }
                $val->update = new \DateTime();
            }
        }

        $file = json_encode($file, JSON_PRETTY_PRINT);
        JL::put(CONFIG_DIR."core/apps.json", $file);
        return ((new Renderer())->jsonRenderer(array("code" => 200, "msg" => "OK")));
    }

    /** remove one app
     * @param string $appname App name
     * @return int
     */
    public function removeActivity(string $appname):Renderer
    {
        $removeapp = false;
        $file = JL::open(CONFIG_DIR."core/apps.json");
        foreach ($file as $one => $val) {
            if ($val->name == $appname) {
                unset($file->$one);
                $removeapp = true;
                break;
            }
        }

        if ($removeapp == false) {
            return ((new Renderer())->jsonRenderer(array("code" => 500, "msg" => "App does not exist")));
        }
        $file = array_values((array)$file);

        $file = json_encode((object) $file, JSON_PRETTY_PRINT);
        JL::put(CONFIG_DIR."core/apps.json", $file);

        ServerManager::delete(ROOT."/apps/$appname", "directory");
        $assets = $this->getMaster("Assets");
        $assets->clear($appname, "all");
        if (strlen($file) < 3) {
            JL::put(CONFIG_DIR."core/framework.config.json", "");
            return ((new Renderer())->jsonRenderer(array("code" => 200, "msg" => "RELOAD")));
        }
        return ((new Renderer())->jsonRenderer(array("code" => 200, "msg" => "OK")));
    }


    /**
     * export one app
     * @param string $appname App name
     * @return int
     * @throws Server500
     */
    public function exportActivity(string $appname):Renderer
    {
        $appconfig = null;
        $file = JL::open(CONFIG_DIR."core/apps.json");
        foreach ($file as $one => $val) {
            if ($val->name == $appname) {
                $appconfig = $val;
                break;
            }
        }
        if ($appconfig == null) {
            throw new Server500(new \ArrayObject(array("The application $appname does not exist.",
                "Please check your app configuration")));
        }
        unset($appconfig->enabled);

        try {
            $date = new \DateTime();
            $datefull = $date;
            $date = $date->format('YmdHi');
            $dirbase = BIN.'exports/';
            $dirapp = $dirbase.($appname).'/';
            $dirappexp  = $dirapp.($appname)."_".$date.'/';
            ServerManager::create($dirbase, 'directory');
            ServerManager::create($dirapp, 'directory');
            ServerManager::create($dirappexp, 'directory');
            JL::put($dirappexp."config.json", json_encode(
                $appconfig,
                JSON_PRETTY_PRINT
            ));
            $zip = new ZipEngine($dirapp.($appname)."_".$date.".zip");
            $zip->setSource(ROOT_APPS.$appname);
            $zip->addFile($dirappexp."config.json", "config.json");
            $zip->setArchiveComment("$appname - Export date :".$datefull->format('g:ia \o\n l jS F Y'));
            $zip->recursiveCompress();
            if ($zip->close()) {
                ServerManager::delete($dirappexp, 'directory');
                return ((new Renderer())->jsonRenderer(array("code" => 200, "msg" => "OK")));
            } else {
                return ((new Renderer())->jsonRenderer(array("code" => 500,
                    "msg" => "Error on archive creation process")));
            }
        } catch (\Exception $e) {
            return ((new Renderer())->jsonRenderer(array("code" => 500,
                "msg" => "Error on archive creation process : ".$e->getMessage())));
        }
    }


    /**
     * import one app
     * @return int
     * @throws Server500
     * @throws \Exception
     */
    public function importActivity():Renderer
    {
        $sourcePath = $_FILES['file']['tmp_name'];       // Storing source path of the file in a variable
        $date = new \DateTime();
        $datex = $date->format('ymdhis').rand(0, 34);
        @ServerManager::create(BIN.'import/', 'directory');
        $fileex = BIN.'import/'.$datex.'.zip';
        move_uploaded_file($sourcePath, BIN.'import/'.$datex.'.zip');
        $inf = pathinfo($fileex);
        if (isset($inf['extension']) && $inf['extension'] == "zip") {
            try {
                $zip = new ZipEngine($fileex);
                $zip->extractTo(BIN.'import/'.$datex);
                $f =  JL::open(BIN.'import/'.$datex.'/config.json');
                if (empty($f)) {
                    return ((new Renderer())->jsonRenderer(array("code" => 500, "msg" => "Missing file config.json")));
                }
                $appname = $f->name;

                $fa = json_decode(file_get_contents(ROOT."/elements/config_files/core/apps.json"));
                $lastapp = 0;
                foreach ($fa as $one => $val) {
                    if ($val->name == $appname) {
                        return ((new Renderer())->jsonRenderer(array("code" => 500, "msg" => "App already exist")));
                    }
                    $lastapp++;
                }

                $fa->$lastapp = new \stdClass();
                $fa->$lastapp->name = $appname;
                $fa->$lastapp->enabled = "no";
                $fa->$lastapp->prefix = trim(stripslashes($f->prefix));
                $fa->$lastapp->class = $f->class;
                $ndate = new \DateTime('UTC');
                $fa->$lastapp->creation = $ndate;
                $fa->$lastapp->update = $ndate;
                $fa = json_encode($fa, JSON_PRETTY_PRINT);
                file_put_contents(ROOT."/elements/config_files/core/apps.json", $fa);

                ServerManager::create(ROOT_APPS.$appname, 'directory');
                ServerManager::copy(BIN.'import/'.$datex, ROOT_APPS.$appname, 'directory');
                echo "OFF";
                ServerManager::delete(ROOT_APPS.$appname.'/config.json', 'file');
                ServerManager::delete(BIN.'import/'.$datex, 'directory');
                $zip->close();
                ServerManager::delete(BIN.'import/'.$datex.'.zip', 'file');

                return ((new Renderer())->jsonRenderer(array("code" => 200, "msg" => "OK", "ext" =>
                    "The application ".$appname. " is installed.")));
            } catch (\Exception $e) {
                return ((new Renderer())->jsonRenderer(array("code" => 500, "msg" =>
                    "Your package is not a valid iumio app package")));
            }
        } else {
            return ((new Renderer())->jsonRenderer(array("code" => 500, "msg" => "Your package must be a zip package")));
        }
        return ((new Renderer())->jsonRenderer(array("code" => 200, "msg" => "OK")));
    }

    /** Create one app
     * @return Renderer JSON render
     */
    public function createActivity():Renderer
    {
        $name = $this->get("request")->get("name");
        $enable = $this->get("request")->get("enabled");
        $prefix = $this->get("request")->get("prefix");
        $template = $this->get("request")->get("template");

        if ($prefix != "" && $this->checkPrefix($prefix) == -1) {
            return ((new Renderer())->jsonRenderer(array("code" => 500, "msg" =>
                "Error on app prefix. (App prefix must be a string without special character exepted [ _ & numbers])"))
            );
        }

        if (!in_array($enable, array("yes", "no"))) {
            return ((new Renderer())->jsonRenderer(array("code" => 500, "msg" => "App name already exist")));
        }

        if (trim($name) == "") {
            return ((new Renderer())->jsonRenderer(array("code" => 500, "msg" => "Error on app parameters")));
        }

        if (file_exists(ROOT_APPS.$name)) {
            return ((new Renderer())->jsonRenderer(array("code" => 500, "msg" => "App name already exist")));
        }


        $temdirbase = ADDITIONALS."Manager/Module/AppManager/AppTemplate";

        $tempdir = ($template == "no")? $temdirbase.'/notemplate/{appname}/' : $temdirbase.'/template/{appname}/';
        ServerManager::copy($tempdir, ROOT_APPS.$name, 'directory');
        $napp = ROOT_APPS.$name;

        // APP
        $f = file_get_contents($napp."/{appname}.php.local");
        $str = str_replace("{appname}", $name, $f);
        file_put_contents($napp."/{appname}.php.local", $str);
        rename($napp."/{appname}.php.local", $napp."/".$name.".php");

        // RT
        $f = file_get_contents($napp."/Routing/default.irt");
        $str = str_replace("{appname}", $name, $f);
        file_put_contents($napp."/Routing/default.irt", $str);

        // MASTER
        $f = file_get_contents($napp."/Master/DefaultMaster.php.local");
        $str = str_replace("{appname}", $name, $f);
        file_put_contents($napp."/Master/DefaultMaster.php.local", $str);
        rename($napp."/Master/DefaultMaster.php.local", $napp."/Master/DefaultMaster.php");

        // REGISTER TO APP CORE
        $f = json_decode(file_get_contents(ROOT."/elements/config_files/core/apps.json"));
        $lastapp = 0;
        foreach ($f as $one => $val) {
            $lastapp++;
        }

        $f->$lastapp = new \stdClass();
        $f->$lastapp->name = $name;
        $f->$lastapp->enabled = $enable;
        $f->$lastapp->prefix = trim(stripslashes($prefix));
        $f->$lastapp->class = "\\".$name."\\".$name;
        $ndate = new \DateTime('UTC');
        $f->$lastapp->creation = $ndate;
        $f->$lastapp->update = $ndate;
        $f = json_encode($f, JSON_PRETTY_PRINT);
        file_put_contents(ROOT."/elements/config_files/core/apps.json", $f);
        if ($template == "yes") {
            $assets = $this->getMaster("Assets");
            $assets->publish($name, "dev");
        }

        return ((new Renderer())->jsonRenderer(array("code" => 200, "msg" => "OK")));
    }

    /** Check prefix response
     * @param string $res response
     * @return int Is valid prefix response
     */
    final private function checkPrefix(string $res):int
    {
        if (!preg_match('/[\/\'^£$%&*()}{@#~?><>,|=+¬-]/', $res)) {
            return (1);
        }
        return (-1);
    }

    /** edit one app
     * @param string $appname App name
     * @return int JSON render
     */
    public function editActivity(string $appname):Renderer
    {
        $prefix = $this->get("request")->get("prefix");
        $enable = $this->get("request")->get("enabled");

        if ($prefix != "" && $this->checkPrefix($prefix) == -1) {
            return ((new Renderer())->jsonRenderer(array("code" => 500, "msg" =>
                "Error on app prefix. (App prefix must be a string without special character exepted [ _ & numbers])"))
            );
        }

        if (!in_array($enable, array("yes", "no"))) {
            return ((new Renderer())->jsonRenderer(array("code" => 500, "msg" => "App name already exist")));
        }

        $f = json_decode(file_get_contents(ROOT."/elements/config_files/core/apps.json"));

        foreach ($f as $one => $val) {
            if ($val->name == $appname) {
                $val->prefix = trim(stripslashes($prefix));
                $val->enabled = trim($enable);
                $val->update = new \DateTime('UTC');
                break;
            }
        }
        $f = json_encode($f, JSON_PRETTY_PRINT);
        file_put_contents(ROOT."/elements/config_files/core/apps.json", $f);

        return ((new Renderer())->jsonRenderer(array("code" => 200, "msg" => "OK")));
    }
}
