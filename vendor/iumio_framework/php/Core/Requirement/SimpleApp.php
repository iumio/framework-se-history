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

namespace iumioFramework\Core\Requirement;

/**
 * Class SimpleApp
 * @package iumioFramework\Core\Requirement
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class SimpleApp extends iumioApp
{

    /**
     * SimpleApp constructor.
     * @param string|null $appname The app name or null
     */
    public function __construct(string $appname = null)
    {
        if ($appname != null)
        {

        }
    }

    /** Save an App
     */
    public function save()
    {
        // TODO: Implement save() method.
    }

    /** Delete an app
     */
    public function remove()
    {
        // TODO: Implement remove() method.
    }

}