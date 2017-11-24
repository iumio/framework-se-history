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

namespace iumioFramework\Core\Console\Module\Assets;

use iumioFramework\Core\Additionnal\Server\ServerManager as Server;
use iumioFramework\Core\Console\CoreManager;
use iumioFramework\Core\Console\Module\ModuleManager;
use iumioFramework\Core\Console\Display\OutputManager as Output;
use iumioFramework\Additional\Manager\Module\ToolsManager;

/**
 * Class AssetsManager
 * @package iumioFramework\Core\Console\Module\Assets
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <danyrafina@gmail.com>
 */

class AssetsManager extends ToolsManager implements ModuleManager
{
    protected $options;

    public function __render()
    {
        if (empty($this->options)) {
            Output::displayAsError("Assets Manager Error \n  You must to specify an option\n");
        } else {
            $opt = $this->options[2] ?? null;
            if ($opt == "--clear") {
                $this->clearAssets($this->options);
            } elseif ($opt == "--copy") {
                $this->copyAssets($this->options);
            } else {
                Output::displayAsError("Assets Manager Error\n
                  This command doesn't exist. Referer to help command\n");
            }
        }
    }

    /** Clear some assets in web directory
     * @param array $options Clear options
     * @return null
     */
    public function clearAssets(array $options)
    {
        $appname = null;
        if ($this->strlikeInArray("--appname", $options) != null) {
            $ch = $this->strlikeInArray("--appname", $options);
            $e = explode("=", $ch);
            $appname = $e[1];
            if (strpos($appname, "App") == false) {
                if (!in_array("--quiet", $options)) {
                    Output::displayAsError("Assets Manager Error : The app name is invalid");
                }
            }
        }
        if (!is_dir(ROOT_PROJECT."/web/components/apps/dev/".strtolower($appname)) ||
            !is_dir(ROOT_PROJECT."/web/components/apps/prod/".strtolower($appname))) {
            if (!in_array("--quiet", $options)) {
                Output::displayAsNotice("Assets Manager Notice: The app $appname is
                 not register in web assets.\n");
            }
        }

        if ($appname != null) {
            $env = ($this->strlikeInArray("--env=", $options));
            if ($env != null) {
                $nenv = explode("=", $env);
                $env = strtolower($nenv[1]);
                if (!in_array($env, array("dev", "prod", "all"))) {
                    if (!in_array("--quiet", $options)) {
                        Output::displayAsError("Assets Manager Notice: The environment ".
                            strtoupper($env)." does not exist.\n");
                    } else {
                        return (null);
                    }
                }
            }

            Output::displayAsSuccess("Hey, I'll clean the $appname assets for ".
                (($env != null && $env != "all")? strtoupper($env)." environment" : "all environments"), "none");
            $this->callDelCreaServer($appname, $env);
            if ($env != null) {
                Output::displayAsNormal("$appname assets for ".(($env != null && $env != "all")?
                        strtoupper($env)." environment" : "all environments")." have been deleted.");
            }
            return (null);
        }

        $env = ($this->strlikeInArray("--env=", $options));
        if ($env != null) {
            $nenv = explode("=", $env);
            $env = strtolower($nenv[1]);
            if (!in_array($env, array("dev", "prod", "all"))) {
                if (!in_array("--quiet", $options)) {
                    Output::displayAsError("Assets Manager Notice: The environment ".strtoupper($env)."
                     does not exist.\n");
                } else {
                    return (null);
                }
            }
        }

        Output::displayAsSuccess("Hey, I'll clean all assets in web folder for ".
            (($env != null && $env !== "all")? strtoupper($env)." environment" : "all environments"), "none");
        $this->callDelCreaServer('#none', $env);
        if ($this->strlikeInArray("--noexit", $options) != null) {
            Output::displayAsEndSuccess("All assets for ".(($env != null && $env !== "all")?
                    strtoupper($env)." environment" : "all environments")." have been deleted.", "none");
        } else {
            Output::displayAsNormal("All assets for ".(($env != null && $env !== "all")?
                    strtoupper($env)." environment" : "all environments")." have been deleted.");
        }
        return (null);
    }


    /** Copy asset manager
     * @param array $options
     * @return null
     */
    public function copyAssets(array $options)
    {

        $appname = '#none';
        $symlink = false;

        if ($this->strlikeInArray("--symlink", $options) != null) {
            $symlink = true;
        }
        if ($this->strlikeInArray("--appname", $options) != null) {
            $ch = $this->strlikeInArray("--appname", $options);
            $e = explode("=", $ch);
            $appname = $e[1];
            if (strpos($appname, "App") == false) {
                Output::displayAsError("Assets Manager Error : The app name is invalid");
            }

            if (!is_dir(ROOT_PROJECT."/apps/".$appname)) {
                Output::displayAsError("Assets Manager Error: App $appname doesn't exist.");
            }
        }

        $env = ($this->strlikeInArray("--env=", $options));
        if ($env != null) {
            $nenv = explode("=", $env);
            $env = strtolower($nenv[1]);
            if (!in_array($env, array("dev", "prod", "all"))) {
                if (!in_array("--quiet", $options)) {
                    Output::displayAsError("Assets Manager Notice: The environment ".
                        strtoupper($env)." does not exist.\n");
                } else {
                    return (null);
                }
            }
        }
        Output::displayAsSuccess("Hey, I'll copy ".(($appname != '#none')? $appname." assets (" :
                'all assets (').(($env != null && $env !== "all")? strtoupper($env)." environment)" :
                "all environments)")." in web folder".(($symlink == true)? ' with symlink option' : ''), "none");
        $this->callDelCreaServer($appname, $env);
        $this->copy($symlink, $appname, $env);
        if ($this->strlikeInArray("--noexit", $options) != null) {
            Output::displayAsNormal("The copy of the assets".(($appname == '#none')? '' :
                    ' for '.$appname)." has been done.", "none");
        } else {
            Output::displayAsNormal("The copy of the assets".(($appname == '#none')? '' :
                    ' for '.$appname)." has been done.");
        }
    }

    /** Call Server delete and create function
     * @param string $appname Appn ame name
     * @param string $env Environment name
     */
    private function callDelCreaServer(string $appname, string $env = null)
    {
        if ($appname == '#none' && $env == null) {
            Server::delete(ROOT_PROJECT."/web/components/apps/dev/", 'directory');
            Server::create(ROOT_PROJECT."/web/components/apps/dev/", 'directory');
            Server::delete(ROOT_PROJECT."/web/components/apps/prod/", 'directory');
            Server::create(ROOT_PROJECT."/web/components/apps/prod/", 'directory');
        } elseif ($appname == '#none' && in_array($env, array("dev", "prod", "all"))) {
            if ($env == "all") {
                Server::delete(ROOT_PROJECT."/web/components/apps/dev/", 'directory');
                Server::create(ROOT_PROJECT."/web/components/apps/dev/", 'directory');
                Server::delete(ROOT_PROJECT."/web/components/apps/prod/", 'directory');
                Server::create(ROOT_PROJECT."/web/components/apps/prod/", 'directory');
            } else {
                Server::delete(ROOT_PROJECT."/web/components/apps/".strtolower($env)."/", 'directory');
                Server::create(ROOT_PROJECT."/web/components/apps/".strtolower($env)."/", 'directory');
            }
        } elseif ($appname !== '#none' && in_array($env, array("dev", "prod", "all"))) {
            if ($env == "all") {
                Server::delete(ROOT_PROJECT."/web/components/apps/dev/".strtolower($appname), 'directory');
                Server::delete(ROOT_PROJECT."/web/components/apps/prod/".strtolower($appname), 'directory');
            } else {
                Server::delete(ROOT_PROJECT."/web/components/apps/".strtolower($env)."/".
                    strtolower($appname), 'directory');
            }
        } elseif ($appname !== '#none' && $env == null) {
            Server::delete(
                ROOT_PROJECT . "/web/components/apps/dev/" . strtolower($appname),
                'directory'
            );
            Server::delete(
                ROOT_PROJECT . "/web/components/apps/prod/" . strtolower($appname),
                'directory'
            );
        } else {
            Output::displayAsError("Assets Manager Error \n  App name or env name does not exist.
             Referer to help command\n");
        }
    }

    /** Process to copy assets
     * @param bool $symlink Is symlink
     * @param string|NULL $appname App name
     * @param string|null $env Environment
     */
    public function copy(bool $symlink, string $appname, string $env = null)
    {
        if ($appname == '#none' && $env == null) {
            $dirs = scandir(ROOT_PROJECT."/apps/");

            foreach ($dirs as $dir) {
                if ($dir == ".") {
                    continue;
                }
                if ($dir == "..") {
                    continue;
                }
                if (!is_dir(ROOT_PROJECT."/apps/".$dir)) {
                    continue;
                }
                if (file_exists(ROOT_PROJECT."/apps/".$dir."/Front/Resources/")) {
                    Server::copy(
                        ROOT_PROJECT . "/apps/" . $dir . "/Front/Resources/",
                        ROOT_PROJECT . "/web/components/apps/dev/" . strtolower($dir),
                        'directory',
                        $symlink
                    );
                    Server::copy(
                        ROOT_PROJECT . "/apps/" . $dir . "/Front/Resources/",
                        ROOT_PROJECT . "/web/components/apps/prod/" . strtolower($dir),
                        'directory',
                        $symlink
                    );
                }
                
            }
        } elseif ($appname == '#none' && in_array($env, array("dev", "prod", "all"))) {
            if ($env == "all") {
                $dirs = scandir(ROOT_PROJECT."/apps/");

                foreach ($dirs as $dir) {
                    if ($dir == ".") {
                        continue;
                    }
                    if ($dir == "..") {
                        continue;
                    }
                    if (!is_dir(ROOT_PROJECT."/apps/".$dir)) {
                        continue;
                    }
                    if (file_exists(ROOT_PROJECT."/apps/".$dir."/Front/Resources/")) {
                        Server::copy(
                            ROOT_PROJECT . "/apps/" . $dir . "/Front/Resources/",
                            ROOT_PROJECT . "/web/components/apps/dev/" . strtolower($dir),
                            'directory',
                            $symlink
                        );
                        Server::copy(
                            ROOT_PROJECT . "/apps/" . $dir . "/Front/Resources/",
                            ROOT_PROJECT . "/web/components/apps/prod/" . strtolower($dir),
                            'directory',
                            $symlink
                        );
                    }
                }
            } else {
                $dirs = scandir(ROOT_PROJECT."/apps/");

                foreach ($dirs as $dir) {
                    if ($dir == ".") {
                        continue;
                    }
                    if ($dir == "..") {
                        continue;
                    }
                    if (!is_dir(ROOT_PROJECT."/apps/".$dir)) {
                        continue;
                    }
                    if (file_exists(ROOT_PROJECT."/apps/".$dir."/Front/Resources/")) {
                        Server::copy(
                            ROOT_PROJECT . "/apps/" . $dir . "/Front/Resources/",
                            ROOT_PROJECT . "/web/components/apps/" . strtolower($env) . "/" . strtolower($dir),
                            'directory',
                            $symlink
                        );
                    }
                }
            }
        } elseif ($appname !== '#none' && in_array($env, array("dev", "prod", "all"))) {
            if ($env == "all") {
                if (!is_dir(ROOT_PROJECT."/apps/".$appname."/Front/Resources/")) {
                    Output::displayAsError("Assets Manager Error: The resources folder for
                     $appname doesn't exist.");
                }
                if (file_exists(ROOT_PROJECT . "/apps/" . $appname . "/Front/Resources/")) {
                    Server::copy(
                        ROOT_PROJECT . "/apps/" . $appname . "/Front/Resources/",
                        ROOT_PROJECT . "/web/components/apps/dev/" . strtolower($appname),
                        'directory',
                        $symlink
                    );
                    Server::copy(
                        ROOT_PROJECT . "/apps/" . $appname . "/Front/Resources/",
                        ROOT_PROJECT . "/web/components/apps/prod/" . strtolower($appname),
                        'directory',
                        $symlink
                    );
                }
            } else {
                if (file_exists(ROOT_PROJECT . "/apps/" . $appname . "/Front/Resources/")) {
                    Server::copy(
                        ROOT_PROJECT . "/apps/" . $appname . "/Front/Resources/",
                        ROOT_PROJECT . "/web/components/apps/" . strtolower($env) . "/" . strtolower($appname),
                        'directory',
                        $symlink
                    );
                }
            }
        } elseif ($appname !== '#none' && $env == null) {
            if (!is_dir(ROOT_PROJECT."/apps/".$appname."/Front/Resources/")) {
                Output::displayAsError("Assets Manager Error: The resources folder
                 for $appname doesn't exist.");
            }
            if (file_exists(ROOT_PROJECT . "/apps/" . $appname . "/Front/Resources/")) {
                Server::copy(
                    ROOT_PROJECT . "/apps/" . $appname . "/Front/Resources/",
                    ROOT_PROJECT . "/web/components/apps/dev/" . strtolower($appname),
                    'directory',
                    $symlink
                );
                Server::copy(
                    ROOT_PROJECT . "/apps/" . $appname . "/Front/Resources/",
                    ROOT_PROJECT . "/web/components/apps/prod/" . strtolower($appname),
                    'directory',
                    $symlink
                );
            }
        } else {
            Output::displayAsError("Assets Manager Error \n  App name or
             env name does not exist. Referer to help command\n");
        }
    }

    public function __alter()
    {
        // TODO: Implement __alter() method.
    }

    public function __construct(array $options = array())
    {
        CoreManager::setCurrentModule("Assets Manager");
        if (empty($options)) {
            $this->__render();
        } else {
            $this->options = $options;
            $this->__render();
        }
    }
}
