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

namespace iumioFramework\Core\Additionnal\TaskBar;

use iumioFramework\Exception\Server\Server500;
use iumioFramework\Masters\MasterCore;

/**
 * Class TaskBar
 * @package vendor\iumio_framework\php\Core\Additional\TaskBar
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <danyrafina@gmail.com>
 */
class TaskBar
{

    private static $status = "off";

    /** Switch status of TaskBar (Switch 'off' or 'on')
     * @param string $status Status name
     * @throws Server500 If status not 'off' or 'on'
     * @return int Is a success
     */
    public static function switchStatus(string $status)
    {
        if ($status == "off") {
            self::$status = "off";
        } elseif ($status == "on") {
            self::$status = "on";
        } else {
            die("TaskBar : Undefined status '$status'. Status must be 'on' or 'off'. ");
        }
        return (1);
    }

    /** Get iumio TaskBar Status (Is enabled or not)
     * @return string Status name
     */
    public static function getStatus():string
    {
        return (self::$status);
    }

    /**
     * Get task bar html
     * @return string TASK BAR TEMPLATE | #none
     */
    public static function getTaskBar():string
    {
        if (self::getStatus() == "on") {
            return (self::taskbarTemplate());
        }
        return ("#none");
    }


    /**
     * Get task bar options
     * @return array TASK BAR TEMPLATE | empty array if status is off
     */
    public static function getTaskBarOptions():array
    {

        if (self::getStatus() == "on") {
            return (self::taskbarArrayTemplate());
        }
        return (array());
    }


    /** This is iumio task bar template html
     * @return string html taskbar | #none
     */
    private static function taskbarTemplate():string
    {
        try {
            $um =  new MasterCore();
            $str =  self::getCssTaskBar().'<!-- TaskBar component -->
                <div id="iumioTaskBarBlank"></div>
                <ul class="iumioTaskBar">
                <li class="flogo"><img src="'. WEB_FRAMEWORK.'/img/logo_white_small.png"/> </li>
                <li><a class="active" href="#"><strong>'.
                \iumioFramework\Core\Requirement\FrameworkCore::getInfo('VERSION')." ".
                \iumioFramework\Core\Requirement\FrameworkCore::getInfo('VERSION_EDITION_SHORT').
                ' - '. IUMIO_ENV.'</strong></a></li>
                <li><a href="#" class="active" ><strong>'.
                ((!defined('APP_CALL'))? "NO APP CALLED" : APP_CALL) .'</strong></a></li>
                <li> <a href="#" id="iumioTaskBarRequests" attr-href="'.
                $um->generateRoute(
                    "iumio_manager_logs_get",
                    null,
                    "ManagerApp",
                    true
                ).'"><i class="pe-7s-refresh icon-iumio-task"></i> 
                <span class="iumio-taskbar-text">No request</span></a></li>
                <li id="iumioTaskBarAssets" class="iumioTaskBarDropdown"><a href="#">
                <i class="pe-7s-file icon-iumio-task"></i>  <span class="iumio-taskbar-text">Assets</span></a>
                    <ul class="iumioTaskBarDropdownContent">
                        <li class="iumioTaskBarAssetsPublishAll" attr-href="'.
                $um->generateRoute(
                    "iumio_manager_assets_manager_publish",
                    array("env" => "all", "appname" => "_all"),
                    "ManagerApp",
                    true
                ).
                '">Clear all</li>
                        <li class="iumioTaskBarAssetsClearDev" attr-href="'.
                $um->generateRoute(
                    "iumio_manager_assets_manager_publish",
                    array("env" => "dev", "appname" => "_all"),
                    "ManagerApp",
                    true
                ).
                '">Publish dev</li>      
                        <li class="iumioTaskBarAssetsPublishProd" attr-href="'.
                $um->generateRoute(
                    "iumio_manager_assets_manager_publish",
                    array("env" => "prod", "appname" => "_all"),
                    "ManagerApp",
                    true
                ).
                '">Clear prod</li>
                        <li class="iumioTaskBarAssetsClearAll" attr-href="'.
                $um->generateRoute(
                    "iumio_manager_assets_manager_clear",
                    array("env" => "all", "appname" => "_all"),
                    "ManagerApp",
                    true
                ).
                '">Publish all</li>
                        <li class="iumioTaskBarAssetsPublishDev" attr-href="'.
                $um->generateRoute("iumio_manager_assets_manager_clear", array("env" =>
                    "dev", "appname" => "_all"), "ManagerApp", true).'">Clear dev</li>
                        <li class="iumioTaskBarAssetsClearProd" attr-href="'.
                $um->generateRoute("iumio_manager_assets_manager_clear", array("env" =>
                    "prod", "appname" => "_all"), "ManagerApp", true).'">Publish prod</li>
                    </ul>
                </li>
                <li><a href="#" id="iumioTaskBarEnaDisApp" attr-href="'.
                $um->generateRoute(
                    "iumio_manager_app_manager_get_simple_apps",
                    null,
                    "ManagerApp",
                    true
                ).'">
                <i class="pe-7s-switch icon-iumio-task"></i> <span class="iumio-taskbar-text">Change status</span>
                </a></li>
                <li><a href="'. $um->generateRoute(
                "iumio_manager_index",
                null,
                "ManagerApp",
                true
            ) .'">Go to manager</a></li>
                <li id="iumioTaskBarCacheClear" class="iumioTaskBarDropdown"><a href="#" >
                <i class="pe-7s-back icon-iumio-task"></i> <span class="iumio-taskbar-text">Clear cache</span></a>
                <ul class="iumioTaskBarDropdownContent">
                <li class="iumioTaskBarCacheClearAll" attr-href="'.
                $um->generateRoute(
                    "iumio_manager_cache_manager_remove_all",
                    null,
                    "ManagerApp",
                    true
                ).'">Clear all</li>
                <li class="iumioTaskBarCacheClearDev" attr-href="'.
                $um->generateRoute(
                    "iumio_manager_cache_manager_remove",
                    array("env" => "dev"),
                    "ManagerApp",
                    true
                ).'">Clear dev</li>
               <li class="iumioTaskBarCacheClearProd" attr-href="'.
                $um->generateRoute(
                    "iumio_manager_cache_manager_remove",
                    array("env" => "prod"),
                    "ManagerApp",
                    true
                ).'">Clear prod</li>
                </ul></li>
                <li style="float: right; list-style: none" class="" id="iumioTaskBarReduce">
                <a class="pe-7s-left-arrow" style="font-size: 16px"></a></li>
                </ul>
                <ul class="iumioTaskBar iumioTaskBarVSmall" style="display: none; width: 114px; padding: 0px 0px 0 0;">
                <li class="flogo"><img src="'. WEB_FRAMEWORK.'/img/logo_white_small.png"/>  </li>
                <li id="iumioTaskBarRestore" style="color: black;list-style: none; ">
                <a class="pe-7s-right-arrow" style="font-size: 16px"></a></li>
                </ul>'.self::getJsTaskBar();
            return ($str);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        return ("#none");
    }

    /** This is iumio task bar template options
     * @return array  taskbar options | #none
     */
    private static function taskbarArrayTemplate():array
    {
        $options = array();
        try {
            $um =  new MasterCore();
            $options['css']                 =  WEB_FRAMEWORK."assets/css/iumioTaskBar.css";
            $options['css_icon']            =  WEB_LIBS."iumio_manager/css/pe-icon-7-stroke.css";
            $options['js']                  =  WEB_FRAMEWORK."assets/js/iumioTaskBar.js";
            $options['logo']                =  WEB_FRAMEWORK."img/logo_white_small.png";
            $options['ve']                  =  \iumioFramework\Core\Requirement\FrameworkCore::
                getInfo('VERSION')." ".\iumioFramework\Core\Requirement\FrameworkCore::
                getInfo('VERSION_EDITION_SHORT');
            $options['env']                 =  IUMIO_ENV;
            $options['call_app']            =  ((!defined('APP_CALL'))? "NO APP CALLED" : APP_CALL);
            $options['manager']             =  $um->generateRoute(
                "iumio_manager_index",
                null,
                "ManagerApp",
                true
            );
            $options['cache_clear_all']     =  $um->generateRoute(
                "iumio_manager_cache_manager_remove_all",
                null,
                "ManagerApp",
                true
            );
            $options['cache_clear_dev']     =  $um->generateRoute(
                "iumio_manager_cache_manager_remove",
                array("env" => "dev"),
                "ManagerApp",
                true
            );
            $options['cache_clear_prod']    =  $um->generateRoute(
                "iumio_manager_cache_manager_remove",
                array("env" => "prod"),
                "ManagerApp",
                true
            );
            $options['publish_assets_all']  =  $um->generateRoute(
                "iumio_manager_assets_manager_publish",
                array("env" => "all", "appname" => "_all"),
                "ManagerApp",
                true
            );
            $options['publish_assets_dev']  =  $um->generateRoute(
                "iumio_manager_assets_manager_publish",
                array("env" => "dev", "appname" => "_all"),
                "ManagerApp",
                true
            );
            $options['publish_assets_prod'] =  $um->generateRoute(
                "iumio_manager_assets_manager_publish",
                array("env" => "prod", "appname" => "_all"),
                "ManagerApp",
                true
            );
            $options['clear_assets_all']    =  $um->generateRoute(
                "iumio_manager_assets_manager_clear",
                array("env" => "all", "appname" => "_all"),
                "ManagerApp",
                true
            );
            $options['clear_assets_dev']    =  $um->generateRoute(
                "iumio_manager_assets_manager_clear",
                array("env" => "dev", "appname" => "_all"),
                "ManagerApp",
                true
            );
            $options['clear_assets_prod']   =  $um->generateRoute(
                "iumio_manager_assets_manager_clear",
                array("env" => "prod", "appname" => "_all"),
                "ManagerApp",
                true
            );
            $options['all_simple_apps']     =  $um->generateRoute(
                "iumio_manager_app_manager_get_simple_apps",
                null,
                "ManagerApp",
                true
            );
            $options['get_logs']            =  $um->generateRoute(
                "iumio_manager_logs_get",
                null,
                "ManagerApp",
                true
            );
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        return ($options);
    }

    /** Get stylesheet file for TaskBar
     * @return string Stylesheet in html mode
     */
    public static function getCssTaskBar():string
    {
        if (self::getStatus() == "on") {
            return ("<link rel=\"stylesheet\" href=\"".WEB_FRAMEWORK."assets/css/iumioTaskBar.css\" />");
        }
        return ("");
    }


    /** Get javascript file for iumioTaskBar
     * @return string javascript in html mode
     */
    public static function getJsTaskBar():string
    {
        if (self::getStatus() == "on") {
            return ("<script type='text/javascript' src=\"".WEB_FRAMEWORK."assets/js/iumioTaskBar.js\"></script>");
        }
        return ("");
    }
}
