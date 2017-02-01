<?php

namespace IumioFramework\Manager\Console\Module\App;
use IumioFramework\Core\Additionnal\Server\IumioServerManager as Server;
use IumioFramework\Manager\Console\Module\IumioManagerModule as ModuleInterface;
use IumioFramework\Manager\Console\Module\App\AppManagerOutput as Output;

/**
 * Class AppManager
 * @package IumioFramework\Manager\Console\Module\App
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class AppManager implements ModuleInterface
{
    protected $options;
    protected $stage = array(
        "App name (like DefaultApp --> end with App): ",
        "Iumio purpose you a default template with your app. Would you like to have one ? (yes/no): ",
        "\nYeah! Would you like to set this app as default ? (yes/no)",
        "This informations are correct ?"
    );
    protected $params = array("appname" => "", "template" => "", "hasdefault" => "", "correct" => "");

    public function __render()
    {
        if (empty($this->options))
            Output::outputAsError("App Manager Error \n \t You must to have an option. Referer to help comannd.");
        else
        {
            $opt = $this->options[2] ?? null;
            if ($opt == "new-project")
                $this->stepNewProject();
            elseif ($opt == "--copy")
                $this->copyAssets($this->options);
            else
                Output::outputAsError("App Manager Error \n \t This command doesn't exist. Referer to help comannd");
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
        Output::outputAsSuccess("Welcome to Iumio app manager. I'm assist you to create your new app. Many question will ask you so are you ready ?\n\n", "none");
        Output::outputAsSuccess($this->stage[0], "none");

       $this->params['appname'] = $this->listener();

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
                $this->params['appname'] = $this->listener();
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
        $this->params['hasdefault'] = $this->listener();
        while ($this->checkBooleanResponse($this->params['hasdefault']) != 1)
        {
            Output::outputAsError("Invalid response. Please Retry (yes/no).\n", "none");
            Output::outputAsSuccess($this->stage[2], "none");
            $this->params['hasdefault'] = $this->listener();
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
     * Show recap
     */
    final protected function showRecap()
    {
        Output::outputAsSuccess("\n This is a recap of your app : \n", "none");
        Output::outputAsSuccess("\t - App name: ".$this->params['appname']." \n", "none");
        Output::outputAsSuccess("\t - Use default template : ".$this->params['template']." \n", "none");
        Output::outputAsSuccess("\t - As default app : ".$this->params['hasdefault']." \n", "none");
    }

    /**
     * Processing to create app
     */
    final protected function createAppProcess()
    {
        $appname = $this->params['appname'];
        Output::outputAsSuccess("Processing to create app : $appname \n", "none");
        Output::outputAsSuccess("........................................", "none");
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

    }
    /**
     * @param array $options
     */
    private function copyAssets(array $options)
    {

        $appname = '#none';
        $symlink = false;

        if ((isset($options[3]) && ($options[3] == "--symlink")) ||
            (isset($options[4]) && ($options[4] == "--symlink")))
            $symlink = true;
        if ((isset($options[3]) && (strpos($options[3], "--appname=") !== false && $ch = $options[3])) ||
            (isset($options[4]) && (strpos($options[4], "--appname=") !== false && $ch = $options[4])) )
        {
            $e = explode("=", $ch);
            $appname = $e[1];
            if (strpos($appname, "App") == false)
                Output::displayAsError("Assets Manager Error : App name is invalid");

            if (!is_dir(ROOT_PROJECT."/apps/".$appname))
                Output::displayAsError("Assets Manager Error: App $appname doesn't exist.");
        }

        Output::displayAsSuccess("Hey, I copy ".(($appname != '#none')? 'your assets for '.$appname : 'all assets projects')." on web directory".(($symlink == true)? ' with symlink option' : ''), "none");
        Output::displayAsSuccess(".............................................", "none");
        $this->copy($symlink, $appname);
        Output::displayAsSuccess("Task to copy assets ".(($appname == '#none')? '' : 'for '.$appname)." is successfull.");
    }

    /** Call Server delete and create function
     * @param string $appname Appn ame name
     * @param string $env Environment name
     */
    private function callDelCreaServer(string $appname, string $env = null)
    {
        if ($appname == '#none')
        {
            Server::delete(ROOT_PROJECT."/web/components/apps/", 'directory');
            Server::create(ROOT_PROJECT."/web/components/apps/", 'directory');
        }
        else
            Server::delete(ROOT_PROJECT."/web/components/apps/".strtolower($appname)."/", 'directory');

    }

    /** Process to copy assets
     * @param bool $symlink Is symlink
     * @param string|NULL $appname App name
     */
    private function copy(bool $symlink, string $appname)
    {
        if ($appname != '#none'){
            if (!is_dir(ROOT_PROJECT."/apps/".$appname."/Front/resources/"))
                Output::displayAsError("Assets Manager Error: Resource directory for $appname doesn't exist.");
            Server::copy(ROOT_PROJECT."/apps/".$appname."/Front/resources/", ROOT_PROJECT."/web/components/apps/".strtolower($appname), 'directory', $symlink);
        }
        else
        {
            $dirs = scandir(ROOT_PROJECT."/apps/");

            foreach ($dirs as $dir) {
                if ($dir == ".") continue;
                if ($dir == "..") continue;
                Server::copy(ROOT_PROJECT."/apps/".$dir."/Front/resources/", ROOT_PROJECT."/web/components/apps/".strtolower($dir), 'directory', $symlink);
            }
        }
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