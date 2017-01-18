<?php


namespace IumioFramework\Masters;
use IumioFramework\Core\Base\ParameterBag;
use IumioFramework\Core\Additionnal\Template\IumioMustache;

/**
 * Class IumioUltimaMaster
 * This is the parent master for all subclass
 * @package iumioFramework\Masters
 */

class IumioUltimaMaster
{
    protected $masterFirst = NULL;
    protected $appMastering = NULL;

    /**
     * @param mixed $himself
     * @return int
     */
    final protected function mastering($himself):int
    {
        $this->appMastering = APP_CALL;
        $this->masterFirst = $himself;
        return (1);
    }

    /**
     * @param string $service
     * @return mixed
     */
    protected function get(string $service)
    {
        switch ($service)
        {
            case 'request':
                return (new ParameterBag())->get('request');
                break;
            case 'query':
                return (new ParameterBag())->get('query');
                break;
        }
    }

    /**
     * @param string $view
     * @param array $options
     * @throws \Exception
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