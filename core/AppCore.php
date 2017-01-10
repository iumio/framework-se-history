<?php

use IumioFramework\Core\Requirement\IumAppCore;

/**
 * Class AppCore
 */

class AppCore implements IumioAppCore
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

    /**
     * @return array
     */

    public function registerApps()
    {
        $apps = array(
            new \DefaultApp\DefaultApp()
        );

        return $apps;
    }

    public function getPrimary()
    {

    }

}