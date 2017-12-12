<?php


/**
 *
 *  * This is an iumio Framework component
 *  *
 *  * (c) RAFINA DANY <danyrafina@gmail.com>
 *  *
 *  * iumio Framework - iumio Components
 *  *
 *  * To get more information about licence, please check the licence file
 *
 */

namespace iumioFramework\Base\Renderer;
use iumioFramework\Core\Additionnal\Template\SmartyEngineConfiguration;
use iumioFramework\Core\Additionnal\Template\SmartyEngineTemplate;
use iumioFramework\Core\Base\Http\HttpResponse;
use iumioFramework\Core\Base\Renderer\RendererInterface;
use iumioFramework\Core\Requirement\Patterns\ObjectCreator;
use iumioFramework\Exception\Server\Server500;


/**
 * Class Renderer
 * @package iumioFramework\Core\Base\Renderer
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <danyrafina@gmail.com>
 */
class Renderer implements RendererInterface
{

    /**
     * Renderer constructor.
     */
    public function __construct()
    {
        header_remove();
    }

    /**
     * @var array Content the display data
     */
    private $display_elements = array();

    /** Render a graphic element on screen (Smarty Only)
     * @param string $view view name
     * @param array $options view array option
     * @param bool $iscached If is a cached view
     * @return mixed  The renderer object
     * @throws \Exception
     * @throws \SmartyException
     */
    public function graphicRenderer(string $view, array $options = array(), bool $iscached = true):Renderer
    {
        $si = SmartyEngineTemplate::getSmartyInstance(APP_CALL);

        /* $smartyConfig = new SmartyEngineConfiguration(IUMIO_ENV);

         $id_compile = $id_cache = ($view.strtolower(IUMIO_ENV.APP_CALL));

         $si->assign($options);

         if ($smartyConfig->getCache() == 1 && $iscached == true) {

             return ($si->display($view . SmartyEngineTemplate::$viewExtention, $id_cache, $id_compile));
         }
         elseif ($smartyConfig->getCache() == 1 && $iscached == false) {

             $si->clearCache($view . SmartyEngineTemplate::$viewExtention, $id_cache);
         }*/

        $si->assign($options);
        $this->display_elements = array("graphic" => ($si->display($view . SmartyEngineTemplate::$viewExtention)));
        return ($this);
    }

    /** Display text on screen
     * @param string $text text value
     * @return Renderer The renderer object
     */
    public function textRenderer(string $text): Renderer
    {
        $this->display_elements = array("text" => $text);
        return ($this);
    }

    /** Display json elements on screen
     * @param array|\stdClass $elements Array to tranform to json format
     * @return Renderer The renderer object
     * @throws Server500 If element is not a valid array or object
     */
    public function jsonRenderer($elements): Renderer
    {
        if (!is_array($elements) && !is_object($elements)) {
            throw new Server500(new \ArrayObject(array("explain" =>
                "The parameters {elements} is not a valid object/array for json renderer ",
                "solution" => "Please set a valid parameters for json renderer {object|array}")));
        }

        $this->display_elements = array("json" => (array)$elements, JSON_PRETTY_PRINT);
        return ($this);
    }

    /** Render to XML format
     * @param array $response Response array
     * @param string $firstelem Name of the first element
     * @param string $name XML name
     * @return Renderer The renderer object
     * @throws \Exception
     */
    public function xmlRenderer(array $response, string $firstelem, string $name = null): Renderer
    {
        $xmlElem = new \SimpleXMLElement("<?xml version=\"1.0\"?><$firstelem></$firstelem>");

        $this->buildXml($response, $xmlElem);

        if ($name == null) {
            $xml_file = $xmlElem->asXML();
        } else {
            $xml_file = $xmlElem->asXML("$name.xml");
        }

        if ($xml_file) {
            $this->display_elements = array("xml" => $xml_file, "name" => $name);
        } else {
            throw new Server500(new \ArrayObject(array("explain" => "Renderer: xml element is invalid.", "solution" =>
                "Please send a valid xml element to renderer")));
        }
        return ($this);
    }

    /**
     * Build xml element
     * @param array $array Array to convert
     * @param \SimpleXMLElement $xmlElem xml Element
     * @return \SimpleXMLElement xml
     */
    private function buildXml(array $array, \SimpleXMLElement &$xmlElem):\SimpleXMLElement
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                if (!is_numeric($key)) {
                    $subnode = $xmlElem->addChild("$key");
                    $this->buildXml($value, $subnode);
                } else {
                    $subnode = $xmlElem->addChild("item$key");
                    $this->buildXml($value, $subnode);
                }
            } else {
                $xmlElem->addChild("$key", htmlspecialchars("$value"));
            }
        }
        return ($xmlElem);
    }


    /** Render to xml (2 modes, downloadable mode with name and display mode wihout name)
     * @param array $response Element to display in CSV
     * @param string|null $name The csv name if is downloadable
     * @return Renderer The renderer object
     */
    public function csvRenderer(array $response, string $name = null): Renderer
    {
        header('Content-Type: text/csv; charset=utf-8');
        $output = fopen('php://output', 'w');
        $k = array_keys($response);
        fputcsv($output, $k);
        fputcsv($output, array_values($response));
        $this->display_elements = array("csv" => $output, "name" => $name);
        return ($this);
    }

    /** Display element in display_element array
     * @return mixed
     * @throws Server500 if Code does not exist
     */
    public function pushRender()
    {
        if (isset($this->display_elements["graphic"]) && $this->display_elements["graphic"] != "") {
            echo $this->display_elements["graphic"];
        }
        elseif (isset($this->display_elements["json"]) && $this->display_elements["json"] != "") {
            if (isset($this->display_elements["json"]['code'])) {
                @header($_SERVER['SERVER_PROTOCOL'] . ' ' .
                    (($this->display_elements["json"]['code'] == 000) ? 500 :
                        $this->display_elements["json"]['code']) . ' ' .
                    HttpResponse::getPhrase($this->display_elements["json"]['code']),
                    true, $this->display_elements["json"]['code']);
            }
            echo json_encode($this->display_elements["json"], JSON_PRETTY_PRINT);
        }
        elseif (isset($this->display_elements["xml"]) && $this->display_elements["xml"] != "") {
            header('Content-type: text/xml');
            if ($this->display_elements["name"] != null) {
              header('Content-Disposition: attachment; filename="'.$this->display_elements["name"].'.xml"');
            }
            echo ($this->display_elements["xml"]);
        }
        elseif (isset($this->display_elements["text"]) && $this->display_elements["text"] != "") {
            header("Content-Type: text/plain");
            echo ($this->display_elements["text"]);
        }
        elseif (isset($this->display_elements["csv"]) && $this->display_elements["csv"] != "")
        {
            if ($this->display_elements["name"] != null) {
                header('Content-Disposition: attachment; filename='.$this->display_elements["name"].'csv');
            }
            fclose($this->display_elements["csv"]);
        }

        /*else {
            throw new Server500(new \ArrayObject(array("explain" => "Renderer: This renderer is not valid.", "solution" =>
                "Please use a valid renderer.")));
        }*/
        exit(1);
    }


}