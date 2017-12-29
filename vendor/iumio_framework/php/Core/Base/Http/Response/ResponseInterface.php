<?php

/*
 * This is an iumio Framework component
 *
 * (c) RAFINA DANY <dany.rafina@iumio.com>
 *
 * iumio Framework - iumio Components
 *
 * To get more information about licence, please check the licence file
 */

namespace iumioFramework\Core\Base\Http\Response;

/**
 * Interface ResponseInterface
 * @package iumioFramework\Core\Base\Http\Response
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */

interface ResponseInterface
{
    /** Render to JSON format
     * @param array $response
     * @return int
     */
    public function jsonRender(array $response):int;

    /** Render to XML format
     * @param array $response Response array
     * @param string $firstelem Name of the first element
     * @param string $name XML name
     * @return int
     */
    public function xmlRender(array $response, string $firstelem, string $name = null):int;

    /** Render to XML format
     * @param array $response Response array
     * @return int
     */
    public function textRender(array $response):int;


    /** Detect is valid format for Response mode
     * @param $elem mixed Element to verify format
     * @param string $mode Mode for verification
     * @return int Is Valid format
     */
    public function isValidFormat($elem, string $mode):int;
}
