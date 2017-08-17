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


namespace ManagerApp\Masters;
use iumioFramework\Core\Additionnal\Server\iumioServerManager;
use iumioFramework\Masters\MasterCore;
use iumioFramework\Core\Base\Json\JsonListener as JL;
use iumioFramework\Core\Base\Http\Response\Response;

/**
 * Class AppsMaster
 * @package iumioFramework\Core\Manager
 * @author RAFINA Dany <danyrafina@gmail.com>
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
        $file = JL::open(CONFIG_DIR."apps.json");
        foreach ($file as $one)
        {
            $one->link_edit_save = $this->generateRoute("iumio_manager_app_manager_edit_save_app", array("appname" => $one->name), null, true);

            $one->link_auto_dis_ena = $this->generateRoute("iumio_manager_app_manager_auto_dis_ena_app", array("appname" => $one->name), null, true);

            $one->link_remove = $this->generateRoute("iumio_manager_app_manager_remove_app", array("appname" => $one->name), null, true);
        }
        return ($file);
    }




    /**
     * Get all simple app
     */
    public function getSimpleAppsActivity()
    {
        return ((new Response())->JSON_RENDER(array("code" => 200, "msg" => "OK", "results" => $this->getAllApps())));
    }


    /** Switch app to default
     * @param string $appname App name
     * @return int
     */
    public function switchDefaultActivity(string $appname):int
    {
        $file = JL::open(CONFIG_DIR."apps.json");
        foreach ($file as $one => $val)
        {
            if ($val->isdefault == "yes")
            {
                $val->isdefault = "no";
                $val->update = new \DateTime('UTC');
            }
            if ($val->name == $appname)
            {
                $val->update = new \DateTime();
                $val->isdefault = "yes";
            }
        }

        $file = json_encode($file, JSON_PRETTY_PRINT);
        JL::put(CONFIG_DIR."apps.json", $file);
        return ((new Response())->JSON_RENDER(array("code" => 200, "msg" => "OK")));
    }

    /** auto change enabled or disabled app
     * @param string $appname App name
     * @return int
     */
    public function autoDisabledOrEnabledActivity(string $appname):int
    {
        $file = JL::open(CONFIG_DIR."apps.json");
        foreach ($file as $one => $val)
        {
            if ($val->name == $appname)
            {
                if ($val->enabled == "yes")
                    $val->enabled = "no";
                else if ($val->enabled == "no")
                    $val->enabled = "yes";
                $val->update = new \DateTime();
            }
        }

        $file = json_encode($file, JSON_PRETTY_PRINT);
        JL::put(CONFIG_DIR."apps.json", $file);
        return ((new Response())->JSON_RENDER(array("code" => 200, "msg" => "OK")));
    }

    /** remove one app
     * @param string $appname App name
     * @return int
     */
    public function removeActivity(string $appname):int
    {
        $removeapp = false;
        $file = JL::open(CONFIG_DIR."apps.json");
            foreach ($file as $one => $val)
            {
                if ($val->name == $appname)
                {
                    unset($file->$one);
                    $removeapp = true;
                    break;
                }
            }

        if ($removeapp == false)
            return ((new Response())->JSON_RENDER(array("code" => 500, "msg" => "App does not exist")));
        $file = array_values((array)$file);

        $file = json_encode((object) $file, JSON_PRETTY_PRINT);
        JL::put(CONFIG_DIR."apps.json", $file);

        iumioServerManager::delete(ROOT."/apps/$appname", "directory");
        $assets = $this->getMaster("Assets");
        $assets->clear($appname, "all");
        if (strlen($file) < 3)
        {
            JL::put(CONFIG_DIR."initial.json", "");
            return ((new Response())->JSON_RENDER(array("code" => 200, "msg" => "RELOAD")));
        }
        return ((new Response())->JSON_RENDER(array("code" => 200, "msg" => "OK")));
    }

    /** Create one app
     * @return int JSON render
     */
    public function createActivity():int
    {
        $name = $this->get("request")->get("name");
        $enable = $this->get("request")->get("enabled");
        $prefix = $this->get("request")->get("prefix");
        $template = $this->get("request")->get("template");

        if ($prefix != "" && $this->checkPrefix($prefix) == -1)
            return ((new Response())->JSON_RENDER(array("code" => 500, "msg" => "Error on app prefix. (App prefix must be a string without special character exepted [ _ & numbers])")));

        if (!in_array($enable, array("yes", "no")))
            return ((new Response())->JSON_RENDER(array("code" => 500, "msg" => "App name already exist")));

        if (trim($name) == "")
            return ((new Response())->JSON_RENDER(array("code" => 500, "msg" => "Error on app parameters")));

        if (file_exists(ROOT_APPS.$name))
            return ((new Response())->JSON_RENDER(array("code" => 500, "msg" => "App name already exist")));


        $temdirbase = ADDITIONALS."Manager/Module/AppManager/AppTemplate";

        $tempdir = ($template == "no")? $temdirbase.'/notemplate/{appname}/' : $temdirbase.'/template/{appname}/';
        iumioServerManager::copy($tempdir, ROOT_APPS.$name, 'directory');
        $napp = ROOT_APPS.$name;

        // APP
        $f = file_get_contents($napp."/{appname}.php.local");
        $str = str_replace("{appname}", $name, $f);
        file_put_contents($napp."/{appname}.php.local", $str);
        rename($napp."/{appname}.php.local", $napp."/".$name.".php");

        // RT
        $f = file_get_contents($napp."/Routing/default.rt");
        $str = str_replace("{appname}", $name, $f);
        file_put_contents($napp."/Routing/default.rt", $str);

        // MASTER
        $f = file_get_contents($napp."/Master/DefaultMaster.php.local");
        $str = str_replace("{appname}", $name, $f);
        file_put_contents($napp."/Master/DefaultMaster.php.local", $str);
        rename($napp."/Master/DefaultMaster.php.local", $napp."/Master/DefaultMaster.php");

        // REGISTER TO APP CORE
        $f = json_decode(file_get_contents(ROOT."/elements/config_files/apps.json"));
        $lastapp = 0;
        foreach ($f as $one => $val) $lastapp++;

        $f->$lastapp = new \stdClass();
        $f->$lastapp->name = $name;
        $f->$lastapp->enabled = $enable;
        $f->$lastapp->prefix = trim(stripslashes($prefix));
        $f->$lastapp->class = "\\".$name."\\".$name;
        $ndate = new \DateTime('UTC');
        $f->$lastapp->creation = $ndate;
        $f->$lastapp->update = $ndate;
        $f = json_encode($f, JSON_PRETTY_PRINT);
        file_put_contents(ROOT."/elements/config_files/apps.json", $f);
        if ($template == "yes")
        {
            $assets = $this->getMaster("Assets");
            $assets->publish($name, "dev");
        }

        return ((new Response())->JSON_RENDER(array("code" => 200, "msg" => "OK")));

    }

    /** Check prefix response
     * @param string $res response
     * @return int Is valid prefix response
     */
    final private function checkPrefix(string $res):int
    {
        if (!preg_match('/[\/\'^£$%&*()}{@#~?><>,|=+¬-]/', $res)) return (1);
        return (-1);
    }

    /** edit one app
     * @param string $appname App name
     * @return int JSON render
     */
    public function editActivity(string $appname):int
    {
        $prefix = $this->get("request")->get("prefix");
        $enable = $this->get("request")->get("enabled");

        if ($prefix != "" && $this->checkPrefix($prefix) == -1)
            return ((new Response())->JSON_RENDER(array("code" => 500, "msg" => "Error on app prefix. (App prefix must be a string without special character exepted [ _ & numbers])")));

        if (!in_array($enable, array("yes", "no")))
            return ((new Response())->JSON_RENDER(array("code" => 500, "msg" => "App name already exist")));

        $f = json_decode(file_get_contents(ROOT."/elements/config_files/apps.json"));

        foreach ($f as $one => $val)
            {
                if ($val->name == $appname) {
                    $val->prefix = trim(stripslashes($prefix));
                    $val->enabled = trim($enable);
                    $val->update = new \DateTime('UTC');
                    break;
                }
        }
        $f = json_encode($f, JSON_PRETTY_PRINT);
        file_put_contents(ROOT."/elements/config_files/apps.json", $f);

        return ((new Response())->JSON_RENDER(array("code" => 200, "msg" => "OK")));

    }
}