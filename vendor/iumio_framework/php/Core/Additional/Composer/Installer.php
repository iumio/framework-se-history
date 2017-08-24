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

namespace iumioFramework\Composer;
include_once __DIR__.'/../../ServerManager/iumioServerManager.php';

use iumioFramework\Core\Additionnal\Server\iumioServerManager as iSM;

/**
 * Class Installer
 * @package iumioFramework\Composer
 */
class Installer
{
    static public $base_dir = __DIR__.'/../../../../../../';

    /**
     * Remove components dir in root directory
     */
    final static public function removeComponentsDir()
    {
        iSM::delete(self::$base_dir."components", "directory");
    }

    /**
     * Download required libs for iumio framework
     */
    final static public function downloadComponents()
    {
        file_put_contents("animate.css", fopen("https://raw.githubusercontent.com/daneden/animate.css/master/animate.css", 'r'));
        isM::create(self::$base_dir."web/components/libs/animate.css/", "directory");
        file_put_contents("animate.min.css", fopen("https://raw.githubusercontent.com/daneden/animate.css/master/animate.min.css", 'r'));
        iSM::move(self::$base_dir."animate.css",self::$base_dir."web/components/libs/animate.css/animate.css");
        iSM::move(self::$base_dir."animate.min.css",self::$base_dir."web/components/libs/animate.css/animate.min.css");

    }
}

Installer::removeComponentsDir();
Installer::downloadComponents();