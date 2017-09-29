<?php

/*
 *
 * This is an iumio Framework component
 *
 * (c) RAFINA DANY <danyrafina@gmail.com>
 *
 * iumio Framework - iumio Components
 *
 * To get more information about licence, please check the licence file
 *
 */

namespace iumioFramework\Core\Requirement\FrameworkServices;

use iumioFramework\Core\Base\Json\JsonListener;
use iumioFramework\Core\Requirement\Patterns\SingletonPattern;
use iumioFramework\Exception\Server\Server500;

/**
 * Class Services
 * @package iumioFramework\Core\Requirement\FrameworkServices
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <danyrafina@gmail.com>
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
        $s = JsonListener::open(ELEMS.'config_files/core/services/services.json');
        foreach ($s->services as $one => $value) {
            array_push($this->services, array("name" => $one, "class" => $value));
        }
    }

    /** Get a service by name
     * @param string $name Service name
     * @return mixed The service object if exist
     * @throws Server500 Service does not exist
     */
    final public function getService(string $name)
    {
        $service_selected = null;
        foreach ($this->services as $one) {
            if ($one['name'] === $name) {
                $i = $one['class'];
                return (new $i());
            }
        }

        throw new Server500(new \ArrayObject(array("explain" =>
            "Undefined service : $name", "solution" => "Please register the $name service")));
    }
}
