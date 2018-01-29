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

namespace iumioFramework\Units;


use iumioFramework\Core\Base\File\FileListener;
use iumioFramework\Exception\Server\AbstractServer;

class FileListenerUnits extends FrameworkUnits
{
    public function putAsser()
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

    public function execute()
    {
        // TODO: Implement execute() method.
    }
}