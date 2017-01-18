<?php


namespace IumioFramework\Masters;
use IumioFramework\Core\Base\Debug\Debug;
use IumioFramework\Core\Base\RtListener;

/**
 * Class Routing
 * @package IumioFramework\Masters
 */

class Routing extends RtListener
{
    private $app;
    private $framework;

    /**
     * Register a router to IumioCore
     */

    /**
     * Routing constructor.
     * @param string $app
     * @param string $framework
     */
    public function __construct(string $app, string $framework)
    {
        $this->app =  $app;
        $this->framework = $framework;
        parent::__construct($app);
    }

    /**
     * @return bool
     */
    public function routingRegister():bool
    {
       return ((parent::open() == 1)? true : false);
    }

    /**
     *
     */
    public function routes()
    {
        return ($this->router);
    }


}

