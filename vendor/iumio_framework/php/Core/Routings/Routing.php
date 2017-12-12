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

namespace iumioFramework\HttpRoutes;

use iumioFramework\Core\Base\Debug\Debug;
use iumioFramework\Core\Base\RtListener;
use iumioFramework\Core\Base\FrameworkEnvironment as Env;
use iumioFramework\Exception\Server\Server404;
use iumioFramework\Exception\Server\Server405;
use iumioFramework\Exception\Server\Server500;

/**
 * Class Routing
 * @package iumioFramework\Masters
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <danyrafina@gmail.com>
 */

class Routing extends RtListener
{
    private $app;
    private $prefix;
    private $isbase;

    /**
     * Register a router to FrameworkCore
     */

    /**
     * Routing constructor.
     * @param string $app App name
     * @param string|null $prefix app prefix name
     * @param bool $isbase Check is a base app
     */
    public function __construct(string $app, $prefix, bool $isbase = false)
    {
        $this->app =  $app;
        $this->prefix = $prefix;
        $this->isbase = $isbase;
        parent::__construct($app, $prefix);
    }

    /** Register a router
     * @return bool Is callable
     * @throws Server500
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
    final public static function removeEmptyData(array $routes):array
    {
        $c = count($routes);
        for ($i = 0; $i < $c; $i++) {
            if (trim($routes[$i]) == "" || $routes[$i] == null || empty($routes[$i])) {
                unset($routes[$i]);
            }
        }
        return ($routes);
    }


    /** Check match of Method request and method request route
     * @param  mixed $ctr Controller parameters
     * @param string $met_call Method request called
     * @return int Is a success
     * @throws Server405
     */
    public static function checkRouteMatchesMethod($ctr, string $met_call):int
    {
        if (isset($ctr["m_allow"]) && in_array("ALL", $ctr["m_allow"])) {
            return (1);
        } elseif (isset($ctr["m_allow"]) && is_string($ctr["m_allow"]) && $ctr["m_allow"] === $met_call) {
            return (1);
        } elseif (isset($ctr["m_allow"]) && is_array($ctr["m_allow"]) && in_array($met_call, $ctr["m_allow"])) {
            return (1);
        } else {
            throw new Server405(new \ArrayObject(array("explain" =>
                "Method request $met_call is not allowed for this route", "solution" =>
                "Route required methods : ".json_encode($ctr["m_allow"]))));
        }
    }

    /** Get similarity routes
     * @param $appRoute string the app route
     * @param $webRoute string The URI
     * @param $route array Params app name
     * @return array Similarity and match
     */
    public static function matches(string $appRoute, string $webRoute, array $route):array
    {
        $paramValues = array();

        if ($pos = strpos($webRoute, "/?")) {
            return (array("is" => "nomatch", "similar" => 0));
        }
        if ($pos = strpos($webRoute, "?")) {
            $webRoute = substr_replace($webRoute, '', $pos, (strlen($webRoute) - 1));
        }

        $aRE = explode('/', $appRoute);
        $wRE = explode('/', $webRoute);

        $base = (isset($_SERVER['SCRIPT_NAME']) && $_SERVER['SCRIPT_NAME'] != "")? $_SERVER['SCRIPT_NAME'] : "";

        $script = "";

        if (strpos($webRoute, Env::getFileEnv(IUMIO_ENV)) !== false) {
            $script = "/".Env::getFileEnv(IUMIO_ENV);
            $key = array_search(Env::getFileEnv(IUMIO_ENV), $wRE);
            unset($wRE[$key]);
            $wRE = array_values($wRE);
            $wRE = array_values(self::removeEmptyData($wRE));
            $webRoute = implode("/", $wRE);
            if (isset($webRoute[0]) && $webRoute[0] != "/") {
                $webRoute = "/".$webRoute;
            }
        }

        if (isset($_SERVER['SCRIPT_NAME']) && $_SERVER['SCRIPT_NAME'] != "") {
            $remove = explode('/', $_SERVER['SCRIPT_NAME']);
            $remove = array_values(self::removeEmptyData($remove));
            $remove = array_values($remove);

            for ($z = 0; $z < count($remove); $z++) {
                $key = array_search($remove[$z], $wRE);
                if ($key !== false) {
                    unset($wRE[$key]);
                }
            }

            $wRE = array_values($wRE);
            $wRE = array_values(self::removeEmptyData($wRE));
        }

        if (strpos($base, Env::getFileEnv(IUMIO_ENV)) !== false) {
            $rm = explode('/', $base);
            $rm = array_values(self::removeEmptyData($rm));
            $rm = array_values($rm);
            $key = array_search(Env::getFileEnv(IUMIO_ENV), $rm);
            unset($rm[$key]);
            $rm = array_values($rm);
            $base = implode("/", $rm);
            if (isset($base[0]) && $base[0] != "/") {
                $base = "/".$base;
            }
        }


        if (trim($webRoute) === "") {
            $webRoute = "/";
        }
        if (($base.$appRoute == $webRoute) || $base.$appRoute."/" == $webRoute) {
            return (array("is" => "same", "similar" => 100));
        }

        $wRE = array_values(self::removeEmptyData(array_values($wRE)));
        $aRE = array_values(self::removeEmptyData(array_values($aRE)));

        if ((count($aRE) == count($wRE)) && count($aRE) > 0) {
            for ($i = 0; $i < count($aRE); $i++) {
                if ($aRE[$i] != $wRE[$i]) {
                    array_push($paramValues, $wRE[$i]);
                }
            }
        }

        if (isset($route['params'])) {
            if (count($aRE) == count($wRE)) {
                similar_text($base.$script.$appRoute, $webRoute, $pe1);
                similar_text($base.$script.$appRoute."/", $webRoute, $pe2);

                $simi = self::checkArrayRoute($wRE, $aRE);
                $pe = ($pe1 > $pe2)? $pe1 : $pe2;

                if ($simi == 0) {
                    $pe = 0;
                }

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
    final private static function checkArrayRoute(array $web, array $app):int
    {
        $score = 0;
        $first = 0;
        for ($i = 0; $i < count($web); $i++) {
            if ($i == 0 && isset($web[0]) && isset($app[0]) && ($web[0] == $app[0])) {
                $first = 1;
            }
            if ($first > 0 && $web[$i] == $app[$i]) {
                $score++;
            }
            if ($first > 0 && strpos($app[$i], "{") != false &&
                strpos($app[$i], "}") != false && $web[$i] != "") {
                $score++;
            }
        }

        return ($score);
    }

    /**
     * @param array $a
     * @param array $b
     * @return array
     * @throws Server404
     * @throws Server500
     */
    final public function checkParametersTypeURI(array $a, array $b):array
    {
        $u = array();
        $keys1 = array_keys($a);
        $keysaf2 = array();
        $valuessaf2 = array();
        $keys2 = array();
        $values1 = array_values($a);
        $return = array();
        foreach ($b as $one) {
            $keysaf2[$one[0]] = $one[1];
        }
        $keys2 = array_map('trim', array_keys($keysaf2));

        if ($keys1 != $keys2) {
            throw new Server500(new \ArrayObject(array("explain" =>
                "Parameters type declaration does not matches with required parameters (".
                json_encode($keys2)." vs ".json_encode($keys1).")",
                "solution" => "Please check RT file")));
        }

        $values2 = array_map('trim', array_values($keysaf2));

        for ($i = 0; $i < count($values1); $i++) {
            $rs = $this->scalarTest(trim($values1[$i]), $values2[$i]);
            if (!$rs) {
                throw new Server404(new \ArrayObject(array("explain" =>
                    "Parameter [".$keys1[$i]."] scalar type cannot be convert to ".$values2[$i],
                    "solution" => "Please check RT file")));
            }
            $return[$keys1[$i]] = $this->scalarConvert(trim($values1[$i]), $values2[$i]);
        }
        return ($return);
    }
}
