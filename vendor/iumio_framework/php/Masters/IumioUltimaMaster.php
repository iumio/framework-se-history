<?php


namespace IumioFramework\Masters;
use IumioFramework\Core\Http\ParameterRequest;
use IumioFramework\Core\Additionnal\Template\IumioMustache;


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
    final protected function render(string $view, array $options)
    {
        $this->appMastering = APP_CALL;
        $m = IumioMustache::getMustacheInstance($this->appMastering);
        try
        {
            $tpl = $m->loadTemplate($view.IumioMustache::$viewExtention);
            echo $tpl->render($options);
            exit();
        }
        catch (\Exception $exception)
        {
            throw new \Exception("IumioUltimaMaster Error : Cannot load ".$view." view file => ".$view.IumioMustache::$viewExtention." <br>".$exception);
        }

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

}