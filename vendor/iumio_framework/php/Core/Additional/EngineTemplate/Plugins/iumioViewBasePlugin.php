<?php

namespace iumioFramework\Core\Additionnal\Template;

/**
 * Class iumioViewBasePlugin
 * @package iumioFramework\Core\Additionnal\Template
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class iumioViewBasePlugin
{

    /** Get an asset file
     * @param array $params Array which contains path file
     * @return string asset url
     */
    static public function webassets(array $params):string
    {
        return (WEB_ASSETS.strtolower(APP_CALL)."/".$params['path']);
    }

    /** Get framework infos
     * @param array $params Contains name params
     * @return string Return info
     */
     static public function f_info(array $params):string
    {
        return (\iumioFramework\Core\Requirement\iumioUltimaCore::getInfo($params['name']));
    }

    /** Get system infos
     * @param array $params Contains name params
     * @return string Return info
     */
    final static public function s_info(array $params):string
    {
        return (\iumioFramework\Core\Requirement\iumioUltimaCore::getServerInfo($params['name']));
    }

    /** Get bootstrap javascript
     * @param array $params contains if minified file
     * @return string bootstrap script
     */
    final static public function btsp_js(array $params):string
    {
        return ("<script type='text/javascript' src='".WEB_LIBS."bootstrap/js/bootstrap.".((isset($params['min']) && $params['min'] == "yes")? "min"."." : "")."js'></script>");
    }

    /** Get bootstrap css
     * @param array $params contains if minified file
     * @return string bootstrap css
     */
    final static public function btsp_css(array $params):string
    {
        return ("<link href='".WEB_LIBS."bootstrap/css/bootstrap.".((isset($params['min']) && $params['min'] == "yes")? "min"."." : "")."css' rel='stylesheet' />");
    }

    /** Get Jquery script
     * @param array $params contains if minified file
     * @return string jquery script
     */
    final static public function jquery(array $params):string
    {
        return ("<script type='text/javascript' src='".WEB_LIBS."jquery/jquery.".((isset($params['min']) && $params['min'] == "yes")? "min"."." : "")."js'></script>");
    }

    /** Get css file
     * @param array $params Contains path param
     * @return string return css
     */
    final static public function css(array $params)
    {
        return ("<link href='".WEB_ASSETS.strtolower(APP_CALL)."/".((isset($params['path']))? $params['path']."." : "")."css' rel='stylesheet' />");
    }

    /** Get js file
     * @param array $params Contains path param
     * @return string return js
     */
    final static public function js(array $params)
    {
        return ("<script type='text/javascript' src='".WEB_ASSETS.strtolower(APP_CALL)."/".((isset($params['path']))? $params['path']."." : "")."js'></script>");
    }

    /** Get css libs file
     * @param array $params Contains name param
     * @return string return css lib
     */
    final static public function css_libs(array $params)
    {
        return ("<link href='".WEB_COMPONENTS."libs/".((isset($params['name']))? $params['name']."." : "")."css' rel='stylesheet' />");
    }

    /** Get js libs file
     * @param array $params Contains name param
     * @return string return js lib
     */
    final static public function js_libs(array $params)
    {
        return ("<script type='text/javascript' src='".WEB_COMPONENTS."libs/".((isset($params['name']))? $params['name']."." : "")."js'></script>");
    }

    /** Get css manager file
     * @param array $params Contains name param
     * @return string return css manager
     */
    final static public function css_im(array $params)
    {
        return ("<link href='".WEB_COMPONENTS."libs/iumio_manager/css/".((isset($params['name']))? $params['name']."." : "")."css' rel='stylesheet' />");
    }

    /** Get js manager file
     * @param array $params Contains name param
     * @return string return js manager
     */
    final static public function js_im(array $params)
    {
        return ("<script type='text/javascript' src='".WEB_COMPONENTS."libs/iumio_manager/js/".((isset($params['name']))? $params['name']."." : "")."js'></script>");
    }

    /** Get image manager file
     * @param array $params Contains name param
     * @return string return image manager
     */
    final static public function img_im(array $params)
    {
        return (WEB_COMPONENTS."libs/iumio_manager/img/".((isset($params['name']))? $params['name'] : ""));
    }

    /** Get css iumio lib file
     * @param array $params Contains name param
     * @return string return css iumio lib
     */
    final static public function css_iumio(array $params)
    {
        return ("<link href='".WEB_COMPONENTS."libs/iumio_framework/css/".((isset($params['name']))? $params['name']."." : "")."css' rel='stylesheet' />");
    }

    /** Get js iumio lib file
     * @param array $params Contains name param
     * @return string return js iumio lib
     */
    final static public function js_iumio(array $params)
    {
        return ("<script type='text/javascript' src='".WEB_COMPONENTS."libs/iumio_framework/js/".((isset($params['name']))? $params['name']."." : "")."js'></script>");
    }

    /** Get img iumio lib file
     * @param array $params Contains name param
     * @return string return img iumio lib
     */
    final static public function img_iumio(array $params)
    {
        return (WEB_COMPONENTS."libs/iumio_framework/img/".((isset($params['name']))? $params['name'] : ""));
    }

    /** Get route url
     * @param array $params Contains name param
     * @return string return route url
     */
    // MODIFIED
    final static public function route(array $params)
    {
        $im = new \iumioFramework\Masters\iumioUltimaMaster();
        return ($im->generateRoute(((isset($params['name']))? $params['name'] : ""), null, null, ((isset($params['component']) && $params['component'] == "yes")? true  : false)));
    }

    /** Get iumio taskbar
     * @return string taskbar
     */
    final static public function taskbar ()
    {
        return(\iumioFramework\Core\Additionnal\TaskBar\iumioTaskBar::getTaskBar());
    }

}