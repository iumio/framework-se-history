<?php

/**
 *
 *  * This is an iumio Framework component
 *  *
 *  * (c) RAFINA DANY <dany.rafina@iumio.com>
 *  *
 *  * iumio Framework - iumio Components
 *  *
 *  * To get more information about licence, please check the licence file
 *
 */

namespace iumioFramework\Core\Additionnal\TaskBar;

use iumioFramework\Core\Requirement\Environment\FEnv;
use iumioFramework\Exception\Server\Server500;
use iumioFramework\Masters\MasterCore;

/**
 * Class TaskBar
 * @package vendor\iumio_framework\php\Core\Additional\TaskBar
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */
class TaskBar
{

    private static $status = "off";

    /** Switch status of TaskBar (Switch 'off' or 'on')
     * @param string $status Status name
     * @throws Exception500 If status not 'off' or 'on'
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
            $str =
                self::getCssTaskBar().'
<!-- TaskBar component -->
<div id="iumioTaskBarBlank">
</div>
<ul class="iumioTaskBar">
  <li class="flogo iumioTaskBarPulse">
    <img src="'. FEnv::get("host.web.components.libs.framework").'img/logo_white_small.png"/>
  </li>
  <li>
    <a class="active" href="#">
      <strong>'.
                \iumioFramework\Core\Requirement\FrameworkCore::getInfo('VERSION')." ".
                \iumioFramework\Core\Requirement\FrameworkCore::getInfo('VERSION_EDITION_SHORT').
                ' - '. ucfirst(FEnv::get("framework.env")).'
      </strong>
    </a>
  </li>
  <li>
    <a href="#" class="active" >
      <strong>'.
                ((!FEnv::isset("app.call"))? "No apps called" : FEnv::get("app.call")) .'
      </strong>
    </a>
  </li>
  <li> 
    <a href="#" id="iumioTaskBarRequests" attr-href="'.
                $um->generateRoute(
                    "iumio_manager_logs_get",
                    null,
                    "ManagerApp",
                    true
                ).'">
      <i class="pe-7s-refresh icon-iumio-task">
      </i> 
      <span class="iumio-taskbar-text">No requests
      </span>
    </a>
  </li>
  <li id="iumioTaskBarAssets" class="iumioTaskBarDropdown">
    <a href="#">
      <i class="pe-7s-file icon-iumio-task">
      </i>  
      <span class="iumio-taskbar-text">Assets
      </span>
    </a>
    <ul class="iumioTaskBarDropdownContent">
      <li>
        <table class="iumioTaskbarTable">
          <thead>
            <tr>
              <th colspan="3">Assets Manager - Actions
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="iumioTaskBarAssetsPublishAll" attr-href="'.
                $um->generateRoute(
                    "iumio_manager_assets_manager_publish",
                    array("env" => "all", "appname" => "_all"),
                    "ManagerApp",
                    true
                ).
                '"> 
                <i class="pe-7s-angle-right icon-iumio-task">
                </i> &nbsp; Publish all environment
              </td>
            </tr>
            <tr>
              <td class="iumioTaskBarAssetsPublishDev" attr-href="'.
                $um->generateRoute(
                    "iumio_manager_assets_manager_publish",
                    array("env" => "dev", "appname" => "_all"),
                    "ManagerApp",
                    true
                ).
                '"> 
                <i class="pe-7s-angle-right icon-iumio-task">
                </i> &nbsp; Publish dev
              </td>
            </tr>
            <tr>
              <td class="iumioTaskBarAssetsPublishProd" attr-href="'.
                $um->generateRoute(
                    "iumio_manager_assets_manager_publish",
                    array("env" => "prod", "appname" => "_all"),
                    "ManagerApp",
                    true
                ).
                '"> 
                <i class="pe-7s-angle-right icon-iumio-task">
                </i> &nbsp; Publish prod
              </td>
            </tr>
            <tr>
              <td class="iumioTaskBarAssetsClearAll" attr-href="'.
                $um->generateRoute(
                    "iumio_manager_assets_manager_clear",
                    array("env" => "all", "appname" => "_all"),
                    "ManagerApp",
                    true
                ).
                '"> 
                <i class="pe-7s-angle-right icon-iumio-task">
                </i> &nbsp; Clear all environment
              </td>
            </tr>
            <tr>
              <td class="iumioTaskBarAssetsClearDev" attr-href="'.
                $um->generateRoute(
                    "iumio_manager_assets_manager_clear",
                    array("env" => "dev", "appname" => "_all"),
                    "ManagerApp",
                    true
                ).
                '" >
                <i class="pe-7s-angle-right icon-iumio-task">
                </i> &nbsp; Clear dev
              </td>
            </tr>
            <tr>
              <td class="iumioTaskBarAssetsClearProd" attr-href="'.
                $um->generateRoute(
                    "iumio_manager_assets_manager_clear",
                    array("env" => "prod", "appname" => "_all"),
                    "ManagerApp",
                    true
                ).
                '" > 
                <i class="pe-7s-angle-right icon-iumio-task">
                </i> &nbsp; Clear prod
              </td>
            </tr>
          </tbody>
        </table>
      </li>
    </ul>
  </li>
  <li>
    <a href="#" id="iumioTaskBarEnaDisApp" attr-href="'.
                $um->generateRoute(
                    "iumio_manager_app_manager_get_simple_apps",
                    null,
                    "ManagerApp",
                    true
                ).'">
      <i class="pe-7s-switch icon-iumio-task">
      </i> 
      <span class="iumio-taskbar-text">Change status
      </span>
    </a>
  </li>
  <li>
    <a href="'. $um->generateRoute(
                    "iumio_manager_index",
                    null,
                    "ManagerApp",
                    true
                ) .'">Go to manager
    </a>
  </li>
  <li id="iumioTaskBarCacheClear" class="iumioTaskBarDropdown">
    <a href="#" >
      <i class="pe-7s-back icon-iumio-task">
      </i> 
      <span class="iumio-taskbar-text">Clear cache
      </span>
    </a>
    <ul class="iumioTaskBarDropdownContent">
      <li>
        <table class="iumioTaskbarTable">
          <thead>
            <tr>
              <th colspan="3">Cache Manager - Actions
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="iumioTaskBarCacheClearAll" attr-href="'.
                $um->generateRoute(
                    "iumio_manager_cache_manager_remove_all",
                    null,
                    "ManagerApp",
                    true
                ).'"> 
                <i class="pe-7s-angle-right icon-iumio-task">
                </i> &nbsp; Clear all environment
              </td>
            </tr>
            <tr>
              <td class="iumioTaskBarCacheClearDev" attr-href="'.
                $um->generateRoute(
                    "iumio_manager_cache_manager_remove",
                    array("env" => "dev"),
                    "ManagerApp",
                    true
                ).'"> 
                <i class="pe-7s-angle-right icon-iumio-task">
                </i> &nbsp; Clear dev
              </td>
            </tr>
            <tr>
              <td class="iumioTaskBarCacheClearProd" attr-href="'.
                $um->generateRoute(
                    "iumio_manager_cache_manager_remove",
                    array("env" => "prod"),
                    "ManagerApp",
                    true
                ).'"> 
                <i class="pe-7s-angle-right icon-iumio-task">
                </i> &nbsp; Clear prod
              </td>
            </tr>
          </tbody>
        </table>
      </li>
    </ul>
  </li>
  <li style="float: right; list-style: none" class="" id="iumioTaskBarReduce">
    <a class="pe-7s-left-arrow" style="font-size: 15px">
    </a>
  </li>
</ul>
<ul class="iumioTaskBar iumioTaskBarVSmall" style="display: none; width: 114px; padding: 0px 0px 0 0;">
  <li class="flogo iumioTaskBarPulse">
    <img src="'. FEnv::get("host.web.components.libs.framework").'/img/logo_white_small.png"/>  
  </li>
  <li id="iumioTaskBarRestore" style="color: black;list-style: none; ">
    <a class="pe-7s-right-arrow" style="font-size: 15px">
    </a>
  </li>
</ul>';
            $str .= "\n".self::getJsTaskBar()."\n";
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
            $options['css']                 =  FEnv::get("host.web.components.libs.framework")."assets/css/iumioTaskBar.css";
            $options['css_icon']            =  FEnv::get("host.web.components.libs.framework")."iumio_manager/css/pe-icon-7-stroke.css";
            $options['js']                  =  FEnv::get("host.web.components.libs.framework")."assets/js/iumioTaskBar.js";
            $options['logo']                =  FEnv::get("host.web.components.libs.framework")."img/logo_white_small.png";
            $options['ve']                  =  \iumioFramework\Core\Requirement\FrameworkCore::
                getInfo('VERSION')." ".\iumioFramework\Core\Requirement\FrameworkCore::
                getInfo('VERSION_EDITION_SHORT');
            $options['env']                 =  FEnv::get("framework.env");
            $options['call_app']            =  ((!FEnv::isset("app.call"))? "No apps called" : FEnv::get("app.call"));
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
     * @throws Server500
     */
    public static function getCssTaskBar():string
    {
        if (self::getStatus() == "on") {
            return ("<link rel=\"stylesheet\" href=\"".
                FEnv::get("host.web.components.libs.framework")."assets/css/iumioTaskBar.css\" />");
        }
        return ("");
    }


    /** Get javascript file for iumioTaskBar
     * @return string javascript in html mode
     * @throws Server500
     */
    public static function getJsTaskBar():string
    {
        if (self::getStatus() == "on") {
            return ("<script type='text/javascript' src=\"".
                FEnv::get("host.web.components.libs.framework")."assets/js/iumioTaskBar.js\"></script>");
        }
        return ("");
    }
}
