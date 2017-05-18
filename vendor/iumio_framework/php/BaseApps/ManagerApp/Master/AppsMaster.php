<?php

namespace ManagerApp\Master;
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
        return ($this->render("appmanager"));
    }

    /**
     * Going to base app manager
     */
    public function baseAppsActivity()
    {
        return ($this->render("baseappmanager"));
    }


    /**
     * Get all simple app
     */
    public function getSimpleAppsActivity()
    {
        $file = JL::open(CONFIG_DIR."apps.json");
        foreach ($file as $one)
            $one->link = $this->generateRoute("iumio_manager_app_manager_switch_default_app", array("appname" => $one->name), null, true);
        return ((new Response())->JSON_RENDER(array("code" => 200, "msg" => "OK", "result" => $file)));
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


    /**
     * Get All simple App
     */
    final private function getAllSimpleApp()
    {

    }

}