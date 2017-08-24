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
        file_put_contents("animate.css", fopen("https://libs.framework.iumio.com/css/animate.css", 'r'));
        isM::create(self::$base_dir."web/components/libs/animate.css/", "directory");
        file_put_contents("animate.min.css", fopen("https://libs.framework.iumio.com/css/animate.min.css", 'r'));
        iSM::move(self::$base_dir."animate.css",self::$base_dir."web/components/libs/animate.css/animate.css");
        iSM::move(self::$base_dir."animate.min.css",self::$base_dir."web/components/libs/animate.css/animate.min.css");

        isM::create(self::$base_dir."web/components/libs/skel/", "directory");
        file_put_contents("skel.min.js", fopen("https://libs.framework.iumio.com/js/skel.min.js", 'r'));
        iSM::move(self::$base_dir."skel.min.js",self::$base_dir."web/components/libs/skel/skel.min.js");

        isM::create(self::$base_dir."web/components/libs/dwr/", "directory");
        file_put_contents("util.js", fopen("https://libs.framework.iumio.com/js/util.js", 'r'));
        iSM::move(self::$base_dir."util.js",self::$base_dir."web/components/libs/dwr/util.js");

        file_put_contents("demo.js", fopen("https://libs.framework.iumio.com/js/iumio_manager/demo.js", 'r'));
        iSM::move(self::$base_dir."demo.js",self::$base_dir."web/components/libs/iumio_manager/js/demo.js");

        file_put_contents("light-bootstrap-dashboard.css", fopen("https://libs.framework.iumio.com/css/light-bootstrap-dashboard.css", 'r'));
        iSM::move(self::$base_dir."light-bootstrap-dashboard.css",self::$base_dir."web/components/libs/iumio_manager/css/light-bootstrap-dashboard.css");

        file_put_contents("pe-icon-7-stroke.css", fopen("https://libs.framework.iumio.com/css/pe-icon-7-stroke.css", 'r'));
        iSM::move(self::$base_dir."pe-icon-7-stroke.css",self::$base_dir."web/components/libs/iumio_manager/css/pe-icon-7-stroke.css");

        file_put_contents("bootstrap-checkbox-radio-switch.js", fopen("https://libs.framework.iumio.com/js/bootstrap-checkbox-radio-switch.js", 'r'));
        iSM::move(self::$base_dir."bootstrap-checkbox-radio-switch.js",self::$base_dir."web/components/libs/iumio_manager/js/bootstrap-checkbox-radio-switch.js");

        file_put_contents("bootstrap-notify.js", fopen("https://libs.framework.iumio.com/js/bootstrap-notify.js", 'r'));
        iSM::move(self::$base_dir."bootstrap-notify.js",self::$base_dir."web/components/libs/iumio_manager/js/bootstrap-notify.js");

        file_put_contents("bootstrap-select.js", fopen("https://libs.framework.iumio.com/js/bootstrap-select.js", 'r'));
        iSM::move(self::$base_dir."bootstrap-select.js",self::$base_dir."web/components/libs/iumio_manager/js/bootstrap-select.js");

        file_put_contents("light-bootstrap-dashboard.js", fopen("https://libs.framework.iumio.com/js/light-bootstrap-dashboard.js", 'r'));
        iSM::move(self::$base_dir."light-bootstrap-dashboard.js",self::$base_dir."web/components/libs/iumio_manager/js/light-bootstrap-dashboard.js");


        file_put_contents("Pe-icon-7-stroke.eot", fopen("https://libs.framework.iumio.com/fonts/Pe-icon-7-stroke.eot", 'r'));
        iSM::move(self::$base_dir."Pe-icon-7-stroke.eot",self::$base_dir."web/components/libs/iumio_manager/fonts/Pe-icon-7-stroke.eot");


        file_put_contents("Pe-icon-7-stroke.svg", fopen("https://libs.framework.iumio.com/fonts/Pe-icon-7-stroke.svg", 'r'));
        iSM::move(self::$base_dir."Pe-icon-7-stroke.svg",self::$base_dir."web/components/libs/iumio_manager/fonts/Pe-icon-7-stroke.svg");


        file_put_contents("Pe-icon-7-stroke.ttf", fopen("https://libs.framework.iumio.com/fonts/Pe-icon-7-stroke.ttf", 'r'));
        iSM::move(self::$base_dir."Pe-icon-7-stroke.ttf",self::$base_dir."web/components/libs/iumio_manager/fonts/Pe-icon-7-stroke.ttf");


        file_put_contents("Pe-icon-7-stroke.woff", fopen("https://libs.framework.iumio.com/fonts/Pe-icon-7-stroke.woff", 'r'));
        iSM::move(self::$base_dir."Pe-icon-7-stroke.woff",self::$base_dir."web/components/libs/iumio_manager/fonts/Pe-icon-7-stroke.woff");


    }
}

Installer::removeComponentsDir();
Installer::downloadComponents();