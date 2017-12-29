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

namespace iumioFramework\Core\Requirement\Environment;

use iumioFramework\Core\Requirement\Environment\FrameworkEnvironment;
use iumioFramework\Core\Base\Debug\Debug;
use iumioFramework\Core\Base\Http\HttpListener;
use iumioFramework\Apps\AppCore;
use iumioFramework\Core\Additionnal\TaskBar\TaskBar as TB;
use iumioFramework\Exception\Server\Server500;

/**
 * Class ProdEnvironment
 * iumio Class for production environment
 *
 * @package  iumioFramework\Core\Requirement
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */
class ProdEnvironment extends FrameworkEnvironment
{

    /** Start Application
     * @return int Is Ready
     * @throws Server500
     * @throws \Exception
     */
    public static function start():int
    {
        parent::definer('PROD');
        parent::checkDefiner();
        if (self::hostAllowed() == 1) {
            $core = new AppCore('PROD', true);
            Debug::enabled();
            TB::switchStatus("off");
            $request = HttpListener::createFromGlobals();
            $core->dispatch($request);
            return (1);
        }
        return (0);
    }
}