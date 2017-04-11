<?php


namespace iumioFramework\Masters;
use iumioFramework\Core\Base\Http\ParameterRequest;
use iumioFramework\Core\Additionnal\Template\iumioMustache;
use iumioFramework\Core\Requirement\iumioUltimaCore;
use iumioFramework\Core\Base\Database\iumioDatabaseAccess as IDA;
use iumioFramework\Exception\Server\Server500;

/**
 * Class iumioUltimaMaster
 * This is the parent master for all subclass
 * @package iumioFramework\Masters
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class iumioUltimaMaster
{
    protected $masterFirst = NULL;
    protected $appMastering = NULL;
    protected $doctrine = NULL;

    /** Set a file to master
     * @param mixed $himself
     * @return int
     */
    final protected function mastering($himself):int
    {
        $this->appMastering = APP_CALL;
        $this->masterFirst = $himself;
        return (1);
    }

    /** Get a service
     * @param string $service
     * @return mixed
     */
    protected function get(string $service)
    {
        switch ($service)
        {
            case 'request':
                return (new ParameterRequest())->get('request');
                break;
            case 'query':
                return (new ParameterRequest())->get('query');
                break;
        }
        return (NULL);
    }

    /** Show a view
     * @param string $view View name
     * @param array $options options to view
     * @throws \Exception Generate Exception
     */
    final protected function render(string $view, array $options = array())
    {
        $this->appMastering = APP_CALL;
        $m = iumioMustache::getMustacheInstance($this->appMastering);
        try
        {
            $tpl = $m->loadTemplate($view.iumioMustache::$viewExtention);
            $options = $this->declareEngineTemplateFunction($options);
            echo $tpl->render($options);
            exit();
        }
        catch (\Exception $exception)
        {
            throw new \Exception("iumioUltimaMaster Error : Cannot load ".$view." view file => ".$view.iumioMustache::$viewExtention." <br>".$exception);
        }

    }

    /** Get doctrine instance
     * @return UltimaDoctrine|null Doctrine instance or null
     */
    final protected function getDoctrine()
    {
        if ($this->doctrine == null)
            $this->doctrine = new UltimaDoctrine(APP_CALL);
        return ($this->doctrine);
    }


    /** Change views Render extension
     * @param string $ext new extention
     * @return bool
     */
    final protected function changeRenderExtention(string $ext):bool
    {
        iumioMustache::$viewExtention = $ext;
        return (true);
    }

    /** Enable all engine template function
     * @param array $options Some options
     * @return array Implemented options
     */
    final protected function declareEngineTemplateFunction(array $options):array
    {
        $options['webassets'] = function ($assets) { return (WEB_ASSETS.strtolower(APP_CALL)."/".$assets); };

        $options['f_info'] = function ($info) { return (iumioUltimaCore::getInfo($info)); };

        $options['s_info'] = function ($info) { return (iumioUltimaCore::getServerInfo($info)); };

        $options['btsp_js'] = function ($min = null) { return ("<script type='text/javascript' src='".WEB_LIBS."bootstrap/js/bootstrap.".(($min != null)? $min."." : "")."js'></script>"); };
        $options['btsp_css'] = function ($min = null) { return ("<link href='".WEB_LIBS."bootstrap/css/bootstrap.".(($min != null)? $min."." : "")."css' rel='stylesheet' />"); };

        $options['jquery'] = function ($min = null) { return ("<script type='text/javascript' src='".WEB_LIBS."jquery/jquery.".(($min != null)? $min."." : "")."js'></script>"); };

        $options['css'] = function ($assets) { return ("<link href='".WEB_ASSETS.strtolower(APP_CALL)."/".$assets.".css' rel='stylesheet' />"); };
        $options['js'] = function ($assets) { return ("<script type='text/javascript' src='".WEB_ASSETS.strtolower(APP_CALL)."/".$assets.".js'></script>"); };

        $options['css_libs'] = function ($assets) { return ("<link href='".WEB_COMPONENTS."libs/".$assets.".css' rel='stylesheet' />"); };
        $options['js_libs'] = function ($assets) { return ("<script type='text/javascript' src='".WEB_COMPONENTS."libs/".$assets.".js'></script>"); };

        $options['css_im'] = function ($assets) { return ("<link href='".WEB_COMPONENTS."libs/iumio_manager/css/".$assets.".css' rel='stylesheet' />"); };
        $options['js_im'] = function ($assets) { return ("<script type='text/javascript' src='".WEB_COMPONENTS."libs/iumio_manager/js/".$assets.".js'></script>"); };
        $options['img_im'] = function ($assets) { return (WEB_COMPONENTS."libs/iumio_manager/img/".$assets); };

        $options['css_iumio'] = function ($assets) { return ("<link href='".WEB_COMPONENTS."libs/iumio_framework/css/".$assets.".css' rel='stylesheet' />"); };
        $options['js_iumio'] = function ($assets) { return ("<script type='text/javascript' src='".WEB_COMPONENTS."libs/iumio_framework/js/".$assets.".js'></script>"); };
        $options['img_iumio'] = function ($assets) { return (WEB_COMPONENTS."libs/iumio_framework/img/".$assets); };

        $options['route'] = function ($routename) {  return ($this->generateRoute($routename)); };

        return $options;
    }

    /** Get Database service
     * @param string|null $name Database name
     * @return \PDO PDO instance (Connection instance)
     */
    final protected function getConnection(string $name = '#none'):\PDO
    {
        return (IDA::getDbInstance($name));
    }


    /** Generate route url
     * @param string $routename route name in routing file
     * @return string|NULL The generated route
     * @throws Server500
     */
    final protected function generateRoute(string $routename):string
    {
        $app = APP_CALL;
        $rt = new Routing($app, 'iumio', true);
        if (!$rt->routingRegister())
            throw new Server500(new \ArrayObject(array("solution" => "Please check all RT file", "explain" => "Cannot open your RT file")));
        foreach ($rt->routes() as $one)
        {
            if ($one['routename'] == $routename)
            {
                $env = ENVIRONMENT;
                if ($env == "DEV")
                    $env = "iumio_dev.php";
                else if ($env == "PREPROD")
                    $env = "iumio_preprod.php";
                else if ($env == "PROD")
                    $env = "iumio_prod.php";

                if (strpos($_SERVER['REQUEST_URI'], $env) == false)
                    $env = "";
                else
                    $env = "/".$env;

                return ($env.$one['path']);
            }
        }

        throw new Server500(new \ArrayObject(array("solution" => "Please check all RT file", "explain" => "No route for <span style='color: red;text-decoration: none'>".$routename."</span>")));
        return ("NRT");
    }

}