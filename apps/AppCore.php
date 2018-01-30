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

namespace iumioFramework\Apps;

use iumioFramework\Core\Requirement\FrameworkCore;
use iumioFramework\Core\Base\Http\HttpListener;
use iumioFramework\Exception\Server\Server000;
use iumioFramework\Exception\Server\Exception500;

/**
 * Class AppCore
 * @package iumioFramework\Apps
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */
class AppCore extends FrameworkCore
{
    /**
     * AppCore constructor.
     * @param $env string Environment name
     * @param $debug
     * @throws \Exception
     */

    public function __construct(string $env, $debug)
    {
        parent::__construct($env, $debug);
    }


    /** Get all app register on apps.json
     * @return array Apps register
     * @throws Server000 If no app is registered
     */

    public function registerApps():array
    {
        $classes = $this->getClassFile();

        if (count((array)$classes) == 0) {
            throw new Server000(
                new \ArrayObject(array("explain" => "No app is registered", "solution" => "Create an app"))
            );
        }
        $apps = array();
        foreach ($classes as $class => $val) {
            $val = (array)$val;
            $apps[$val['name']] =  array("enabled" =>$val['enabled'],
                "prefix" => (($val["prefix"] != "")? "/".$val["prefix"] : ""),  "appclass" => new $val['class']());
        }
        return $apps;
    }
}
