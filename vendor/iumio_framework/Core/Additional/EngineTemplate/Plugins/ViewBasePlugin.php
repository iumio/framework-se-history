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

namespace iumioFramework\Core\Additionnal\Template;

use iumioFramework\Core\Base\Debug\Debug;
use iumioFramework\Core\Requirement\Environment\FEnv;
use iumioFramework\Core\Requirement\Environment\FrameworkEnvironment;
use iumioFramework\Exception\Server\Server404;
use iumioFramework\Exception\Server\Exception500;
use iumioFramework\Exception\Server\Server500;
use iumioFramework\Exception\Server\Server600;
use iumioFramework\Exception\Server\Server700;
use iumioFramework\HttpRoutes\Routing;
use PHPMailer\PHPMailer\Exception;

/**
 * Class ViewBasePlugin
 * @package iumioFramework\Core\Additionnal\Template
 * @author RAFINA Dany <dany.rafina@iumio.com>
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */

class ViewBasePlugin
{

    /** Get an asset file
     * @param array $params Array which contains path file
     * @return string asset url
     * @throws \Exception
     */
    public static function webassets(array $params):string
    {
        return (FEnv::get("host.web.components.apps").strtolower(FEnv::get("framework.env")).
            "/".((isset($params['app']) && $params['app'] != "")? "min"."." :
                strtolower(FEnv::get("app.call")))."/".$params['path']);
    }

    /** Get framework infos
     * @param array $params Contains name params
     * @return string Return info
     * @throws Server500
     */
    public static function finfo(array $params):string
    {
        return (\iumioFramework\Core\Requirement\FrameworkCore::getInfo($params['name']));
    }

    /** Get system infos
     * @param array $params Contains name params
     * @return string Return info
     * @throws Server500
     */
    final public static function sinfo(array $params):string
    {
        return (\iumioFramework\Core\Requirement\FrameworkCore::getServerInfo($params['name']));
    }

    /** Get bootstrap javascript
     * @param array $params contains if minified file
     * @return string bootstrap script
     * @throws \Exception
     */
    final public static function btspjs(array $params):string
    {
        return ("<script type='text/javascript' src='".FEnv::get("host.web.components.libs").
            "bootstrap/js/bootstrap.".((isset($params['min']) &&
                $params['min'] == "yes")? "min"."." : "")."js'></script>");
    }

    /** Get skel javascript
     * @return string skel script
     * @throws Server500
     */
    final public static function skel():string
    {
        return ("<script type='text/javascript' src='".FEnv::get("host.web.components.libs")."skel/skel.min.js'></script>");
    }


    /** Get Direct Web Remote (util) javascript
     * @return string util script
     * @throws Server500
     */
    final public static function util():string
    {
        return ("<script type='text/javascript' src='".FEnv::get("host.web.components.libs")."dwr/util.js'></script>");
    }

    /** Get bootstrap css
     * @param array $params contains if minified file
     * @return string bootstrap css
     * @throws Server500
     */
    final public static function btspcss(array $params):string
    {
        return ("<link href='".FEnv::get("host.web.components.libs")."bootstrap/css/bootstrap.".
            ((isset($params['min']) && $params['min'] == "yes")?
                "min"."." : "")."css' rel='stylesheet' />");
    }

    /** Get animate.css
     * @param array $params contains if minified file
     * @return string animate.css
     * @throws Server500
     */
    final public static function animatecss(array $params):string
    {
        return ("<link href='".FEnv::get("host.web.components.libs")."animate.css/animate.".
            ((isset($params['min']) && $params['min'] == "yes")?
                "min"."." : "")."css' rel='stylesheet' />");
    }

    /** Get Jquery script
     * @param array $params contains if minified file
     * @return string jquery script
     * @throws Server500
     */
    final public static function jquery(array $params):string
    {
        return ("<script type='text/javascript' src='".FEnv::get("host.web.components.libs")."jquery/jquery.".
            ((isset($params['min']) &&
                $params['min'] == "yes")? "min"."." : "")."js'></script>");
    }

    /** Get css file
     * @param array $params Contains path param
     * @return string return css
     * @throws Server500
     */
    final public static function css(array $params)
    {
        return ("<link href='".FEnv::get("host.web.components.apps").
            strtolower(FEnv::get("framework.env"))."/".strtolower(FEnv::get("app.call"))."/".
            ((isset($params['path']))? $params['path']."." : "")."css' rel='stylesheet' />");
    }

    /** Get js file
     * @param array $params Contains path param
     * @return string return js
     * @throws Server500
     */
    final public static function js(array $params)
    {
        return ("<script type='text/javascript' src='".
            FEnv::get("host.web.components.apps").strtolower(FEnv::get("framework.env"))."/".
            strtolower(FEnv::get("app.call"))."/".((isset($params['path']))? $params['path']."." : "")."js'></script>");
    }

    /** Get css libs file
     * @param array $params Contains name param
     * @return string return css lib
     * @throws Server500
     */
    final public static function csslibs(array $params)
    {
        return ("<link href='".FEnv::get("host.web.components")."libs/".
            ((isset($params['name']))? $params['name']."." : "")."css' rel='stylesheet' />");
    }

    /** Get js libs file
     * @param array $params Contains name param
     * @return string return js lib
     * @throws Server500
     */
    final public static function jslibs(array $params)
    {
        return ("<script type='text/javascript' src='".FEnv::get("host.web.components.libs").
            ((isset($params['name']))? $params['name']."." : "")."js'></script>");
    }


    /** Get css manager file
     * @param array $params Contains name param
     * @return string return css manager
     * @throws Server500
     */
    final public static function cssmanager(array $params)
    {
        return ("<link href='".FEnv::get("host.web.components")."libs/iumio_manager/css/".
            ((isset($params['name']))? $params['name'].".".
                ((isset($params['min']) && $params['min'] == "yes")? "min"."." : "") : "")."css' rel='stylesheet' />");
    }

    /** Get js routing file
     * @return string return js routing file
     * @throws \Exception
     */
    final public static function rtfile()
    {
        $env = FrameworkEnvironment::getFileEnv(FEnv::get("framework.env"));
        if (strpos($_SERVER['REQUEST_URI'], $env) == false) {
            $env = "";
        } else {
            $env = "/".$env;
        }

        $url = $env;

        $base = (isset($_SERVER['SCRIPT_NAME']) && $_SERVER['SCRIPT_NAME'] != "")? $_SERVER['SCRIPT_NAME'] : "";

        if (strpos($_SERVER['REQUEST_URI'], FrameworkEnvironment::getFileEnv(FEnv::get("framework.env"))) == false) {
            $rm = explode('/', $base);
            $rm = array_values(Routing::removeEmptyData($rm));
            $rm = array_values($rm);
            $key = array_search(FrameworkEnvironment::getFileEnv(FEnv::get("framework.env")), $rm);
            unset($rm[$key]);
            $rm = array_values($rm);
            $base = implode("/", $rm);
            if (isset($base[0]) && $base[0] != "/") {
                $base = "/".$base;
            }
        }

        return ("<script type='text/javascript' src='".FEnv::get("host.web.components")."rt/config_files/".
            ((FEnv::get("app.is_components"))?
                "map.irt.base.js" : "map.irt.js")."'></script>\n".
                "<script type='text/javascript' src='".
                FEnv::get("host.web.components")."rt/libs/js/Rt.js' id='rt_app_referer' 
                referer-app='".FEnv::get("app.call")."' base-url='".$base.$url."'></script>");
    }

    /** Get js manager file
     * @param array $params Contains name param
     * @return string return js manager
     * @throws Server500
     */
    final public static function jsmanager(array $params)
    {
        return ("<script type='text/javascript' src='".FEnv::get("host.web.components")."libs/iumio_manager/js/".
            ((isset($params['name']))? $params['name'].".".((isset($params['min']) && $params['min'] == "yes")?
                    "min"."." : "") : "")."js'></script>");
    }

    /** Get image manager file
     * @param array $params Contains name param
     * @return string return image manager
     * @throws Server500
     */
    final public static function imgmanager(array $params)
    {
        return (FEnv::get("host.web.components")."libs/iumio_manager/img/".
            ((isset($params['name']))? $params['name'] : ""));
    }

    /** Get css iumio lib file
     * @param array $params Contains name param
     * @return string return css iumio lib
     * @throws Server500
     */
    final public static function cssiumio(array $params)
    {
        return ("<link href='".FEnv::get("host.web.components")."libs/iumio_framework/css/".
            ((isset($params['name']))? $params['name'].
                ".".((isset($params['min']) && $params['min'] == "yes")? "min"."." : "") : "").
            "css' rel='stylesheet' />");
    }

    /** Get font awesome font lib
     * @param array $params Contains name param
     * @return string return font awesome font lib path
     * @throws Server500
     */
    final public static function fontawesomefonts(array $params)
    {
        return (FEnv::get("host.web.components")."libs/font-awesome/fonts/".
            ((isset($params['name']))? $params['name'] : ""));
    }

    /** Get font awesome css lib
     * @param array $params Contains name param
     * @return string return font awesome css lib
     * @throws Server500
     */
    final public static function fontawesomecss(array $params)
    {
        return ("<link href='".FEnv::get("host.web.components")."libs/font-awesome/css/font-awesome.".
            ((isset($params['min']) &&
                $params['min'] == "yes")? "min"."." : "")."css' rel='stylesheet' />");
    }

    /** Get font awesome less lib
     * @param array $params Contains name param
     * @return string return font awesome less lib
     * @throws Server500
     *
     */
    final public static function fontawesomeless(array $params)
    {
        return ("<link href='".FEnv::get("host.web.components")."libs/font-awesome/less/".
            ((isset($params['name']))? $params['name'].".".
                ((isset($params['min']) && $params['min'] == "yes")? "min"."." : "") : "")."less' rel='stylesheet' />");
    }


    /** Get font awesome scss lib
     * @param array $params Contains name param
     * @return string return font awesome scss lib
     * @throws Server500
     */
    final public static function fontawesomescss(array $params)
    {
        return ("<link href='".FEnv::get("host.web.components")."libs/font-awesome/scss/.".
            ((isset($params['name']))? $params['name'].".".
                ((isset($params['min']) && $params['min'] == "yes")? "min"."." : "") : "")."less' rel='stylesheet' />");
    }

    /** Get js iumio lib file
     * @param array $params Contains name param
     * @return string return js iumio lib
     * @throws Server500
     */
    final public static function jsiumio(array $params)
    {
        return ("<script type='text/javascript' src='".FEnv::get("host.web.components")."libs/iumio_framework/js/".
            ((isset($params['name']))? $params['name'].".".((isset($params['min']) && $params['min'] == "yes")?
                    "min"."." : "") : "")."js'></script>");
    }

    /** Get img iumio lib file
     * @param array $params Contains name param
     * @return string return img iumio lib
     * @throws Server500
     */
    final public static function imgiumio(array $params)
    {
        return (FEnv::get("host.web.components")."libs/iumio_framework/img/".
            ((isset($params['name']))? $params['name'] : ""));
    }

    /** Get route url
     * @param array $params Contains name param
     * @return string return route url
     * @throws \Exception
     */
    final public static function route(array $params)
    {

        if (!FEnv::isset("framework.smarty.called")) {
            FEnv::set("framework.smarty.called", 1);
        }
        $im = new \iumioFramework\Masters\MasterCore();

        if (!isset($params['name'])){
            throw new \Exception("The parameter [name] is missing to generate a valid route", E_ERROR);
        }
        $route = ($im->generateRoute(((isset($params['name']))? $params['name'] : ""), ((isset($params['params']) &&
            !empty($params['params']))? $params['params']  : null), null, ((isset($params['component']) &&
            $params['component'] == "yes")? true  : false)));
        return ($route);
    }

    /** Get iumio taskbar
     * @return string taskbar
     */
    final public static function taskbar()
    {
        return(\iumioFramework\Core\Additionnal\TaskBar\TaskBar::getTaskBar());
    }
}
