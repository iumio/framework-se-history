<?php


namespace IumioFramework\Masters;
use IumioFramework\Core\Http\ParameterRequest;
use IumioFramework\Core\Additionnal\Template\IumioMustache;
use IumioFramework\Core\Requirement\IumioUltimaCore;
use IumioFramework\Core\Base\Database\IumioDatabaseAccess as IDA;
use IumioFramework\Core\Base\Database\ORM\IumioUltimaDoctrine as UltimaDoctrine;

/**
 * Class IumioUltimaMaster
 * This is the parent master for all subclass
 * @package iumioFramework\Masters
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class IumioUltimaMaster
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
    }

    /** Show a view
     * @param string $view View name
     * @param array $options options to view
     * @throws \Exception Generate Exception
     */
    final protected function render(string $view, array $options = array())
    {
        $this->appMastering = APP_CALL;
        $m = IumioMustache::getMustacheInstance($this->appMastering);
        try
        {
            $tpl = $m->loadTemplate($view.IumioMustache::$viewExtention);
            $options = $this->declareEngineTemplateFunction($options);
            echo $tpl->render($options);
            exit();
        }
        catch (\Exception $exception)
        {
            throw new \Exception("IumioUltimaMaster Error : Cannot load ".$view." view file => ".$view.IumioMustache::$viewExtention." <br>".$exception);
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
        IumioMustache::$viewExtention = $ext;
        return (true);
    }

    /** Enable all engine template function
     * @param array $options Some options
     * @return array Implemented options
     */
    final protected function declareEngineTemplateFunction(array $options):array
    {
        $options['webassets'] = function ($assets) { return (WEB_ASSETS.strtolower(APP_CALL)."/".$assets); };
        $options['framework_info'] = function ($info) { return (IumioUltimaCore::getInfo($info)); };
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

}