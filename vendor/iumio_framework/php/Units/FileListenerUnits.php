<?php
/**
 * Created by PhpStorm.
 * User: danyrafina
 * Date: 21/12/2017
 * Time: 13:22
 */

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

namespace iumioFramework\Units;


use iumioFramework\Core\Base\File\FileListener;
use iumioFramework\Exception\Server\AbstractServer;

class FileListenerUnits
{
    public function putAssert()
    {
        $fl = new FileListener();
        $fl->open(ROOT_LOGS.'dev.log', 'a+');
        $fl->put("[HELLO]");
        $fl->close();
    }

    public function readAssert() {
        $f = new FileListener();
        $rs = $f->open(ROOT_LOGS.strtolower("dev").".log");
        $a =  array();
        print_r($f->read());
    }

    public function readByLineAssert() {
    }

    public function getLogs()
    {
        print_r(AbstractServer::getLogs());
    }
}