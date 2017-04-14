<?php

namespace iumioFramework\Manager\Console\Module\App;
use iumioFramework\Core\Additionnal\Server\iumioServerManager as Server;
use iumioFramework\Core\Additionnal\Server\iumioServerManager;
use iumioFramework\Manager\Console\Module\iumioManagerModule as ModuleInterface;
use iumioFramework\Manager\Console\Module\App\AppManagerOutput as Output;
use iumioFramework\Manager\Console\Module\Assets\AssetsManager as AM;

/**
 * Class AppManager
 * @package iumioFramework\Manager\Console\Module\App
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class AppManager implements ModuleInterface
{
    protected $options;
    protected $stage = array(
        "App name (like DefaultApp --> end with App): ",
        "iumio purpose you a default template with your app. Would you like to have one ? (yes/no): ",
        "\nYeah! Would you like to set this app as default ? (yes/no)",
        "This informations are correct ?",
        "Delete your app means all file and directory in your app directory will be deleted. Are you sure to confirm this action ?",
        "Ok. I process to deleting your app",
        "Delete action is aborted ",
        "This is app list which registered to app declarator. To select one, please enter the app number"
    );
    protected $params = array("appname" => "", "template" => "", "isdefault" => "", "correct" => "", "applist" => array(), "capp" => "");

    public function __render()
    {
        if (empty($this->options))
            Output::outputAsError("App Manager Error \n \t You must to have an option. Referer to help comannd.");
        else
        {
            $opt = $this->options[2] ?? null;
            if ($opt == "new-project")
                $this->stepNewProject();
            elseif ($opt == "remove-project")
                $this->stepRemoveProject($this->options);
            elseif ($opt == "switch-project")
                $this->stepSwitchProject($this->options);
            else
                Output::outputAsError("App Manager Error \n \t This command doesn't exist. Referer to help comannd\n");
        }
    }

    /** Check app name format
     * @param string $appname App name
     * @return int Is valid app name
     */
    final protected function checkAppName(string $appname):int
    {
        if ($appname == "App") return (-1);
        if (strpos($appname, "App") == false) return (-1);
        return (1);
    }

    /** Check boolean response
     * @param string $res response
     * @return int Is valid boolean response
     */
    final protected function checkBooleanResponse(string $res):int
    {
        if ($res == "yes" || $res == "no") return (1);
        return (-1);
    }

    /** Check if app name exist
     * @param string $appname App name
     * @return bool If app exist
     */
    final protected function checkAppExist(string $appname):bool
    {
        if (file_exists(ROOT_PROJECT."/apps/".$appname)) return (true);
        return (false);
    }

    /** Listen the STDIN
     * @return string STDIN value
     */
    final protected function listener():string
    {
        while ($resp = rtrim(fgets(STDIN))) return $resp;
        return ('');
    }


    /**
     *
     */
    final protected function stepNewProject()
    {
        Output::outputAsSuccess("Welcome on iumio app manager. I'm assist you to create your new app. Many question will ask you so are you ready ?\n\n", "none");
        Output::outputAsSuccess($this->stage[0], "none");

        $this->params['appname'] = ucfirst($this->listener());

        $e = false;
        while ($e == false)
        {
            if ($this->checkAppName($this->params['appname']) != 1)
                Output::outputAsError("Your app name is invalid. Please Retry.\n", "none");
            else if ($this->checkAppExist($this->params['appname']) == true)
            {
                $e = false;
                Output::outputAsError("This app name is already exist, Please enter an other app name.\n", "none");
            }
            else
            {
                $e = true;
                continue;
            }

            Output::outputAsSuccess($this->stage[0], "none");
            $this->params['appname'] = ucfirst($this->listener());
        }
        Output::outputAsSuccess("Great! Your app name is ".$this->params['appname']."\n", "none");
        Output::outputAsSuccess($this->stage[1], "none");
        $this->params['template'] = $this->listener();
        while ($this->checkBooleanResponse($this->params['template']) != 1)
        {
            Output::outputAsError("Invalid response. Please Retry (yes/no).\n", "none");
            Output::outputAsSuccess($this->stage[1], "none");
            $this->params['template'] = $this->listener();
        }
        Output::outputAsSuccess($this->stage[2], "none");
        $this->params['isdefault'] = $this->listener();
        while ($this->checkBooleanResponse($this->params['isdefault']) != 1)
        {
            Output::outputAsError("Invalid response. Please Retry (yes/no).\n", "none");
            Output::outputAsSuccess($this->stage[2], "none");
            $this->params['isdefault'] = $this->listener();
        }

        $this->showRecap();
        Output::outputAsSuccess($this->stage[3], "none");
        $this->params['correct'] = $this->listener();
        while ($this->checkBooleanResponse($this->params['correct']) != 1)
        {
            Output::outputAsError("Invalid response. Please Retry (yes/no).\n", "none");
            Output::outputAsSuccess($this->stage[3], "none");
            $this->params['correct'] = $this->listener();
        }
        if ($this->params['correct'] == "no")
            Output::outputAsError("Creation Aborted. Please re-run app-manager and enter the correct informations.\n");
        $this->createAppProcess();
    }

    /**
     *
     */
    final protected function stepRemoveProject()
    {
        Output::outputAsSuccess("Welcome on iumio app manager. I'm assist you to remove your app. Many question will ask you so are you ready ?\n\n", "none");
        Output::outputAsSuccess($this->stage[0], "none");

        $this->params['appname'] = ucfirst($this->listener());

        $e = false;
        while ($e == false)
        {
            if ($this->checkAppName($this->params['appname']) != 1)
                Output::outputAsError("Your app name is invalid. Please Retry.\n", "none");
            else if ($this->checkAppExist($this->params['appname']) == false && $this->checkAppRegister($this->params['appname']) == false)
            {
                $e = false;
                Output::outputAsError("This app is not exist, Please enter an existed app name .\n", "none");
            }
            else
            {
                $e = true;
                continue;
            }

            Output::outputAsSuccess($this->stage[0], "none");
            $this->params['appname'] = ucfirst($this->listener());
        }

        if ($this->checkAppExist($this->params['appname']) == true && $this->checkAppRegister($this->params['appname']) == false)
            Output::outputAsSuccess("Ok ! Your app is ".$this->params['appname'].". It exist on apps directory but it's not declared in app declarator\n", "none");
        else if ($this->checkAppExist($this->params['appname']) == false && $this->checkAppRegister($this->params['appname']) == true)
            Output::outputAsSuccess("Ok ! Your app is ".$this->params['appname'].". It's declared in app declarator but not exist in apps directory\n", "none");
        else
            Output::outputAsSuccess("Ok ! Your app is ".$this->params['appname'].". It's declared in app declarator and exist in apps directory\n", "none");
        Output::outputAsNotice($this->stage[4], "none");
        $conf = $this->listener();
        while ($this->checkBooleanResponse($conf) != 1)
        {
            Output::outputAsError("Invalid response. Please Retry (yes/no).\n", "none");
            Output::outputAsSuccess($this->stage[4], "none");
            $conf = $this->listener();
        }
        if ($conf == "no") Output::outputAsError($this->stage[6]."\n");
        $this->removeAppProcess();
    }

    /**
     *
     */
    final protected function stepSwitchProject()
    {
        Output::outputAsSuccess("Welcome on iumio app manager. I'm assist you to change your default app. Many question will ask you so are you ready ?\n\n", "none");
        Output::outputAsSuccess($this->stage[7]."\n", "none");
        $this->showAppsRegister();
        Output::outputAsSuccess("Which number ? : ", "none");
        $this->params['capp'] = $this->listener();

        while (!isset($this->params['applist'][$this->params['capp'] - 1]))
        {
            Output::outputAsError("Your choose is incorrect. Please Retry.\n", "none");
            Output::outputAsSuccess($this->stage[7]."\n", "none");
            $this->showAppsRegister();
            Output::outputAsSuccess("Which number ? : ", "none");
            $this->params['capp'] = $this->listener();
        }
        $this->params['capp'] = $this->params['applist'][$this->params['capp'] - 1];

        Output::outputAsSuccess("Ok ! You choose ".$this->params['capp']." to be default app.\n", "none");
        $this->switchAppProcess();
    }

    /**
     * Show recap
     */
    final protected function showRecap()
    {
        Output::outputAsSuccess("\n This is a recap of your app : \n", "none");
        Output::outputAsSuccess("\t - App name: ".$this->params['appname']." \n", "none");
        Output::outputAsSuccess("\t - Use default template : ".$this->params['template']." \n", "none");
        Output::outputAsSuccess("\t - As default app : ".$this->params['isdefault']." \n", "none");
    }

    /** Check if app is registered to apps.json
     * @param string $appname App name
     * @return bool If exist or not
     */
    final protected function checkAppRegister(string $appname):bool
    {
        $f = json_decode(file_get_contents(ROOT_PROJECT."/elements/config_files/apps.json"));
        foreach ($f as $one => $val)
        {
            if ($val->name == $appname) return (true);
        }
        return (false);
    }


    /** Show all app in apps.json
     */
    final protected function showAppsRegister()
    {
        $f = json_decode(file_get_contents(ROOT_PROJECT."/elements/config_files/apps.json"));
        $i = 1;
        if (count($f) == 0)
            Output::outputAsError("Oups! You have not app registered. Please create an app with app-manager\n");
        foreach ($f as $one => $val)
        {
            Output::outputAsNotice($i.") ".$val->name.(($val->isdefault == "yes")? " : Is default" : "")."\n", "none");
            array_push($this->params['applist'], $val->name);
            $i++;
        }
        return (false);
    }

    /**
     * Processing to create app
     */
    final protected function createAppProcess()
    {
        $appname = $this->params['appname'];
        Output::outputAsSuccess("Processing to create app : $appname \n", "none");
        Output::outputAsSuccess("........................................\n", "none");
        sleep(1);
        $temp = $this->params['template'];
        $temdirbase = __DIR__."/AppTemplate";
        $tempdir = ($temp == "no")? $temdirbase.'/notemplate/{appname}/' : $temdirbase.'/template/{appname}/';
        Server::copy($tempdir, ROOT_PROJECT."/apps/".$appname, 'directory');
        $napp = ROOT_PROJECT."/apps/".$appname;

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
        $f = json_decode(file_get_contents(ROOT_PROJECT."/elements/config_files/apps.json"));
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
        $f = json_encode($f);
        file_put_contents(ROOT_PROJECT."/elements/config_files/apps.json", $f);
        if ($this->params['template'] == "yes")
            new AM(array("core/manager", "assets-manager", "--copy", "--appname=". $this->params['appname'], "--symlink", "--noexit"));
        Output::outputAsSuccess("\n Your app is ready to use. To test your app go to project location on your browser with parameter /hello. Enjoy ! \n", "none");
    }


    /**
     * Processing to switch default app
     */
    final protected function switchAppProcess()
    {
        $appname = $this->params['capp'];
        Output::outputAsSuccess("Processing to switch app : $appname  to be default\n", "none");
        Output::outputAsSuccess("........................................\n", "none");
        sleep(1);
        $f = json_decode(file_get_contents(ROOT_PROJECT."/elements/config_files/apps.json"));

        foreach ($f as $one => $val)
        {
            if ($val->isdefault == "yes") $val->isdefault = "no";
            if ($val->name == $this->params['capp']) $val->isdefault = "yes";
        }

        $f = json_encode($f);
        file_put_contents(ROOT_PROJECT."/elements/config_files/apps.json", $f);
        Output::outputAsSuccess("Great ! Your app << ".$this->params['capp']." >> to be the default app.\n", "none");
    }


    /**
     * Processing to remove app
     */
    final protected function removeAppProcess()
    {
        $appname = $this->params['appname'];
        Output::outputAsSuccess("Processing to delete app : $appname \n", "none");
        Output::outputAsSuccess("........................................\n", "none");
        sleep(1);

        // DELETE TO APP CORE

        $f = json_decode(file_get_contents(ROOT_PROJECT."/elements/config_files/apps.json"));
        foreach ($f as $one => $val)
        {
            if ($val->name == $appname)
            {
                unset($f->$one);
                break;
            }
        }

        $f = json_encode($f);
        file_put_contents(ROOT_PROJECT."/elements/config_files/apps.json", $f);

        iumioServerManager::delete(ROOT_PROJECT."/apps/$appname", "directory");
        new AM(array("core/manager", "assets-manager", "--clear", "--appname=". $this->params['appname'], "--noexit", "--quiet"));
        Output::outputAsSuccess("\n Your app is delete. To create an other app, use app-manager new project \n", "none");
    }


    public function __alter()
    {
        // TODO: Implement __alter() method.
    }

    public function __construct(array $options = array())
    {
        if (empty($options))
            $this->__render();
        else
        {
            $this->options = $options;
            $this->__render();
        }
    }

}