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

use iumioFramework\Core\Base\Http\HttpResponse;

/**
 * Class Response
 * @package iumioFramework\Core\Base\Http\Response
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <danyrafina@gmail.com>
 */

final class Response implements ResponseInterface
{

    /** Render to JSON format
     * @param array $response
     * @return int
     */
    public function jsonRender(array $response):int
    {
        @header($_SERVER['SERVER_PROTOCOL'] .' '.(($response['code'] == 000)? 500 :
                $response['code']).' '.HttpResponse::getPhrase($response['code']), true, $response['code']);
        echo json_encode($response, JSON_PRETTY_PRINT);
        return (1);
    }

    /** Render to XML format
     * @param array $response Response array
     * @param string $firstelem Name of the first element
     * @param string $name XML name
     * @return int
     * @throws \Exception
     */
    public function xmlRender(array $response, string $firstelem, string $name = null):int
    {
        if (!$this->isValidFormat($response, "array")) {
            throw new \Exception('Response Error: Your response base is not an array');
        }

        $xmlElem = new \SimpleXMLElement("<?xml version=\"1.0\"?><$firstelem></$firstelem>");

        $this->xmlRenderExtend($response, $xmlElem);

        if ($name == null) {
            $xml_file = $xmlElem->asXML();
        } else {
            $xml_file = $xmlElem->asXML("$name.xml");
        }

        if ($xml_file) {
            header('Content-type: text/xml');
            if ($name != null) {
                header('Content-Disposition: attachment; filename="'.$name.'.xml"');
            }
            echo ($xml_file);
        } else {
            throw new \Exception('Response Error on XML RENDER : XML is invalid.');
        }

        return (1);
    }

    /** Detect is valid format for Response mode
     * @param $elem mixed Element to verify format
     * @param string $mode Mode for verification
     * @return int Is Valid format
     */
    public function isValidFormat($elem, string $mode):int
    {
        if ($mode == "array") {
            return ((is_array($elem))? 1 : 0);
        }
    }


    /**
     * Extend function for xmlRender
     * @param array $array Array to convert
     * @param \SimpleXMLElement $xmlElem
     * @return mixed
     */
    private function xmlRenderExtend(array $array, \SimpleXMLElement &$xmlElem)
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                if (!is_numeric($key)) {
                    $subnode = $xmlElem->addChild("$key");
                    $this->xmlRenderExtend($value, $subnode);
                } else {
                    $subnode = $xmlElem->addChild("item$key");
                    $this->xmlRenderExtend($value, $subnode);
                }
            } else {
                $xmlElem->addChild("$key", htmlspecialchars("$value"));
            }
        }
        return ($xmlElem);
    }

    /** Render to TEXT format
     * @param array $response Response array
     * @return int
     */
    public function textRender(array $response):int
    {
        header('HTTP/1.0 '.$response['code'].' '.HttpResponse::getPhrase($response['code']));
        echo implode(" ", $response);
        return (1);
    }
}
