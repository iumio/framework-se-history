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

namespace iumioFramework\Apps;
use iumioFramework\Core\Requirement\iumioUltimaCore;
use iumioFramework\Core\Base\Http\HttpListener;
use iumioFramework\Exception\Server\Server000;

/**
 * Class AppCore
 * @package iumioFramework\Apps
 * @author Dany Rafina <danyrafina@gmail.com>
 */
class AppCore extends iumioUltimaCore
{
    /**
     * AppCore constructor.
     * @param $env
     * @param $debug
     */

    public function __construct($env, $debug)
    {
        date_default_timezone_set('Europe/Paris');
        parent::__construct($env, $debug);
    }


    /** Get all app register on apps.json
     * @return array Apps register
     * @throws Server000
     */

    public function registerApps():array
    {
        $classes = $this->getClassFile();

        if (count((array)$classes) == 0) throw new Server000(
            new \ArrayObject(array("explain" => "No app is registered", "solution" => "Create an app")));
        $apps = array();
        foreach ($classes as $class => $val) {
            $val = (array)$val;
            $apps[$val['name']] =  array("enabled" =>$val['enabled'],
                "prefix" => (($val["prefix"] != "")? "/".$val["prefix"] : ""),  "appclass" => new $val['class']());
        }
        return $apps;
    }

    /**
     * @param HttpListener $request
     * @return int
     */
    public function dispatch(HttpListener $request):int
    {
        return (parent::dispatching($request));
    }
}