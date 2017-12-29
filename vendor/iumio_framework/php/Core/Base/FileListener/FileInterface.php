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

namespace iumioFramework\Core\Base\File;

use iumioFramework\Exception\Server\Server500;


/**
 * Interface
 * @package iumioFramework\Core\Base\File
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */

interface FileInterface
{

    /**
     * Open file
     * @param $filepath string Filepath
     * @param $perm string File permissions ([r] is by default)
     * @param $fcreate bool Force the file creation if not exist before open it (By default, is none)
     * @return resource File content
     */
    public function open(string $filepath, string $perm = "r", bool $fcreate = false);

    /** Close file
     * @return int Is closed
     */
    public function close():int;

    /** Put content in configuration file
     * @param $contents string new file content
     * @param $inline bool Add item on the same line
     * @param int $length If the length argument is given, writing will
     * stop after length bytes have been written or the end of string is reached, whichever comes first.
     * @return int If the write task is succesfull
     * @throws \Exception If file cannot be created
     */
    public function put(string $contents, int $length = null, bool $inline = false):int;

    /** Return file resource
     * @return null|resource Return the file resource when is opened or null if no file was opened
     */
    public function getFile();

    /** Return file path
     * @return null|string Return the file path when is opened or null if no file was opened
     */
    public function getFilePath();

    /** Return file permission
     * @return null|string Return the file permission when is opened or null if no file was opened
     */
    public function getFilePerm();

    /** Open file and returning an array of each line
     * @param $filepath string Filepath
     * @return array File array content
     * @throws Server500|\Exception If file does not exist or not readable | If cannot create file
     */
    public function openFileAsArray(string $filepath):array;

    /** Reverse a file array (only a file opened with FileListenner::openFileAsArray
     * @param int $break Line number to catch (By default, the value 0 return all lines)
     * @return array The file array
     * @throws Server500 If file is not an array
     */
    public function reverse(int $break = 0):array;
}
