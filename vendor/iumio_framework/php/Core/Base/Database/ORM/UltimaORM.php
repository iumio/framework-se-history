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

namespace iumioFramework\Core\Base\Database\ORM;

/**
 * Trait UltimaORM
 * @package iumioFramework\Core\Base\Database\ORM
 * @author RAFINA Dany <danyrafina@gmail.com>
 */
trait UltimaORM
{
    protected $em = null;
    protected $params = array(
        'driver'   => '',
        'user'     => '',
        'password' => '',
        'dbname'   => '',
    );
    protected $entityPath = null;
    protected $app;
    protected $connectionName = 'default';

    /** Get connection
     * @param boolean $mode To enable or disable dev mode
     * @return mixed
     */
    abstract public function getConnection(bool $mode = false);

    /** Require Autoloader from composer
     * @return mixed
     */
    abstract protected function requireAutoload();

    /**
     * @param bool $mode
     * @return mixed
     */
    abstract public function getEntityManager(bool $mode = false);
}