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

namespace iumioFramework\Core\Base\Renderer;
use iumioFramework\Base\Renderer\Renderer;
use iumioFramework\Exception\Server\Server500;

/**
 * Class RendererInterface
 * @package iumioFramework\Core\Base
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */
interface RendererInterface {

    /** Render a graphic element on screen (Smarty Only)
     * @param string $view view name
     * @param array $options view array option
     * @param bool $iscached If is a cached view
     * @return Renderer  The renderer object
     */
    public function graphicRenderer(string $view, array $options = array(), bool $iscached = true):Renderer;

    /** Display text on screen
     * @param string $text text value
     * @return Renderer The renderer object
     */
    public function textRenderer(string $text):Renderer;

    /** Display json elements on screen
     * @param array|\stdClass $elements Array to tranform to json format
     * @return Renderer The renderer object
     */
    public function jsonRenderer($elements):Renderer;

    /** Render to XML format
     * @param array $response Response array
     * @param string $firstelem Name of the first element
     * @param string $name XML name
     * @return Renderer The renderer object
     * @throws \Exception
     */
    public function xmlRenderer(array $response, string $firstelem, string $name = null):Renderer;

    /** Render to xml (2 modes, downloadable mode with name and display mode wihout name)
     * @param array $response Element to display in CSV
     * @param bool $excel If csv is compatible with excel
     * @param string|null $name The csv name if is downloadable
     * @param bool $keys If array keys displayed
     * @return Renderer The renderer object
     */
    public function csvRenderer(array $response, bool $excel, string $name = null, bool $keys):Renderer;

    /** Register a custom renderer
     * @param $callback mixed The callable function (the renderer type)
     * @param array|null $args Arguments required for the callback
     * @return Renderer A renderer object
     * @throws Server500 If renderer is not callable
     */
    public function registerCustomRenderer($callback, array $args = null):Renderer;

    /** Display element in display_element array
     * @return mixed
     */
    public function pushRender();

}


/**
 *
 *
 */