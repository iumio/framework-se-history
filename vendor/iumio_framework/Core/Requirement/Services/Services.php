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

namespace iumioFramework\Core\Requirement\FrameworkServices;

use iumioFramework\Core\Base\Json\JsonListener;
use iumioFramework\Core\Requirement\Environment\FEnv;
use iumioFramework\Core\Requirement\Patterns\SingletonPattern;
use iumioFramework\Exception\Server\Server500;

/**
 * Class Services
 * @package iumioFramework\Core\Requirement\FrameworkServices
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */

class Services extends SingletonPattern
{
    /**
     * @var array Services list
     */
    protected $services = array();

    /**
     * Services constructor.
     * Load all services
     */
    protected function __construct()
    {
        $this->loadServices();
    }

    /**
     * Load all service in services.json
     */
    final private function loadServices()
    {
        $s = JsonListener::open(FEnv::get("framework.config.core.services.file"));

        foreach ($s as $one => $value) {
            array_push($this->services, array("name" => $one, "content" => $value));
        }
    }

    /** Get a service by name
     * @param string $name Service name
     * @return mixed The service object if exist
     * @throws Server500 Service does not exist
     */
    final public function get(string $name)
    {
        $service_selected = null;
        foreach ($this->services as $one => $val) {
            if ($val['name'] === $name) {
                if (!in_array($val['content']->status, array("enabled", "disabled"))) {
                    throw new Server500(new \ArrayObject(array("explain" =>
                        "Undefined status [ ".$val['content']->status." ] for ".$val['name']." service",
                        "solution" => "Please set the status [disabled] or [enabled]")));
                }
                if ($val['content']->status == "disabled") {
                    throw new Server500(new \ArrayObject(array("explain" =>
                        "The service [ ".$val['name']." ] is currently disabled ",
                        "solution" => "Please set the status [enabled] to enable the service")));
                }
                $i = $val['content']->namespace;
                return (new $i());
            }
        }

        throw new Server500(new \ArrayObject(array("explain" =>
            "Undefined service : $name", "solution" => "Please register the [$name] service")));
    }
}
