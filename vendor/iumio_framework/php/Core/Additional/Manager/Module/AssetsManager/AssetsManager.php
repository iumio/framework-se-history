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
            Output::displayAsError("Assets Manager Error \n  You must to have an option. Referer to help command\n");
        else
        {
            $opt = $this->options[2] ?? null;
            if ($opt == "--clear")
                $this->clearAssets($this->options);
            else if ($opt == "--copy")
                $this->copyAssets($this->options);
            else
                Output::displayAsError("Assets Manager Error \n  This command doesn't exist. Referer to help command\n");
        }
    }

    /** Clear some assets in web directory
     * @param array $options Clear options
     * @return null
     */
    private function clearAssets(array $options)
    {
        $appname = NULL;
        if ($this->strlike_in_array("--appname", $options) != null)
        {
            $ch = $this->strlike_in_array("--appname", $options);
            $e = explode("=", $ch);
            $appname = $e[1];
            if (strpos($appname, "App") == false)
            {
                if (!in_array("--quiet", $options)) Output::displayAsError("Assets Manager Error : The app name is invalid");
            }

        }
        if (!is_dir(ROOT_PROJECT."/web/components/apps/dev/".strtolower($appname)) || !is_dir(ROOT_PROJECT."/web/components/apps/prod/".strtolower($appname)))
        {
            if (!in_array("--quiet", $options)) Output::displayAsNotice("Assets Manager Notice: The app $appname is not register in web assets.\n");
        }

        if ($appname != NULL)
        {
            $env = ($this->strlike_in_array("--env=", $options));
            if ($env != null)
            {
                $nenv = explode("=", $env);
                $env = $nenv[1];
                if (!in_array($env, array("dev", "prod", "all")))
                {
                    if (!in_array("--quiet", $options))
                        Output::displayAsError("Assets Manager Notice: The environment ".strtoupper($env)." does not exist.\n");
                    else
                        return (null);
                }
            }

            Output::displayAsSuccess("Hey, I'll clean the $appname assets for ".(($env != null && $env != "all")? strtoupper($env)." environment" : "all environments"), "none");
            $this->callDelCreaServer($appname, $env);
            if ($env != null)
                Output::displayAsNormal("$appname assets for ".(($env != null && $env != "all")? strtoupper($env)." environment" : "all environments")." have been deleted.");
            return (null);
        }

        $env = ($this->strlike_in_array("--env=", $options));
        if ($env != null)
        {
            $nenv = explode("=", $env);
            $env = $nenv[1];
            if (!in_array($env, array("dev", "prod", "all")))
            {
                if (!in_array("--quiet", $options))
                    Output::displayAsError("Assets Manager Notice: The environment ".strtoupper($env)." does not exist.\n");
                else
                    return (null);
            }
        }

        Output::displayAsSuccess("Hey, I'll clean all assets in web folder for ".(($env != null && $env !== "all")? strtoupper($env)." environment" : "all environments"), "none");
        $this->callDelCreaServer('#none', $env);
        if ($this->strlike_in_array("--noexit", $options) != null)
            Output::displayAsEndSuccess("All assets for ".(($env != null && $env !== "all")? strtoupper($env)." environment" : "all environments")." have been deleted.", "none");
        else
            Output::displayAsNormal("All assets for ".(($env != null && $env !== "all")? strtoupper($env)." environment" : "all environments")." have been deleted.");
        return (null);
    }

    /**
     * A version of in_array() that does a sub string match on $needle
     *
     * @param  mixed   $needle    The searched value
     * @param  array   $haystack  The array to search in
     * @return mixed
     */
    private function strlike_in_array($needle, array $haystack)
    {
        foreach ($haystack as $one => $value)
        {
            if (strpos($value, $needle) !== false)
            {
                return ($value);
            }
        }
        return (null);
    }

    /** Copy asset manager
     * @param array $options
     * @return null
     */
    private function copyAssets(array $options)
    {

        $appname = '#none';
        $symlink = false;

        if ($this->strlike_in_array("--symlink", $options) != null)
            $symlink = true;
        if ($this->strlike_in_array("--appname", $options) != null)
        {
            $ch = $this->strlike_in_array("--appname", $options);
            $e = explode("=", $ch);
            $appname = $e[1];
            if (strpos($appname, "App") == false)
                Output::displayAsError("Assets Manager Error : The app name is invalid");

            if (!is_dir(ROOT_PROJECT."/apps/".$appname))
                Output::displayAsError("Assets Manager Error: App $appname doesn't exist.");
        }

        $env = ($this->strlike_in_array("--env=", $options));
        if ($env != null)
        {
            $nenv = explode("=", $env);
            $env = $nenv[1];
            if (!in_array($env, array("dev", "prod", "all")))
            {
                if (!in_array("--quiet", $options))
                    Output::displayAsError("Assets Manager Notice: The environment ".strtoupper($env)." does not exist.\n");
                else
                    return (null);
            }
        }
        Output::displayAsSuccess("Hey, I'll copy ".(($appname != '#none')? $appname." assets (" : 'all assets (').(($env != null && $env !== "all")? strtoupper($env)." environment)" : "all environments)")." in web folder".(($symlink == true)? ' with symlink option' : ''), "none");
        $this->copy($symlink, $appname, $env);
        if (isset($options[5]) && $options[5] == "--noexit")
            Output::displayAsNormal("The copy of the assets".(($appname == '#none')? '' : ' for '.$appname)." has been done.", "none");
        else
            Output::displayAsNormal("The copy of the assets".(($appname == '#none')? '' : ' for '.$appname)." has been done.");
    }

    /** Call Server delete and create function
     * @param string $appname Appn ame name
     * @param string $env Environment name
     */
    private function callDelCreaServer(string $appname, string $env = null)
    {
        if ($appname == '#none' && $env == null)
        {
            Server::delete(ROOT_PROJECT."/web/components/apps/dev/", 'directory');
            Server::create(ROOT_PROJECT."/web/components/apps/dev/", 'directory');
            Server::delete(ROOT_PROJECT."/web/components/apps/prod/", 'directory');
            Server::create(ROOT_PROJECT."/web/components/apps/prod/", 'directory');
        }

        else if ($appname == '#none' && in_array($env, array("dev", "prod", "all")))
        {
            if ($env == "all")
            {
                Server::delete(ROOT_PROJECT."/web/components/apps/dev/", 'directory');
                Server::create(ROOT_PROJECT."/web/components/apps/dev/", 'directory');
                Server::delete(ROOT_PROJECT."/web/components/apps/prod/", 'directory');
                Server::create(ROOT_PROJECT."/web/components/apps/prod/", 'directory');
            }
            else
                Server::delete(ROOT_PROJECT."/web/components/apps/".strtolower($env)."/", 'directory');

        }
        else if ($appname !== '#none' && in_array($env, array("dev", "prod", "all")))
        {
            if ($env == "all")
            {
                Server::delete(ROOT_PROJECT."/web/components/apps/dev/".strtolower($appname), 'directory');
                Server::delete(ROOT_PROJECT."/web/components/apps/prod/".strtolower($appname), 'directory');
            }
            else
                Server::delete(ROOT_PROJECT."/web/components/apps/".strtolower($env)."/".strtolower($appname), 'directory');
        }
        else if ($appname !== '#none' && $env == null) {
            Server::delete(ROOT_PROJECT . "/web/components/apps/dev/" . strtolower($appname), 'directory');
            Server::delete(ROOT_PROJECT . "/web/components/apps/prod/" . strtolower($appname), 'directory');
        }

        else
            Output::displayAsError("Assets Manager Error \n  App name or env name does not exist. Referer to help command\n");

    }

    /** Process to copy assets
     * @param bool $symlink Is symlink
     * @param string|NULL $appname App name
     * @param string|null $env Environment
     */
    private function copy(bool $symlink, string $appname, string $env = null)
    {
        if ($appname == '#none' && $env == null)
        {
            $dirs = scandir(ROOT_PROJECT."/apps/");

            foreach ($dirs as $dir) {
                if ($dir == ".") continue;
                if ($dir == "..") continue;
                if (!is_dir(ROOT_PROJECT."/apps/".$dir)) continue;
                Server::copy(ROOT_PROJECT."/apps/".$dir."/Front/Resources/", ROOT_PROJECT."/web/components/apps/dev/".strtolower($dir), 'directory', $symlink);
                Server::copy(ROOT_PROJECT."/apps/".$dir."/Front/Resources/", ROOT_PROJECT."/web/components/apps/prod/".strtolower($dir), 'directory', $symlink);

            }
        }

        else if ($appname == '#none' && in_array($env, array("dev", "prod", "all")))
        {
            if ($env == "all")
            {
                $dirs = scandir(ROOT_PROJECT."/apps/");

                foreach ($dirs as $dir) {
                    if ($dir == ".") continue;
                    if ($dir == "..") continue;
                    if (!is_dir(ROOT_PROJECT."/apps/".$dir)) continue;
                    Server::copy(ROOT_PROJECT."/apps/".$dir."/Front/Resources/", ROOT_PROJECT."/web/components/apps/dev/".strtolower($dir), 'directory', $symlink);
                    Server::copy(ROOT_PROJECT."/apps/".$dir."/Front/Resources/", ROOT_PROJECT."/web/components/apps/prod/".strtolower($dir), 'directory', $symlink);

                }
            }
            else
            {
                $dirs = scandir(ROOT_PROJECT."/apps/");

                foreach ($dirs as $dir) {
                    if ($dir == ".") continue;
                    if ($dir == "..") continue;
                    if (!is_dir(ROOT_PROJECT."/apps/".$dir)) continue;
                    Server::copy(ROOT_PROJECT."/apps/".$dir."/Front/Resources/", ROOT_PROJECT."/web/components/apps/".strtolower($env)."/".strtolower($dir), 'directory', $symlink);
                }
            }
         }
        else if ($appname !== '#none' && in_array($env, array("dev", "prod", "all")))
        {
            if ($env == "all")
            {
                if (!is_dir(ROOT_PROJECT."/apps/".$appname."/Front/Resources/"))
                    Output::displayAsError("Assets Manager Error: The resources folder for $appname doesn't exist.");
                Server::copy(ROOT_PROJECT."/apps/".$appname."/Front/Resources/", ROOT_PROJECT."/web/components/apps/dev/".strtolower($appname), 'directory', $symlink);
                Server::copy(ROOT_PROJECT."/apps/".$appname."/Front/Resources/", ROOT_PROJECT."/web/components/apps/prod/".strtolower($appname), 'directory', $symlink);

            }
            else
                Server::copy(ROOT_PROJECT."/apps/".$appname."/Front/Resources/", ROOT_PROJECT."/web/components/apps/".strtolower($env)."/".strtolower($appname), 'directory', $symlink);

        }
        else if ($appname !== '#none' && $env == null) {
            if (!is_dir(ROOT_PROJECT."/apps/".$appname."/Front/Resources/"))
                Output::displayAsError("Assets Manager Error: The resources folder for $appname doesn't exist.");
            Server::copy(ROOT_PROJECT."/apps/".$appname."/Front/Resources/", ROOT_PROJECT."/web/components/apps/dev/".strtolower($appname), 'directory', $symlink);
            Server::copy(ROOT_PROJECT."/apps/".$appname."/Front/Resources/", ROOT_PROJECT."/web/components/apps/prod/".strtolower($appname), 'directory', $symlink);
        }
        else
            Output::displayAsError("Assets Manager Error \n  App name or env name does not exist. Referer to help command\n");

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