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

namespace iumioFramework\Core\Base\File;

use iumioFramework\Core\Additionnal\Server\ServerManager;
use iumioFramework\Exception\Server\Server500;

/**
 * Class FileListener
 * @package iumioFramework\Core\Base\File
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <danyrafina@gmail.com>
 */

class FileListener implements FileInterface
{
    /**
     * @var mixed Resource file
     */
    private $file = null;

    /**
     * @var string File path
     */
    private $filepath = null;

    /**
     * @var string File permissions
     */
    private $perm = null;

    /**
     * @var string temporary File
     */
    private $tempFile = null;


    /** Open file
     * @param $filepath string Filepath
     * @param $perm string File permissions ([r] is by default)
     * @param $fcreate bool Force the file creation if not exist before open it (By default, is none)
     * @return \resource File content
     * @throws Server500|\Exception If file does not exist or not readable | If cannot create file
     */
    public function open(string $filepath, string $perm = "r", bool $fcreate = false) {
        if ($filepath == $this->filepath && $this->file != null) {
            return ($this->file);
        }

        if (!file_exists($filepath)) {
           ServerManager::create($filepath, 'file');
        }

        self::checkPermission($perm, $filepath);
        $this->perm = $perm;
        $this->filepath = $filepath;
        $this->file = fopen($filepath, $perm);

        if (!is_resource($this->file)) {
            throw new Server500(new \ArrayObject(array("explain" =>
                "Invalid file resource for $filepath",
                "solution" =>
                    "Please check the file you opened")));
        }

        return ($this->file);
    }

    /** Reverse a file array (only a file opened with FileListenner::openFileAsArray
     * @param int $break Line number to catch (By default, the value 0 return all lines)
     * @return array The file array
     * @throws Server500 If file is not an array
     */
    public function reverse(int $break = 0):array {
        if (!is_array($this->filepath)) {
            throw new Server500(new \ArrayObject(array("explain" =>
                "Cannot reverse file ".$this->filepath." : is not a resource.",
                "solution" =>
                    "Use your own method to reverse the resource")));
        }
       return ((($break == 0)? array_reverse($this->file) : array_reverse(array_slice($this->file, -$break))));
    }

    /** Open file and returning an array of each line
     * @param $filepath string Filepath
     * @return array File array content
     * @throws Server500|\Exception If file does not exist or not readable | If cannot create file
     */
    public function openFileAsArray(string $filepath):array {
        if ($filepath == $this->filepath && $this->file != null) {
            return ($this->file);
        }

        if (!file_exists($filepath)) {
            ServerManager::create($filepath, 'file');
        }

        if (!is_readable($filepath)) {
            throw new Server500(new \ArrayObject(array("explain" =>
                "Cannot open file $filepath : File not readable",
                "solution" => "Please set the readable permission")));
        }

        $this->perm = null;
        $this->filepath = $filepath;
        $this->file = file($filepath);

        if (!is_array($this->file)) {
            throw new Server500(new \ArrayObject(array("explain" =>
                "Invalid file array for $filepath",
                "solution" =>
                    "Use FileListener::open to open a file resource.")));
        }

        return ($this->file);
    }


    /** Put content in configuration file
     * @param $contents string new file content
     * @param $inline bool Add item on the same line
     * @param int $length If the length argument is given, writing will
     * stop after length bytes have been written or the end of string is reached, whichever comes first.
     * @return int If the write task is succesfull
     * @throws \Exception If file cannot be created
     */
    public function put(string $contents, int $length = null, bool $inline = false):int {
        self::checkPermission($this->perm, $this->filepath);
        if ($length != null) {
            return (fwrite($this->file, $contents . ((!$inline) ? "\n" : ""), $length));
        }
        else {
            return (fwrite($this->file, $contents . ((!$inline) ? "\n" : "")));
        }
    }

    /** Return file resource
     * @return null|resource Return the file resource when is opened or null if no file was opened
     */
    public function getFile() {
        return ($this->file);
    }

    /** Return file path
     * @return null|string Return the file path when is opened or null if no file was opened
     */
    public function getFilePath(){
        return ($this->filepath);
    }

    /** Return file permission
     * @return null|string Return the file permission when is opened or null if no file was opened
     */
    public function getFilePerm() {
        return ($this->perm);
    }

    /** Get file contents
     * @param int|null $size The file size [optionnal]
     * @return bool|string File contents | If an error was generated
     * @throws Server500
     */
    public function read(int $size = null) {
        if ($this->file == null) {
            throw new Server500(new \ArrayObject(array("explain" =>
                "Cannot read file for unopened file",
                "solution" =>
                    "Please open the file with [FileListener::open] before trying to get read it.")));
        }
        if ($size === null) {
            return (fread($this->file, $this->size()));
        }
        else {
            return (fread($this->file, $size));
        }
    }

    /** Get file data for one line (line by line)
     * Use FileListener::eachLine to read line by line with a loop condition
     * @param int|null $size The file size [optionnal]
     * @return bool|string File one line content | If an error was generated
     * @throws Server500
     */
    public function readByLine(int $size = null) {
        if ($this->file == null) {
            throw new Server500(new \ArrayObject(array("explain" =>
                "Cannot read file for unopened file",
                "solution" =>
                    "Please open the file with [FileListener::open] before trying to get read it.")));
        }

        if ($size === null) {
            return (fgets((($this->tempFile === null)? ($this->file) : $this->tempFile), $this->size()));
        }
        else {
            return (fgets((($this->tempFile === null)? ($this->file) : $this->tempFile), $size));
        }

    }


    /** Get file data for one line (line by line) binary mode
     * Use FileListener::eachLine to read line by line with a loop condition
     * @param int|null $size The file size [optionnal]
     * @return bool|string File one line content | If an error was generated
     * @throws Server500
     */
    public function readBinaryByLine(int $size = null) {
        if ($this->file == null) {
            throw new Server500(new \ArrayObject(array("explain" =>
                "Cannot read file for unopened file",
                "solution" =>
                    "Please open the file with [FileListener::open] before trying to get read it.")));
        }

        if ($size === null) {
            return (fgetss((($this->tempFile === null)? ($this->file) : $this->tempFile), $this->size()));
        }
        else {
            return (fgetss((($this->tempFile === null)? ($this->file) : $this->tempFile), $size));
        }

    }

    /**
     * @param bool $copy
     * @return true
     */
    public function eachLine(bool $copy = true):bool
    {
        if ($copy) {
            if ($this->tempFile === null) {
                $this->tempFile = $this->file;
            }
            return (feof($this->tempFile));
        }
        else {
            return (feof($this->file));
        }
    }

    /** Getting the file size
     * @return int The file size
     * @throws Server500 If file was not opened before trying to get the file size
     */
    public function size():int
    {
        if ($this->file == null) {
            throw new Server500(new \ArrayObject(array("explain" =>
                "Cannot get size for unopened file",
                "solution" =>
                    "Please open the file with [FileListener::open] before trying to get the size.")));
        }
        return (filesize($this->filepath));
    }

    /** Close file configuration
     * @return int Is file closed
     */
    public function close():int
    {
        if ($this->file != null) {
            $rs = fclose($this->file);
            $this->perm = $this->filepath = $this->file = null;
            return ($rs);
        }
        return (1);
    }


    /** Check if permission is valid for FOPEN
     * This function can be used to test if file is readable, writable or executable
     * Permission possibilities
     * r  : for readable
     * r+ : for readable and writable
     * w  : for readable and writable
     * w+ :	for readable and writable
     * a  :	for readable and writable
     * a+ : for readable and writable
     * x  : for readable and writable
     * x+ :	for readable and writable
     * c  : for readable and writable
     * c+ : for readable and writable
     * rwx : for readable, writable and executable
     *
     * @param string $perm The permission parameter
     * @param string $filepath The file full path
     * @return bool If permission is true
     * @throws Server500 If the permission is not valid or the file is not readable or writable or executable
     */
    public function checkPermission(string $perm, string $filepath):bool
    {
        $r = false;
        $w = false;
        $x = false;

        if (!file_exists($filepath)) {
            throw new Server500(new \ArrayObject(array("explain" =>
                "Cannot access to the file $filepath : File does not exit",
                "solution" =>
                    "Please set the correct filepath or 
                    set to true the parameter [fcreate] of JsonListener::open function.")));
        }

        if ($perm === 'r') {
            $r = true;
        }
        else if (in_array($perm, array('r+' ,'w' , 'w+' , 'a+' , 'x' , 'x+' , 'c' , 'c+')) ){
                $r = $w = true;
        }
        elseif ($perm === 'rwx') {
            $r = $w = true;
        }
        else {
            throw new Server500(new \ArrayObject(array("explain" =>
            "Undefined permission $perm for file $filepath",
            "solution" => "Please set a valid permission [r, r+, w, w+, a+, x, x+, c, c+]")));
        }

        if ($r) {
            if (!is_readable($filepath)) {
                throw new Server500(new \ArrayObject(array("explain" =>
                    "Cannot open file $filepath : File not readable",
                    "solution" => "Please set the readable permission")));
            }
        }

        if ($w) {
            if (!is_writable($filepath)) {
                throw new Server500(new \ArrayObject(array("explain" => "$filepath is not writable",
                    "solution" => "Please set the writable permission")));
            }
        }

        if ($w) {
            if (!is_writable($filepath)) {
                throw new Server500(new \ArrayObject(array("explain" => "$filepath is not writable",
                    "solution" => "Please set the writable permission")));
            }
        }

        if ($x) {
            if (!is_executable($filepath)) {
                throw new Server500(new \ArrayObject(array("explain" => "$filepath is not executable",
                    "solution" => "Please set the executable permission")));
            }
        }
        return (true);
    }
}
