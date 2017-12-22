<?php

/**
 *
 *  * This is an iumio Framework component
 *  *
 *  * (c) RAFINA DANY <danyrafina@gmail.com>
 *  *
 *  * iumio Framework - iumio Components
 *  *
 *  * To get more information about licence, please check the licence file
 *
 */


namespace iumioFramework\Core\Additional\Api;
use iumioFramework\Core\Requirement\Environment\FrameworkEnvironment;
use iumioFramework\Core\Base\Json\JsonListener as JL;

/**
 * Class ApiAuthentificator
 * @package iumioFramework\Core\Additional\Api
 * @author RAFINA Dany <danyrafina@gmail.com>
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <danyrafina@gmail.com>
 */
class ApiAuthentificator implements ApiInterface
{
    /**
     * @var null
     */
    static private $appapi = null;
    /**
     * @return mixed
     */
    public function getApiKeys()
    {
        // TODO: Implement getApiKeys() method.
    }


    /**
     * @return int
     */
    public static function authEnabled() {
        $j = JL::open(FrameworkEnvironment::generateLocation("CONFIG_DIR", "core/framework.config.json"));
        if (isset($j->api_auth_for)) {
            $auth = $j->api_auth_for;

            foreach ($auth as $oneauth) {
                if (self::checkFileExistAndApiKeys($oneauth)) {

                }
            }
        }
        else {
            return (0);
        }
    }

    /**
     * @param string $appname
     * @return bool
     */
    private static function checkFileExistAndApiKeys(string $appname) {
        //if ()
        return (false);
    }

}