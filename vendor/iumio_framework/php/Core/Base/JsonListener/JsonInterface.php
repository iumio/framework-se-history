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

namespace iumioFramework\Core\Base\Json;

/**
 * Interface
 * @package iumioFramework\Core\Base\Json
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

interface JsonInterface
{

    /** Open configuration file
     * @param $filepath string
     * @return \stdClass element of file
     */
    public static function open(string $filepath):\stdClass;

    /** Close configuration file
     * @param $filepath string File path
     * @return int Is closed
     */
    public static function close(string $filepath):int;

    /** Put content in configuration file
     * @param $filepath string File path
     * @param $content string new file content
     * @return int success
     */
    public static function put(string $filepath, string $content):int;


}