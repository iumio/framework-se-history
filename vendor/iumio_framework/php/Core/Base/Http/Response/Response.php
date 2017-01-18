<?php

namespace IumioFramework\Core\Base\Http\Response;

/**
 * Class Response
 * @package IumioFramework\Core\Base\Http\Response
 */

final class Response implements ResponseInterface
{

    /** Render to JSON format
     * @param array $response
     * @return int
     */
    public function JSON_RENDER(array $response):int
    {
        echo json_encode($response);
        return (1);
    }

    /** Render to XML format
     * @param array $response Response array
     * @param string $firstelem Name of the first element
     * @param string $name XML name
     * @return int
     * @throws \Exception
     */
    public function XML_RENDER(array $response, string $firstelem, string $name = NULL):int
    {
        if (!$this->IS_VALID_FORMAT($response, "array"))
            throw new \Exception('Response Error: Your response base is not an array');

        $xmlElem = new \SimpleXMLElement("<?xml version=\"1.0\"?><$firstelem></$firstelem>");

        $this->XML_RENDER_EXTEND($response, $xmlElem);

        if ($name == NULL)
            $xml_file = $xmlElem->asXML();
        else
            $xml_file = $xmlElem->asXML("$name.xml");

        if($xml_file)
        {
            header('Content-type: text/xml');
            if ($name != NULL)
                header('Content-Disposition: attachment; filename="'.$name.'.xml"');
            echo ($xml_file);
        }
        else
            throw new \Exception('Response Error on XML RENDER : XML is invalid.');

        return (1);
    }

    /** Detect is valid format for Response mode
     * @param $elem mixed Element to verify format
     * @param string $mode Mode for verification
     * @return int Is Valid format
     */
    public function IS_VALID_FORMAT($elem, string $mode):int
    {
      if ($mode == "array")
          return ((is_array($elem))? 1 : 0);
    }


    /**
     * Extend function for XML_RENDER
     * @param array $array Array to convert
     * @param \SimpleXMLElement $xmlElem
     * @return mixed
     */
    private function XML_RENDER_EXTEND(array $array, \SimpleXMLElement &$xmlElem) {
        foreach($array as $key => $value) {
            if(is_array($value)) {
                if(!is_numeric($key)){
                    $subnode = $xmlElem->addChild("$key");
                    $this->XML_RENDER_EXTEND($value, $subnode);
                }else{
                    $subnode = $xmlElem->addChild("item$key");
                    $this->XML_RENDER_EXTEND($value, $subnode);
                }
            }else {
                $xmlElem->addChild("$key",htmlspecialchars("$value"));
            }
        }
        return ($xmlElem);
    }

    /** Render to XML format
     * @param array $response Response array
     * @return int
     */
    public function TEXT_RENDER(array $response):int
    {
        return (1);
    }

}