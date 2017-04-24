<?php

namespace iumioFramework\Manager\Console\Module\Assets;
use iumioFramework\Core\Additionnal\Server\iumioServerManager as Server;
use iumioFramework\Manager\Console\Module\iumioManagerModule as ModuleInterface;
use iumioFramework\Core\Additionnal\Console\Manager\Display\iumioManagerOutput as Output;

/**
 * Class AssetsManager
 * @package iumioFramework\Manager\Console\Module\Assets
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class AssetsManager implements ModuleInterface
{
    protected $options;

    public function __render()
    {
        if (empty($this->options))
            Output::displayAsError("Assets Manager Error \n \t You must to have an option. Referer to help command\n");
        else
        {
            $opt = $this->options[2] ?? null;
            if ($opt == "--clear")
                $this->clearAssets($this->options);
            else if ($opt == "--copy")
                $this->copyAssets($this->options);
            else
                Output::displayAsError("Assets Manager Error \n \t This command doesn't exist. Referer to help command\n");
        }
    }

    /**
     * @param array $options
     */
    private function clearAssets(array $options)
    {
        $appname = NULL;
        if ((isset($options[3]) && (strpos($options[3], "--appname=") !== false && $ch = $options[3])))
        {
            $e = explode("=", $ch);
            $appname = $e[1];
            if (strpos($appname, "App") == false)
            {
                if (!in_array("--quiet", $options)) Output::displayAsError("Assets Manager Error : App name is invalid");
            }

        }
        if (!is_dir(ROOT_PROJECT."/web/components/apps/".strtolower($appname)))
        {
            if (!in_array("--quiet", $options)) Output::displayAsNotice("Assets Manager Notice: App $appname is not register on web assets.\n");
        }

        if ($appname != NULL)
        {
            Output::displayAsSuccess("Hey, I clear web assets for $appname", "none");
            Output::displayAsSuccess("......................", "none");
            $this->callDelCreaServer($appname);
            Output::displayAsSuccess("Task to clear $appname web assets is successfull.");
        }

        Output::displayAsSuccess("Hey, I clear assets on web directory", "none");
        Output::displayAsSuccess("......................", "none");
        $this->callDelCreaServer('#none');
        if (isset($options[4]) && $options[4] == "--noexit")
            Output::displayAsEndSuccess("Task to clear all assets is successfull.", "none");
        else
            Output::displayAsEndSuccess("Task to clear all assets is successfull.");
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
        $this->copy($symlink, $appname);
        if (isset($options[5]) && $options[5] == "--noexit")
            Output::displayAsSuccess("Task to copy assets ".(($appname == '#none')? '' : 'for '.$appname)." is successfull.", "none");
        else
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
            Server::delete(ROOT_PROJECT."/web/components/apps/".strtolower($appname), 'directory');

    }

    /** Process to copy assets
     * @param bool $symlink Is symlink
     * @param string|NULL $appname App name
     */
    private function copy(bool $symlink, string $appname)
    {
        if ($appname != '#none'){
            if (!is_dir(ROOT_PROJECT."/apps/".$appname."/Front/Resources/"))
                Output::displayAsError("Assets Manager Error: Resource directory for $appname doesn't exist.");
            Server::copy(ROOT_PROJECT."/apps/".$appname."/Front/Resources/", ROOT_PROJECT."/web/components/apps/".strtolower($appname), 'directory', $symlink);
        }
        else
        {
            $dirs = scandir(ROOT_PROJECT."/apps/");

            foreach ($dirs as $dir) {
                if ($dir == ".") continue;
                if ($dir == "..") continue;
                Server::copy(ROOT_PROJECT."/apps/".$dir."/Front/Resources/", ROOT_PROJECT."/web/components/apps/".strtolower($dir), 'directory', $symlink);
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