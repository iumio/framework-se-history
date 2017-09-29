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

include_once __DIR__.'/../../ServerManager/ServerManager.php';

use iumioFramework\Core\Additionnal\Server\ServerManager as iSM;

/**
 * Class Uninstaller
 * @package iumioFramework\Composer
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <danyrafina@gmail.com>
 */
class Uninstaller
{
    static public $base_dir = __DIR__.'/../../../../../../';

    /**
     * Remove required libs for iumio framework
     */
    final public static function removeComponents()
    {
        isM::delete(self::$base_dir."web/components/libs/animate.css/", "directory");

        isM::delete(self::$base_dir."web/components/libs/skel/", "directory");

        isM::delete(self::$base_dir."vendor/iumio_framework/php/Core/Additional/Manager/Module/
        AppManager/AppTemplate/template/{appname}/Front/Resources/public/js", "directory");

        isM::delete(self::$base_dir."web/components/libs/dwr/", "directory");

        isM::delete(self::$base_dir."web/components/libs/iumio_manager/js/demo.js", "file");

        isM::delete(
            self::$base_dir."web/components/libs/iumio_manager/css/light-bootstrap-dashboard.css",
            "file"
        );

        iSM::delete(self::$base_dir."web/components/libs/iumio_manager/css/pe-icon-7-stroke.css", "file");

        iSM::delete(
            self::$base_dir."web/components/libs/iumio_manager/js/bootstrap-checkbox-radio-switch.js",
            "file"
        );

        iSM::delete(self::$base_dir."web/components/libs/iumio_manager/js/bootstrap-notify.js", "file");

        iSM::delete(self::$base_dir."web/components/libs/iumio_manager/js/bootstrap-select.js", "file");

        iSM::delete(
            self::$base_dir."web/components/libs/iumio_manager/js/light-bootstrap-dashboard.js",
            "file"
        );

        iSM::delete(self::$base_dir."web/components/libs/iumio_manager/fonts/Pe-icon-7-stroke.eot", "file");

        iSM::delete(self::$base_dir."web/components/libs/iumio_manager/fonts/Pe-icon-7-stroke.svg", "file");

        iSM::delete(self::$base_dir."web/components/libs/iumio_manager/fonts/Pe-icon-7-stroke.ttf", "file");

        iSM::delete(self::$base_dir."web/components/libs/iumio_manager/fonts/Pe-icon-7-stroke.woff", "file");

        iSM::delete(self::$base_dir."vendor/libs/smarty", "directory");

        iSM::delete(self::$base_dir."vendor/libs/phpmailer", "directory");

        iSM::delete(self::$base_dir."web/components/libs/bootstrap", "directory");

        iSM::delete(self::$base_dir."web/components/libs/font-awesome", "directory");

        iSM::delete(self::$base_dir."web/components/libs/jquery", "directory");

        iSM::move(
            self::$base_dir."web/components/libs/iumio_manager/js/main.js",
            self::$base_dir."web/components/libs/iumio_manager/js/main.js.iumio"
        );

        iSM::move(
            self::$base_dir."web/components/libs/iumio_framework/assets/js/iumioTaskBar.js",
            self::$base_dir."web/components/libs/iumio_framework/assets/js/iumioTaskBar.js.iumio"
        );

        iSM::move(
            self::$base_dir."web/components/rt/libs/js/Rt.js",
            self::$base_dir."web/components/rt/libs/js/Rt.js.iumio"
        );

        @iSM::delete(self::$base_dir."web/components/rt/config_files/map.rt.js", "file");

        @iSM::delete(self::$base_dir."web/components/rt/config_files/map.rt.base.js", "file");
    }
}

Uninstaller::removeComponents();
