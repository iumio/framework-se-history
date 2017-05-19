<?php


namespace iumioFramework\Masters;
use iumioFramework\Core\Base\Debug\Debug;
use iumioFramework\Core\Base\RtListener;
use iumioFramework\Core\Base\iumioEnvironment as Env;

/**
 * Class Routing
 * @package iumioFramework\Masters
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class Routing extends RtListener
{
    private $app;
    private $framework;
    private $isbase;

    /**
     * Register a router to iumioCore
     */

    /**
     * Routing constructor.
     * @param string $app App name
     * @param string $framework framework name
     * @param bool $isbase Check is a base app
     */
    public function __construct(string $app, string $framework, bool $isbase = false)
    {
        $this->app =  $app;
        $this->framework = $framework;
        $this->isbase = $isbase;
        parent::__construct($app);
    }

    /** Register a router
     * @return bool Is callable
     */
    public function routingRegister():bool
    {
        return ((parent::open($this->isbase) == 1)? true : false);
    }

    /** Get all route
     * @return array Route result
     */
    public function routes()
    {
        return ($this->router);
    }

    /** Remove blank data in array
     * @param array $routes Route array
     * @return array Array cleared
     */
    final static private function removeEmptyData(array $routes):array
    {
        $c = count($routes);
        for ($i = 0; $i < $c; $i++)
        {
            if (trim($routes[$i]) == "" || $routes[$i] == NULL || empty($routes[$i]))
                unset($routes[$i]);
        }
        return ($routes);
    }


    /** Get similarity routes
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
        $base = (isset($_SERVER['BASE']) && $_SERVER['BASE'] != "")? $_SERVER['BASE'] : "";


        if (isset($_SERVER['BASE']) && $_SERVER['BASE'] != "")
        {
            $remove = explode('/', $_SERVER['BASE']);
            $remove = array_values(self::removeEmptyData($remove));
            $remove = array_values($remove);
            for ($z = 0; $z < count($remove); $z++)
            {
                $key = array_search($remove[$z], $wRE);
                unset($wRE[$key]);
            }
            $wRE = array_values($wRE);

        }

        $script = "";
        if (strpos($webRoute, Env::getFileEnv(ENVIRONMENT)) !== false)
        {
            $script = "/".Env::getFileEnv(ENVIRONMENT);
            $key = array_search(Env::getFileEnv(ENVIRONMENT), $wRE);
            unset($wRE[$key]);
            $wRE = array_values($wRE);
        }

        if (($base.$script.$appRoute == $webRoute) || $base.$script.$appRoute."/" == $webRoute)
            return (array("is" => "same", "similar" => 100));

        $wRE = array_values(self::removeEmptyData($wRE));
        $aRE = array_values(self::removeEmptyData($aRE));


        if ((count($aRE) == count($wRE)) && count($aRE) > 0)
        {
            for($i = 0; $i < count($aRE); $i++) {
                if ($aRE[$i] != $wRE[$i])
                    array_push($paramValues, $wRE[$i]);
            }
        }


        if (isset($route['params']))
        {
            if (count($aRE) == count($wRE))
            {
                similar_text($base.$script.$appRoute, $webRoute, $pe1);
                similar_text($base.$script.$appRoute."/", $webRoute, $pe2);

                $simi = self::checkArrayRoute($aRE, $wRE);
                $pe = ($pe1 > $pe2)? $pe1 : $pe2;
                if ($simi == 0)
                    $pe = 0;
                return (array("is" => "partial", "result" => $paramValues, "similar" => $pe));
            }

        }
        return (array("is" => "nomatch", "similar" => 0));
    }

    /** Check similarity of array (Route request vs App route)
     * @param array $web Array web route
     * @param array $app Array app route
     * @return int Similarity point
     */
    final static private function checkArrayRoute(array $web, array $app):int
    {
        $score = 0;
        $first = 0;
        for($i = 0; $i < count($web); $i++)
        {
            if ($i == 0 && isset($web[0]) && isset($app[0]) && ($web[0] == $app[0]))
                $first = 1;
            else if ($first > 0 && $web[$i] == $app[$i])
                $score++;
        }

        return ($score);
    }


}
