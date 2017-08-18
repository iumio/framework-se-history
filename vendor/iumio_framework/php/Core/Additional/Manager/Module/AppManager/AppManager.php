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

namespace iumioFramework\Core\Console\Module\App;

use iumioFramework\Bin\ConsoleManager;
use iumioFramework\Core\Additionnal\Server\iumioServerManager as Server;
use iumioFramework\Core\Console\CoreManager;
use iumioFramework\Core\Console\Module\{ModuleManager, Help\HelpManager, App\OutputManagerOverride as Output, Assets\AssetsManager as AM};

/**
 * Class AppManager
 * @package iumioFramework\Core\Console\Module\App
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class AppManager implements ModuleManager
{
    protected $options;
    protected $stage = array(
        "App name (like DefaultApp --> end with App): ",
        "iumio purpose you a default template with your app. Would you like to have one ? (yes/no) - Tap Enter for yes: ",
        "Yeah! Would you like to enabled your app ? (yes/no) -  Tap Enter for yes:",
        "Informations are correct ? (yes/no) - Tap Enter for yes:",
        "Delete your app means all file and directory in your app directory will be deleted. Are you sure to confirm this action ? (yes/no) - Tap Enter for yes:",
        "Ok. I process to deleting your app ...",
        "Delete action is aborted ",
        "This is app list which registered to app declarator. To select one, please enter the app number",
        "Enter your app prefix? (App prefix must be a string without special character exepted [ _ & numbers]) -  Tap Enter for no app prefix:"
    );
    protected $params = array("appname" => "", "template" => "", "isdefault" => "", "correct" => "", "applist" => array(), "capp" => "");

    public function __render()
    {
        if (empty($this->options))
        {
            Output::outputAsError("App Manager Error \n  You must to specify an option\n", "no");
            new HelpManager(array("2" => "app"));
            exit();
        }
        else
        {
            $opt = $this->options[2] ?? null;
            if ($opt == "create")
                $this->stepNewProject();
            elseif ($opt == "remove")
                $this->stepRemoveProject();
            elseif ($opt == "enabled")
                $this->stepEnabledProject();
            elseif ($opt == "disabled")
                $this->stepDisabledProject();
            else
                Output::outputAsError("App Manager Error \n   This command doesn't exist. Referer to help comannd\n");
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
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=+¬-]/', $appname)) return (-1);
        return (1);
    }

    /** Check boolean response
     * @param string $res response
     * @return int Is valid boolean response
     */
    final protected function checkBooleanResponse(string $res):int
    {
        if (trim($res) == "yes" || trim($res) == "no" || trim($res) == "") return (1);
        return (-1);
    }

    /** Check prefix response
     * @param string $res response
     * @return int Is valid prefix response
     */
    final protected function checkPrefix(string $res):int
    {
        if (!preg_match('/[\/\'^£$%&*()}{@#~?><>,|=+¬-]/', $res)  && strpos($res, "\\") == FALSE) return (1);
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
        Output::clear();
        Output::outputAsSuccess("Welcome on App Manager. I'm assist you to create your new app. Many question will ask you.", "none");
        Output::outputAsReadLine($this->stage[0], "none");

        $this->params['appname'] = ucfirst($this->listener());

        $e = false;
        while ($e == false)
        {
            if ($this->checkAppName($this->params['appname']) != 1)
                Output::outputAsError("Your app name is invalid. Please Retry.", "none");
            else if ($this->checkAppExist($this->params['appname']) == true)
            {
                $e = false;
                Output::outputAsError("This app name is already exist, Please enter an other app name.", "none");
            }
            else
            {
                $e = true;
                continue;
            }

            Output::outputAsReadLine($this->stage[0], "none");
            $this->params['appname'] = ucfirst($this->listener());
        }
        Output::outputAsNormal("Great! Your app name is ".$this->params['appname'], "none");
        Output::outputAsReadLine($this->stage[1], "none");
        $this->params['template'] = $this->listener();
        while ($this->checkBooleanResponse($this->params['template']) != 1)
        {
            Output::outputAsError("Invalid response. Please Retry (yes/no)", "none");
            Output::outputAsReadLine($this->stage[1], "none");
            $this->params['template'] = $this->listener();
        }
        Output::outputAsReadLine($this->stage[2], "none");
        $this->params['enabled'] = $this->listener();
        while ($this->checkBooleanResponse($this->params['enabled']) != 1)
        {
            Output::outputAsError("Invalid response. Please Retry (yes/no)", "none");
            Output::outputAsReadLine($this->stage[2], "none");
            $this->params['enabled'] = $this->listener();
        }

        Output::outputAsReadLine($this->stage[8], "none");
        $this->params['prefix'] = strtolower($this->listener());
        while ($this->checkPrefix($this->params['prefix']) != 1)
        {
            Output::outputAsError("Invalid response. Please Retry (yes/no)", "none");
            Output::outputAsReadLine($this->stage[8], "none");
            $this->params['prefix'] = strtolower($this->listener());
        }

        $this->params['template'] = (($this->params['template'] != "")? $this->params['template'] : "yes");
        $this->params['enabled'] = (($this->params['enabled'] != "")? $this->params['enabled'] : "yes");
        $this->showRecap();
        Output::outputAsReadLine($this->stage[3], "none");
        $this->params['correct'] = $this->listener();
        while ($this->checkBooleanResponse($this->params['correct']) != 1)
        {
            Output::outputAsError("Invalid response. Please Retry", "none");
            Output::outputAsReadLine($this->stage[3], "none");
            $this->params['correct'] = $this->listener();
        }
        if ($this->params['correct'] == "no")
            Output::outputAsError("Creation Aborted. Please re-run app and enter the correct informations");
        $this->createAppProcess();
    }

    /**
     *
     */
    final protected function stepRemoveProject()
    {
        Output::clear();
        Output::outputAsSuccess("Welcome on App Manager. I'm assist you to remove your app. Many question will ask you.", "none");
        Output::outputAsReadLine($this->stage[0], "none");

        $this->params['appname'] = ucfirst($this->listener());

        $e = false;
        while ($e == false)
        {
            if ($this->checkAppName($this->params['appname']) != 1)
                Output::outputAsError("Your app name is invalid. Please Retry.", "none");
            else if ($this->checkAppExist($this->params['appname']) == false && $this->checkAppRegister($this->params['appname']) == false)
            {
                $e = false;
                Output::outputAsError("This app not exist, Please enter an existed app name", "none");
            }
            else
            {
                $e = true;
                continue;
            }

            Output::outputAsReadLine($this->stage[0], "none");
            $this->params['appname'] = ucfirst($this->listener());
        }

        if ($this->checkAppExist($this->params['appname']) == true && $this->checkAppRegister($this->params['appname']) == false)
            Output::outputAsNormal("Ok ! Your app is ".$this->params['appname'].". It exist on apps directory but it's not declared in app declarator", "none");
        else if ($this->checkAppExist($this->params['appname']) == false && $this->checkAppRegister($this->params['appname']) == true)
            Output::outputAsNormal("Ok ! Your app is ".$this->params['appname'].". It's declared in app declarator but not exist in apps directory", "none");
        else
            Output::outputAsNormal("Ok ! Your app is ".$this->params['appname'].". It's declared in app declarator and exist in apps directory", "none");
        Output::outputAsReadLine($this->stage[4], "none");
        $conf = ((!empty($this->listener()))?  $this->listener() : "yes");
        while ($this->checkBooleanResponse($conf) != 1)
        {
            Output::outputAsError("Invalid response. Please Retry (yes/no)", "none");
            Output::outputAsReadLine($this->stage[4], "none");
            $conf = ((!empty($this->listener()))?  $this->listener() : "yes");
        }
        if ($conf == "no") Output::outputAsError($this->stage[6]);
        $this->removeAppProcess();
    }

    /**
     *
     */
    final protected function stepEnabledProject()
    {
        Output::clear();
        Output::outputAsSuccess("Welcome on App Manager. I'm assist you to enabled your app. Many question will ask you.\n".$this->stage[7], "none");
        // Output::outputAsNormal($this->stage[7]."\n", "none");
        if ($this->showDisabledAppsRegister() == false)
            return ;
        Output::outputAsReadLine("Which number ? : ", "none");
        $this->params['capp'] = $this->listener();

        while (!@isset($this->params['applist'][$this->params['capp'] - 1]))
        {
            Output::outputAsError("Your choose is incorrect. Please Retry", "none");
            $this->showDisabledAppsRegister();
            Output::outputAsReadLine("Which number ? : ", "none");
            $this->params['capp'] = $this->listener();
        }
        $this->params['capp'] = $this->params['applist'][$this->params['capp'] - 1];

        Output::outputAsSuccess("Ok ! You choose ".$this->params['capp']." to be enabled", "none");
        $this->enabledAppProcess();
    }


    /**
     *
     */
    final protected function stepDisabledProject()
    {
        Output::clear();
        Output::outputAsSuccess("Welcome on App Manager. I'm assist you to disabled your app. Many question will ask you.\n".$this->stage[7], "none");
        // Output::outputAsNormal($this->stage[7]."\n", "none");
        if ($this->showEnabledAppsRegister() == false)
            return ;
        Output::outputAsReadLine("Which number ? : ", "none");
        $this->params['capp'] = $this->listener();

        while (!isset($this->params['applist'][$this->params['capp'] - 1]))
        {
            Output::outputAsError("Your choose is incorrect. Please Retry", "none");
            $this->showEnabledAppsRegister();
            Output::outputAsReadLine("Which number ? : ", "none");
            $this->params['capp'] = $this->listener();
        }
        $this->params['capp'] = $this->params['applist'][$this->params['capp'] - 1];

        Output::outputAsSuccess("Ok ! You choose ".$this->params['capp']." to be disabled", "none");
        $this->disabledAppProcess();
    }

    /**
     * Show recap
     */
    final protected function showRecap()
    {
        $strOutput = "This is a recap of your app : \n";
        $strOutput .= "----------------------------\n";
        $strOutput .= "    - App name: ".$this->params['appname']." \n";
        $strOutput .= "    - Use default template : ".$this->params['template']." \n";
        $strOutput .= "    - Enabled : ".$this->params['enabled']. "\n";
        $strOutput .= "    - App prefix : ".(($this->params['prefix'] == "")? "no app prefix" : "/".trim(stripslashes($this->params['prefix'])));
        Output::outputAsNormal($strOutput, "none");

    }

    /** Check if app is registered to apps.json
     * @param string $appname App name
     * @return bool If exist or not
     */
    final protected function checkAppRegister(string $appname):bool
    {
        $f = json_decode(file_get_contents(ROOT_PROJECT."/elements/config_files/apps.json"));
        if (empty($f))
            return (false);
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
            Output::outputAsError("Oups! You have no app registered. Please create an app with app");
        $str = "";
        foreach ($f as $one => $val)
        {
            $str .= $i.") ".$val->name.(($val->enabled == "yes")? " : Enabled" : "Disabled")."\n";
            array_push($this->params['applist'], $val->name);
            $i++;
        }

        Output::outputAsNormal("Your apps \n------------\n".$str, "none");
        return (false);
    }


    /** Show enabled app in apps.json
     * @return int
     */
    final protected function showEnabledAppsRegister():int
    {
        $this->params['applist'] = array();
        $f = json_decode(file_get_contents(ROOT_PROJECT."/elements/config_files/apps.json"));
        $i = 1;
        if ((is_string($f) && strlen($f) < 3) || (count((array) $f) == 0))
        {
            Output::outputAsError("Oups! You do not have an enabled app.");
            return (false);
        }
        $str = "";
        foreach ($f as $one => $val)
        {
            if ($val->enabled == "yes") {
                $str .= $i . ") " . $val->name . " : Enabled"  . "\n";
                array_push($this->params['applist'], $val->name);
                $i++;
            }
        }

        if (count($this->params['applist']) == 0)
        {
            Output::outputAsError("Oups! You do not have an enabled app.");
            return (false);
        }
        else
            Output::outputAsNormal("Your apps \n------------\n".$str, "none");
        return (true);
    }


    /** Show disabled app in apps.json
     * @return int
     */
    final protected function showDisabledAppsRegister():int
    {
        $this->params['applist'] = array();
        $f = json_decode(file_get_contents(ROOT_PROJECT."/elements/config_files/apps.json"));
        $i = 1;
        if ((is_string($f) && strlen($f) < 3) || (count((array)  $f) == 0))
        {
            Output::outputAsError("Oups! You do not have a disabled app.");
            return (false);
        }
        $str = "";
        foreach ($f as $one => $val)
        {
            if ($val->enabled == "no") {
                $str .= $i . ") " . $val->name . " : Disabled" . "\n";
                array_push($this->params['applist'], $val->name);
                $i++;
            }
        }
        if (count($this->params['applist']) == 0)
        {
            Output::outputAsError("Oups! You do not have a disabled app.");
            return (false);
        }
        else
            Output::outputAsNormal("Your apps \n------------\n".$str, "none");
        return (true);
    }

    /**
     * Processing to create app
     */
    final protected function createAppProcess()
    {
        $appname = $this->params['appname'];
        Output::outputAsReadLine("Processing to create app : $appname", "none");
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

        if (!is_object($f))
            $f = new \stdClass();

        foreach ($f as $one => $val) $lastapp++;

        $f->$lastapp = new \stdClass();
        $f->$lastapp->name = $this->params['appname'];
        $f->$lastapp->enabled = (($this->params['enabled'] != "")? $this->params['enabled'] : "yes");
        $f->$lastapp->prefix = trim(stripslashes($this->params['prefix']));
        $f->$lastapp->class = "\\".$this->params['appname']."\\".$this->params['appname'];
        $ndate = new \DateTime('UTC');
        $f->$lastapp->creation = $ndate;
        $f->$lastapp->update = $ndate;
        $f = json_encode($f, JSON_PRETTY_PRINT);
        file_put_contents(ROOT_PROJECT."/elements/config_files/apps.json", $f);
        $this->initialJSON();
        if ($this->params['template'] == "yes")
            new AM(array("core/manager", "assets-manager", "--copy", "--appname=". $this->params['appname'], "--symlink", "--noexit"));
        Output::outputAsEndSuccess("Your app is ready to use. To test your app, go to project location on your browser with parameter ".(($this->params['prefix'] != "")? "/".trim(stripslashes($this->params['prefix'])) : "")."/index. Enjoy !", "none");
    }


    /**
     * Build initial.json
     */
    final protected function initialJSON()
    {
        $f = json_decode(file_get_contents(ROOT_PROJECT."/elements/config_files/initial.json"));
        if (empty($f))
        {
            $std = new \stdClass();
            $std->installation = new \DateTime();
            $std->version = "0.4.0";
            $std->user = get_current_user();
            $std->location = realpath(ROOT_PROJECT);
            $std->os = PHP_OS;

            $rs = json_encode($std, JSON_PRETTY_PRINT);
            file_put_contents(ROOT_PROJECT."/elements/config_files/initial.json", $rs);
        }
    }

    /**
     * Processing to enabled an app
     */
    final protected function enabledAppProcess()
    {
        $appname = $this->params['capp'];
        Output::outputAsNormal("Processing to enabled app : $appname  will be enabled \n", "none");
        sleep(1);
        $f = json_decode(file_get_contents(ROOT_PROJECT."/elements/config_files/apps.json"));

        foreach ($f as $one => $val)
        {
            if ($val->name == $this->params['capp'])
            {
                $val->update = new \DateTime();
                $val->enabled = "yes";
            }
        }

        $f = json_encode($f, JSON_PRETTY_PRINT);
        file_put_contents(ROOT_PROJECT."/elements/config_files/apps.json", $f);
        Output::outputAsEndSuccess("Now, the ".$this->params['capp']." is enabled", "none");
    }

    /**
     * Processing to disabled an app
     */
    final protected function disabledAppProcess()
    {
        $appname = $this->params['capp'];
        Output::outputAsNormal("Processing to enabled app : $appname  will be enabled \n", "none");
        sleep(1);
        $f = json_decode(file_get_contents(ROOT_PROJECT."/elements/config_files/apps.json"));

        foreach ($f as $one => $val)
        {
            if ($val->name == $this->params['capp'])
            {
                $val->update = new \DateTime();
                $val->enabled = "no";
            }
        }

        $f = json_encode($f, JSON_PRETTY_PRINT);
        file_put_contents(ROOT_PROJECT."/elements/config_files/apps.json", $f);
        Output::outputAsEndSuccess("Now, the ".$this->params['capp']." is disabled", "none");
    }


    /**
     * Processing to remove app
     */
    final protected function removeAppProcess()
    {
        $appname = $this->params['appname'];
        Output::outputAsNormal("Processing to delete app : $appname \n", "none");
        sleep(1);

        // DELETE TO APP CORE

        $f = json_decode(file_get_contents(ROOT_PROJECT."/elements/config_files/apps.json"));
        if (!empty($f)) {
            foreach ($f as $one => $val) {
                if ($val->name == $appname) {
                    unset($f->$one);
                    break;
                }
            }

            $f = array_values((array)$f);
            $f = json_encode((object) $f, JSON_PRETTY_PRINT);

            file_put_contents(ROOT_PROJECT."/elements/config_files/apps.json", $f);
            if (strlen($f) < 3)
                file_put_contents(ROOT_PROJECT."/elements/config_files/apps.json", "");
        }
        Server::delete(ROOT_PROJECT."/apps/$appname", "directory");
        new AM(array("core/manager", "assets-manager", "--clear", "--appname=". $this->params['appname'], "--noexit", "--quiet"));

        if (strlen($f) < 3)
            file_put_contents(ROOT_PROJECT."/elements/config_files/initial.json", "");

        Output::outputAsNormal("The application has been deleted. To create a new application, use [app create] .", "none");
    }





    public function __alter()
    {
        // TODO: Implement __alter() method.
    }

    public function __construct(array $options = array())
    {
        CoreManager::setCurrentModule("App Manager");
        if (empty($options))
            $this->__render();
        else
        {
            $this->options = $options;
            $this->__render();
        }
    }

}