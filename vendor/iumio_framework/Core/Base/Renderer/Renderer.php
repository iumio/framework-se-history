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

namespace iumioFramework\Base\Renderer;
use iumioFramework\Core\Additionnal\Template\SmartyEngineConfiguration;
use iumioFramework\Core\Additionnal\Template\SmartyEngineTemplate;
use iumioFramework\Core\Base\Http\HttpResponse;
use iumioFramework\Core\Base\Renderer\RendererInterface;
use iumioFramework\Core\Requirement\Environment\FEnv;
use iumioFramework\Core\Requirement\Patterns\ObjectCreator;
use iumioFramework\Exception\Server\Server500;


/**
 * Class Renderer
 * @package iumioFramework\Core\Base\Renderer
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */
class Renderer implements RendererInterface
{

    /**
     * @var array $buffer_text Buffer for text render
     */
    private static $buffer_text = [];

    /**
     * @var array $allowed_text_render The allowed text render
     */
    private $allowed_text_render = [['priority' => 0, 'type' => 'text'], ['priority' => 1, 'type' => 'html']];

    /**
     * Renderer constructor.
     */
    public function __construct()
    {
        // CLEAR THE HEADER
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
        $si = SmartyEngineTemplate::getSmartyInstance(FEnv::get("app.call"));

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

        $viewRs = $si->fetch($view . SmartyEngineTemplate::$viewExtention);

        $taskbar = \iumioFramework\Core\Additionnal\TaskBar\TaskBar::getTaskBar();
        if ($taskbar !== "#none") {
            $pos = strpos($viewRs, "</body>");
            $viewRs = $this->strAdd($viewRs, $taskbar, $pos );
        }
        $this->display_elements = array("graphic" =>
            ($viewRs));

        return ($this);
    }

    /** Add string at specific postion
     * @param string $str String
     * @param string $insertstr string to add
     * @param int $pos Position
     * @return string The new string
     */
    private function strAdd(string $str, string $insertstr, int $pos):string
    {
        $str = substr($str, 0, $pos) . $insertstr . substr($str, $pos);
        return $str;
    }

    /** Display text on screen
     * @param string $text text value
     * @param string $dataType The data type
     * @return Renderer The renderer object
     */
    public function textRenderer(string $text, string $dataType = 'text'): Renderer
    {
        if (!$this->allowedTypeExist($dataType)) {
            throw new Server500(new \ArrayObject(array("explain" => 'Undefined {'.$dataType.'} type for text render',
                "solution" => "Please set the allowed text render type : ".json_encode($this->allowed_text_render))));
        }
        array_push(self::$buffer_text, array("text" => $text, "type" => $dataType));
        $this->display_elements = array("text" => $text, "type" => $dataType);
        return ($this);
    }

    /** Check if allowed type exist for text render
     * @param string $type allowed type
     * @return bool If exist
     */
    private function allowedTypeExist(string $type):bool {
        foreach ($this->allowed_text_render as $one) {
            if ($one["type"] === $type) {
                return (true);
            }
        }
        return (false);
    }

    /** Merge all text render
     * @return array Array this contact text and render type
     */
    private function assemblyTextRender():array {
        $str = "";
        $type = "text";

        foreach ($this->allowed_text_render as $one) {
            if ($one["priority"] === 1) {
                $type = $one["type"];
                break;
            }
        }

        foreach (self::$buffer_text as $one) {
            $str .= $one["text"];
        }
        return (array("text" => $str, "type" => $type));
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
        $xmlElem = new \SimpleXMLElement("<?xml version=\"1.0\"  encoding=\"UTF-8\" ?><$firstelem></$firstelem>");
        $this->buildXml($response, $xmlElem);
        libxml_use_internal_errors(true);
        $feed = new \DOMDocument();
        $feed->preserveWhitespace = true;
        $result = dom_import_simplexml($xmlElem);
        if(!$result) {
            throw new Server500(new \ArrayObject(array("explain" => "Renderer: xml element is invalid.".
                ((isset(error_get_last()["message"])? " : ".error_get_last()["message"] : "" )), "solution" =>
                "Please send a valid xml element to renderer")));
        }

        $dom = dom_import_simplexml($xmlElem)->ownerDocument;
        $dom->formatOutput = true;
        $xml_file = $dom->saveXML();
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

    /** Register a custom renderer
     * @param $callback mixed The callable function (the renderer type)
     * @param array|null $args Arguments required for the callback
     * @return Renderer A renderer object
     * @throws Server500 If renderer is not callable
     */
    public function registerCustomRenderer($callback, array $args = null):Renderer {
        if (is_callable($callback)) {
            $end = substr($callback, (strlen($callback) - 8));
            if ($end === "Renderer") {
                $this->display_elements["custom"] = $callback;
                $this->display_elements["args"] = $args;
                return ($this);
            }
            else {
                throw new Server500(new \ArrayObject(array("explain" =>
                    "Renderer name must be contain [Renderer] keyword at the end to be valid : $callback",
                    "solution" => "Please set a valid renderer name")));
            }
        }
        else {
            throw new Server500(new \ArrayObject(array("explain" =>
                "Cannot register $callback custom renderer : Is not callable", "solution" =>
                "Please set a callable renderer")));
        }
    }


    /** Render to xml (2 modes, downloadable mode with name and display mode wihout name)
     * @param array $response Element to display in CSV
     * @param bool $excel If csv is compatible with excel
     * @param string|null $name The csv name if is downloadable
     * @param bool $keys If array keys displayed
     * @return Renderer The renderer object
     */
    public function csvRenderer(array $response, bool $excel = false, string $name = null, bool $keys = false): Renderer
    {
        $this->display_elements = array("csv" => $response, "excel" => $excel, "name" => $name, "keys_show" => $keys);
        return ($this);
    }

    /**
     * Build a CSV
     */
    private function buildCsv()
    {

        if ($this->display_elements['excel'] === true) {
            header('Content-Type: application/vnd.ms-excel');
        }
        else {
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
        }
       if ($this->display_elements["name"] != NULL) {
            header('Content-Disposition: attachment; filename='.$this->display_elements["name"].'.csv');
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
        }

        $u = 0;
        echo (chr(0xEF) . chr(0xBB) . chr(0xBF));
        foreach ($this->display_elements['csv'] as $one)
        {
            if ($this->display_elements['keys_show'] && $u === 0) {
                echo implode(";", (array_keys($one))) . "\n";
            }
            if (is_array($one)) {
                echo (implode(";", $one)) . "\n";
            }
            else {
                echo ($one)."\n";
            }
            $u++;
        }
    }

    /** Display element in display_element array
     * @return mixed
     * @throws Server500 if Code does not exist
     */
    public function pushRender()
    {
        if (isset($this->display_elements["graphic"]) ) {
            echo $this->display_elements["graphic"];
        }
        elseif (isset($this->display_elements["json"]) && $this->display_elements["json"] != "") {
            if (isset($this->display_elements["json"]['code'])) {
                @header($_SERVER['SERVER_PROTOCOL'] . ' ' .
                    (($this->display_elements["json"]['code'] == 000) ? 500 :
                        $this->display_elements["json"]['code']) . ' ' .
                    HttpResponse::getPhrase($this->display_elements["json"]['code']),
                    true, $this->display_elements["json"]['code']);
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Pragma: public');

            }
            echo json_encode($this->display_elements["json"], JSON_PRETTY_PRINT);
        }
        elseif (isset($this->display_elements["xml"]) && $this->display_elements["xml"] != "") {
            header('Content-type: text/xml');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            echo ($this->display_elements["xml"]);
            if ($this->display_elements["name"] != null) {
              header('Content-Disposition: attachment; filename="'.$this->display_elements["name"].'.xml"');
            }
        }
        elseif (isset($this->display_elements["text"]) && $this->display_elements["text"] != "") {
            $rs = $this->assemblyTextRender();
            header("Content-Type: text/".$rs["type"]);
            echo ($rs["text"]);
        }
        elseif (isset($this->display_elements["csv"]) && $this->display_elements["csv"] != "")
        {
            $this->buildCsv();
        }
        elseif (isset($this->display_elements["custom"])) {
            if ($this->display_elements["custom"] == null) {
                $this->display_elements["custom"];
            }
            else {
                $this->display_elements["custom"]($this->display_elements["args"]);
            }

        }
        else {
            throw new Server500(new \ArrayObject(array("explain" => "Renderer: This renderer is not valid. ".json_encode($this->display_elements), "solution" =>
                "Please use a valid renderer.")));
        }
        $this->display_elements = array();
        exit(1);
    }

}


