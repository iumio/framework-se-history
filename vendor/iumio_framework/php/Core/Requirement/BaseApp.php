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

namespace iumioFramework\Core\Requirement;
use iumioFramework\Core\Additionnal\Server\iumioServerManager as ServerManager;

/**
 *
 * Class BaseApp
 * @package iumioFramework\Core\Requirement
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class BaseApp extends iumioApp
{
    /** Save an App
     */
    public function save()
    {
        $appname = $this->name;
        $temp = "no";
        $temdirbase = ROOT."vendor/iumio_framework/php/Core/Additional/Manager/Module/AppManager/AppTemplate";
        $tempdir = ($temp == "no")? $temdirbase.'/notemplate/{appname}/' : $temdirbase.'/template/{appname}/';
        ServerManager::copy($tempdir, ROOT."/apps/".$appname, 'directory');
        $napp = ROOT."/apps/".$appname;

        // APP
        $f = file_get_contents($napp."/{appname}.php.local");
        $str = str_replace("{appname}", $appname, $f);
        file_put_contents($napp."/{appname}.php.local", $str);
        rename($napp."/{appname}.php.local", $napp."/$appname.php");

        // RT
        $f = file_get_contents($napp."/Routing/default.rt");
        $str = str_replace("{appname}", $appname, $f);
        file_put_contents($napp."/Routing/default.rt", $str);

        // MASTER
        $f = file_get_contents($napp."/Master/DefaultMaster.php.local");
        $str = str_replace("{appname}", $appname, $f);
        file_put_contents($napp."/Master/DefaultMaster.php.local", $str);
        rename($napp."/Master/DefaultMaster.php.local", $napp."/Master/DefaultMaster.php");

        // REGISTER TO APP CORE
        $f = json_decode(file_get_contents(ROOT."/elements/config_files/apps.json"));
        $lastapp = 0;
        foreach ($f as $one => $val) $lastapp++;
        if ($this->params['isdefault'] == "yes")
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
        $f->$lastapp->name = $this->params['appname'];
        $f->$lastapp->isdefault = $this->params['isdefault'];
        $f->$lastapp->class = "\\".$this->params['appname']."\\".$this->params['appname'];
        $f = json_encode($f, JSON_PRETTY_PRINT);
        file_put_contents(ROOT."/elements/config_files/apps.json", $f);
        if ($this->params['template'] == "yes")
            new AM(array("core/manager", "assets-manager", "--copy", "--appname=". $this->params['appname'], "--symlink", "--noexit"));
        Output::outputAsSuccess("\n Your app is ready to use. To test your app go to project location on your browser with parameter /hello. Enjoy ! \n", "none");

    }

    /** Delete an app
     */
    public function remove()
    {
        $f = json_decode(file_get_contents(ROOT."/elements/config_files/apps.json"));
        foreach ($f as $one => $val)
        {
            if ($val->name == $this->name)
            {
                unset($f->$one);
                break;
            }
        }

        $f = json_encode($f, JSON_PRETTY_PRINT);
        file_put_contents(ROOT."/elements/config_files/apps.json", $f);

        ServerManager::delete(ROOT."/apps/".$this->name, "directory");
        ServerManager::delete(ROOT."/web/components/apps/".strtolower($this->name), 'directory');
    }


}