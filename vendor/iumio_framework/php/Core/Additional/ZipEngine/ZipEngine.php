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

namespace iumioFramework\Core\Additionnal\Zip;

use iumioFramework\Exception\Server\Server500;
use \ZipArchive;

/**
 * Class ZipEngine
 * @package iumioFramework\Core\Additionnal\Zip
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */
class ZipEngine extends ZipArchive
{

    private $name = null;
    private $source = null;

    /**
     * ZipEngine constructor.
     * @param string $name zip archive name
     * @throws Server500 If extension does not exist
     */
    public function __construct(string $name)
    {
        if (!extension_loaded('zip')) {
            throw new Server500(new \ArrayObject(array("explain" => "Extension zip is needed",
            "Please check your server configuration")));
        }

        if (!$this->open($name, self::CREATE)) {
            throw new Server500(new \ArrayObject(array("explain" => "The archive name must be not null.",
                "Please add an archive name.")));
        }
        $this->name = $name;
    }

    /**
     *  Set source path
     * @param string $source source path
     * @throws Server500 If source does not exist
     */
    public function setSource(string $source)
    {
        if (!file_exists($source)) {
            throw new Server500(new \ArrayObject(array("explain" =>
                "The source $source for the ZIP archive does not exist.",
                "Please check the source validity.")));
        }
        $this->source = $source;
    }

    /** Compress source dir to zip
     * @return bool If archive is compressed
     * @throws Server500
     */
    public function recursiveCompress():bool
    {
        if ($this->source == null) {
            throw new Server500(new \ArrayObject(array("explain" => "The source must be not null.",
                "Please add source path.")));
        }
        if ($this->name == null) {
            throw new Server500(new \ArrayObject(array("explain" => "The archive name must be not null.",
                "Please add an archive name.")));
        }

        $source = str_replace('\\', '/', realpath($this->source));
        if (is_dir($source) === true) {
            $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($source),
                \RecursiveIteratorIterator::SELF_FIRST
            );
            foreach ($files as $file) {
                $file = str_replace('\\', '/', $file);
                if (in_array(substr($file, strrpos($file, '/') + 1), array('.', '..'))) {
                    continue;
                }
                $file = realpath($file);
                if (is_dir($file) === true) {
                    $this->addEmptyDir(str_replace($source . '/', '', $file . '/'));
                } elseif (is_file($file) === true) {
                    $this->addFromString(str_replace(
                        $source . '/',
                        '',
                        $file
                    ), file_get_contents($file));
                }
            }
        } elseif (is_file($source) === true) {
            $this->addFromString(basename($source), file_get_contents($source));
        }
        return (true);
    }
}
