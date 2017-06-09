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

namespace iumioFramework\Core\Base\Http\Response;

/**
 * Interface ResponseInterface
 * @package iumioFramework\Core\Base\Http\Response
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

interface ResponseInterface
{
    /** Render to JSON format
     * @param array $response
     * @return int
     */
    public function JSON_RENDER(array $response):int;

    /** Render to XML format
     * @param array $response Response array
     * @param string $firstelem Name of the first element
     * @param string $name XML name
     * @return int
     */
    public function XML_RENDER(array $response, string $firstelem, string $name = NULL):int;

    /** Render to XML format
     * @param array $response Response array
     * @return int
     */
    public function TEXT_RENDER(array $response):int;


    /** Detect is valid format for Response mode
     * @param $elem mixed Element to verify format
     * @param string $mode Mode for verification
     * @return int Is Valid format
     */
    public function IS_VALID_FORMAT($elem, string $mode):int;

}