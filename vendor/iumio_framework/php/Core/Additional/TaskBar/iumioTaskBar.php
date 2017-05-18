<?php


namespace iumioFramework\Core\Additionnal\TaskBar;
use iumioFramework\Exception\Server\Server500;
use iumioFramework\Masters\iumioUltimaMaster;

/**
 * Class iumioTaskBar
 * @package vendor\iumio_framework\php\Core\Additional\TaskBar
 * @author RAFINA Dany <danyrafina@gmail.com>
 */
class iumioTaskBar
{

    private static $status = "off";

    /** Switch status of iumioTaskBar (Switch 'off' or 'on')
     * @param string $status Status name
     * @throws Server500 If status not 'off' or 'on'
     * @return int Is a success
     */
    static public function switchStatus(string $status)
    {
        if ($status == "off")
            self::$status = "off";
        elseif ($status == "on")
            self::$status = "on";
        else
            die("iumioTaskBar : Undefined status '$status'. Status must be 'on' or 'off'. ");
        return (1);
    }

    /** Get iumio TaskBar Status (Is enabled or not)
     * @return string Status name
     */
    static public function getStatus():string
    {
        return (self::$status);
    }

    /**
     * Get task bar html
     * @return string TASK BAR TEMPLATE | #none
     */
    static public function getTaskBar():string
    {

        if (self::getStatus() == "on")
            return (self::taskbarTemplate());
        return ("#none");
    }


    /**
     * Get task bar options
     * @return array TASK BAR TEMPLATE | empty array if status is off
     */
    static public function getTaskBarOptions():array
    {

        if (self::getStatus() == "on")
            return (self::taskbarArrayTemplate());
        return (array());
    }


    /** This is iumio task bar template html
     * @return string html taskbar | #none
     */
    static private function taskbarTemplate():string
    {
        try
        {
            $um =  new iumioUltimaMaster();
            $str =  self::getCssTaskBar().'<!-- iumioTaskBar component -->
                <div id="iumioTaskBarBlank" style="clear: both; height: 70px; display: block;"></div>
                <ul class="iumioTaskBar">
                <li class="flogo"><img src="'. WEB_FRAMEWORK.'../iumio_framework/img/icon-iumio-single.png"/> </li>
                <li><a class="active" href="#"><strong>'. \iumioFramework\Core\Requirement\iumioUltimaCore::getInfo('VERSION')." ".\iumioFramework\Core\Requirement\iumioUltimaCore::getInfo('VERSION_EDITION_SHORT').'</strong></a></li>
                <li><a href="#" class="active">'. ENVIRONMENT.'</a></li>
                <li><a href="#" class="active"><strong>'. ((!defined('APP_CALL'))? "NO APP CALLED" : APP_CALL) .'</strong></a></li>
                <li><a href="#" id="iumioTaskBarPublishAssets" attr-href="'.$um->generateRoute("iumio_manager_assets_manager_publish", null, "ManagerApp", true).'">Publish all assets</a></li>
                <li><a href="#" id="iumioTaskBarSwitchApp" attr-href="'.$um->generateRoute("iumio_manager_app_manager_get_simple_apps", null, "ManagerApp", true).'">Switch to default</a></li>
                <li><a href="'. $um->generateRoute("iumio_manager_index", null, "ManagerApp", true) .'">Go to manager</a></li>
                <li id="iumioTaskBarCacheClear" class="iumioTaskBarDropdown"><a href="#" >Clear cache</a>
                <ul class="iumioTaskBarDropdownContent">
                <li class="iumioTaskBarCacheClearAll" attr-href="'.$um->generateRoute("iumio_manager_cache_manager_remove_all", null, "ManagerApp", true).'">All</li>
                <li class="iumioTaskBarCacheClearDev" attr-href="'.$um->generateRoute("iumio_manager_cache_manager_remove", array("env" => "dev"), "ManagerApp", true).'">Dev</li>
                <li class="iumioTaskBarCacheClearPreprod" attr-href="'.$um->generateRoute("iumio_manager_cache_manager_remove", array("env" => "preprod"), "ManagerApp", true).'">Preprod</li>
               <li class="iumioTaskBarCacheClearProd" attr-href="'.$um->generateRoute("iumio_manager_cache_manager_remove", array("env" => "prod"), "ManagerApp", true).'">Prod</li>
                </ul></li>
                <li style="float: right; list-style: none" class="active" id="iumioTaskBarReduce"><a><strong>></strong></a></li>
                </ul>
                <ul class="iumioTaskBar iumioTaskBarVSmall" style="display: none; width: 110px; padding: 0px 0px 0 0;">
                <li class="flogo"><img src="'. WEB_FRAMEWORK.'../iumio_framework/img/icon-iumio-single.png"/> </li>
                <li id="iumioTaskBarRestore" style="color: black;list-style: none; "><a><strong style="color: red">></strong></a></li>
                </ul>'.self::getJsTaskBar();
            return ($str);
        }
        catch (\Exception $e)
        {
            echo $e->getMessage();
        }
        return ("#none");

    }

    /** This is iumio task bar template options
     * @return array  taskbar options | #none
     */
    static private function taskbarArrayTemplate():array
    {
        $options = array();
        try
        {

            $um =  new iumioUltimaMaster();
            $options['css']                 =  WEB_FRAMEWORK."theme/assets/css/iumioTaskBar.css";
            $options['js']                  =  WEB_FRAMEWORK."theme/assets/js/iumioTaskBar.js";
            $options['logo']                =  WEB_FRAMEWORK."../iumio_framework/img/icon-iumio-single.png";
            $options['ve']                  =  \iumioFramework\Core\Requirement\iumioUltimaCore::getInfo('VERSION')." ".\iumioFramework\Core\Requirement\iumioUltimaCore::getInfo('VERSION_EDITION_SHORT');
            $options['env']                 =  ENVIRONMENT;
            $options['call_app']            =  ((!defined('APP_CALL'))? "NO APP CALLED" : APP_CALL);
            $options['manager']             =  $um->generateRoute("iumio_manager_index", null, "ManagerApp", true);
            $options['cache_clear_all']     =  $um->generateRoute("iumio_manager_cache_manager_remove_all", null, "ManagerApp", true);
            $options['cache_clear_dev']     =  $um->generateRoute("iumio_manager_cache_manager_remove", array("env" => "dev"), "ManagerApp", true);
            $options['cache_clear_preprod'] =  $um->generateRoute("iumio_manager_cache_manager_remove", array("env" => "preprod"), "ManagerApp", true);
            $options['cache_clear_prod']    =  $um->generateRoute("iumio_manager_cache_manager_remove", array("env" => "prod"), "ManagerApp", true);
            $options['publish_assets']      =  $um->generateRoute("iumio_manager_assets_manager_publish", null, "ManagerApp", true);
            $options['all_simple_apps']     =  $um->generateRoute("iumio_manager_app_manager_get_simple_apps", null, "ManagerApp", true);

        }
        catch (\Exception $e)
        {
            echo $e->getMessage();
        }
        return ($options);

    }

    /** Get stylesheet file for iumioTaskBar
     * @return string Stylesheet in html mode
     */
    static public function getCssTaskBar():string
    {
        if (self::getStatus() == "on")
            return ("<link rel=\"stylesheet\" href=\"".WEB_FRAMEWORK."theme/assets/css/iumioTaskBar.css\" />");
        return ("");
    }


    /** Get javascript file for iumioTaskBar
     * @return string javascript in html mode
     */
    static public function getJsTaskBar():string
    {
        if (self::getStatus() == "on")
            return ("<script type='text/javascript' src=\"".WEB_FRAMEWORK."theme/assets/js/iumioTaskBar.js\"></script>");
        return ("");
    }

}