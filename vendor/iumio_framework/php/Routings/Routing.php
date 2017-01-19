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


    /** Get simularity routes
     * @param $appRoute string the app route
     * @param $webRoute string The URI
     * @param $route array Params app name
     * @return array Similarity and match
     */
    static public function matches(string $appRoute, string $webRoute, array $route):array
    {
        $paramValues = array();
        $aRE = explode('/', $appRoute);
        $wRE = explode('/', $webRoute);

        if ($appRoute == $webRoute)
            return (array("is" => "same", "similar" => 100));

        if ((count($aRE) == count($wRE)) && count($aRE) > 0)
        {
            for($i = 0; $i < count($aRE); $i++) {
                if ($aRE[$i] != $wRE[$i]) array_push($paramValues, $wRE[$i]);
            }
        }

        if (isset($route['params']))
        {
            if (count($paramValues) == count($route['params'])) {
                similar_text($appRoute, $webRoute, $pe);
                return (array("is" => "partial", "result" => $paramValues, "similar" => $pe));
            }
        }
        return (array("is" => "nomatch", "similar" => 0));
    }

}

