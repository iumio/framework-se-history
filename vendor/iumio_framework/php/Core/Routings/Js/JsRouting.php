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

namespace iumioFramework\HttpRoutes;

use iumioFramework\Core\Base\{Listener, Json\JsonListener as JL};
use iumioFramework\Exception\Server\Server500;

/**
 * Class JsRouting
 * @package iumioFramework\HttpRoutes
 */
class JsRouting implements Listener
{
    protected $rt_path = ROOT_WEB_COMPONENTS."rt/config_files/map.rt.js";
    protected $rt_path_base = ROOT_WEB_COMPONENTS."rt/config_files/map.rt.base.js";
    protected $apps_path = CONFIG_DIR."core/apps.json";
    protected $baseapps_path = BASE_APPS."apps.json";
    protected $is_base;
    protected $resource = NULL;


    /**
     * JsRouting constructor.
     * @param bool $is_base is a Base app
     */
    public function __construct(bool $is_base = false)
    {
        $this->is_base = $is_base;
    }

    /** Build a JS Routing File
     * @return int Operation is a success
     */
    final public function build():int
    {
        return ($this->buildFile());
    }

    /** Open JS Routing File
     * @return int Operation is a success
     */
    public function open():int
    {
        if ($this->resource == NULL)
            $this->resource = ($this->is_base)? JL::open($this->rt_path_base) : JL::open($this->rt_path);
        return (1);
    }

    /**
     * @return array
     */
    public function render(): array
    {
        return (array());
    }

    /**
     * Write in JS routing file
     * @param string $file_contains File contains
     * @return int Operation is a success
     */
    private function write(string $file_contains):int
    {
         $header = "/*\n * This is an iumio Framework component\n *\n * (c) RAFINA DANY <danyrafina@gmail.com>";
         $headersub = "\n *\n * iumio Framework - iumio Components\n *\n";
         $headersub2 = " * To get more information about licence, please check the licence file\n */";
         $date = new \DateTime();
         $date = $date->format('Y-m-d H:i:s');
         $header2 = "\n\n/* File generate by iumio JS Routing - Time : $date. DO NOT OVERRIDE IT ! */\n\n";

        $rs = $header.$headersub.$headersub2.$header2."var iumiortdata = ".$file_contains.";";
        return (($this->is_base)? JL::put($this->rt_path_base, $rs) : JL::put($this->rt_path, $rs));
    }


    /** Build JS Routing File with multiple stage
     * @return int Operation is a success
     * @throws Server500 If Clear was not working
     */
    private function buildFile():int
    {
        $rt = $this->analysis();
        $rtfinal = array();
        if ($this->clear() != 1)
            throw new Server500(new \ArrayObject(array("explain" => "Cannot clear Routing JS File",
                "solution" => "Please check the Routing JS file")));
       while ($rt->valid())
       {
           array_push($rtfinal, $rt->current());
           $rt->next();
       }

       return ($this->write(json_encode((object)$rtfinal,JSON_PRETTY_PRINT)));
    }


    /** Get app list
     * @return \stdClass The app list
     */
    private function getApplist():\stdClass
    {
        $apps = ($this->is_base)? JL::open($this->baseapps_path): JL::open($this->apps_path);
        JL::close($this->apps_path);
        return ($apps);
    }

    /**
     * Clear routing js file
     * @return int Operation is a success
     */
    private function clear():int
    {
        return (($this->is_base)? JL::put($this->rt_path_base, "") : JL::put($this->rt_path, ""));
    }

    /**
     * Analysis route visibility
     * @return \ArrayIterator An array interator contains all public routes
     */
    private function analysis():\ArrayIterator
    {
        $apps = $this->getApplist();
        $routing = new \ArrayIterator();
        foreach ($apps as $one => $values)
        {
            $rt = new Routing($values->name, (isset($values->prefix)? $values->prefix : ""), $this->is_base);
            $rt->routingRegister();
            $apprt = $rt->routes();
            $apppublic = array();
            foreach ($apprt as $rt => $valk)
            {
                if ($valk['visibility'] == "public")
                    array_push($apppublic, array("name" => $valk['routename'],
                        "path" => $valk['path'], "params" => $valk['params']?? ""));
            }
            $routing->append(array($values->name => $apppublic));
        }
       return ($routing);
    }

    /** Close the router ressource
     * @param $oneRouter
     * @return int
     */
    public function close($oneRouter): int
    {
        if ($this->resource != NULL)
            JL::close($this->rt_path);
        return (1);
    }

    /**
     * @return int
     */
    public function listingRouters(): int
    {
        return (1);
    }


}