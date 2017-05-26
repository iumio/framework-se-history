<?php

namespace ManagerApp\Master;
use iumioFramework\Core\Additionnal\Server\iumioServerManager;
use iumioFramework\Masters\iumioUltimaMaster as Master;
use iumioFramework\Core\Base\Json\JsonListener as JL;
use iumioFramework\Core\Base\Http\Response\Response;

/**
 * Class AppsMaster
 * @package iumioFramework\Core\Manager
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class AppsMaster extends Master
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
     * Get all simple app
     */
    public function getSimpleAppsActivity()
    {
        $file = JL::open(CONFIG_DIR."apps.json");
        foreach ($file as $one)
        {
            $one->link = $this->generateRoute("iumio_manager_app_manager_switch_default_app", array("appname" => $one->name), null, true);
            $one->link_remove = $this->generateRoute("iumio_manager_app_manager_remove_app", array("appname" => $one->name), null, true);
        }
        return ((new Response())->JSON_RENDER(array("code" => 200, "msg" => "OK", "results" => $file)));
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

        $file = json_encode($file);
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
            return ((new Response())->JSON_RENDER(array("code" => 500, "msg" => "App doest not exist")));
        $file = array_values((array)$file);

        $file = json_encode((object) $file);
        JL::put(CONFIG_DIR."apps.json", $file);

        iumioServerManager::delete(ROOT."/apps/$appname", "directory");
        $assets = $this->getMaster("Assets");
        $assets->clear($appname);
        return ((new Response())->JSON_RENDER(array("code" => 200, "msg" => "OK")));
    }

    /** Create one app
     * @return int JSON render
     */
    public function createActivity():int
    {
        $name = $this->get("request")->get("name");
        $default = $this->get("request")->get("default");
        $template = $this->get("request")->get("template");

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
        if ($default == "yes")
        {
            foreach ($f as $one => $val)
            {
                if ($val->isdefault == "yes") {
                    $val->isdefault = "no";
                    break;
                }
            }
        }
        $f->$lastapp = new \stdClass();
        $f->$lastapp->name = $name;
        $f->$lastapp->isdefault = $default;
        $f->$lastapp->class = "\\".$name."\\".$name;
        $ndate = new \DateTime('UTC');
        $f->$lastapp->creation = $ndate;
        $f->$lastapp->update = $ndate;
        $f = json_encode($f);
        file_put_contents(ROOT."/elements/config_files/apps.json", $f);
        if ($template == "yes")
        {
            $assets = $this->getMaster("Assets");
            $assets->publish();
        }

        return ((new Response())->JSON_RENDER(array("code" => 200, "msg" => "OK")));

    }
}