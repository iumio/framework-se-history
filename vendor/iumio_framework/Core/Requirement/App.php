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

namespace iumioFramework\Core\Requirement;

/**
 * Abstract Class App
 * @package iumioFramework\Core\Requirement
 * @category Framework
 * @licence  MIT License
 * @link https://framework.iumio.com
 * @author   RAFINA Dany <dany.rafina@iumio.com>
 */
abstract class App
{
    protected $id;
    protected $name;
    protected $namespace;
    protected $default;
    protected $udapte;
    protected $creation;
    protected $status;

    /** Get update date
     * @return \DateTime Update date
     */
    public function getUdapte():\DateTime
    {
        return $this->udapte;
    }

    /** change the update date
     * @param \DateTime $udapte Update date
     */
    public function setUdapte(\DateTime $udapte)
    {
        $this->udapte = $udapte;
    }

    /** Get Creation date
     * @return \DateTime Creation date
     */
    public function getCreation():\DateTime
    {
        return $this->creation;
    }

    /** Change the creation date
     * @param \DateTime $creation The creation date
     */
    public function setCreation(\DateTime $creation)
    {
        $this->creation = $creation;
    }

    /** Get app id
     * @return int app id
     */
    public function getId():int
    {
        return $this->id;
    }

    /** Set app id
     * @param int $id new app id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /** Return app name
     * @return string app name
     */
    public function getName():string
    {
        return $this->name;
    }

    /** Set app name
     * @param string $name new app name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /** Return app namespace
     * @return string app namespace
     */
    public function getNamespace():string
    {
        return $this->namespace;
    }

    /** Set app namespace
     * @param string $namespace new app namespace
     */
    public function setNamespace(string $namespace)
    {
        $this->namespace = $namespace;
    }

    /** Get if it's default app
     * @return bool app default status
     */
    public function getDefault():bool
    {
        return $this->default;
    }

    /** Set app default status
     * @param bool $default new app default status
     */
    public function setDefault(bool $default)
    {
        $this->default = $default;
    }

    /** Return app status
     * @return string app status
     */
    public function getStatus():string
    {
        return $this->status;
    }

    /** Set app status
     * @param $status app status
     */
    public function setStatus(string $status)
    {
        $this->status = $status;
    }

    /** Save an App
     */
    abstract public function save();

    /** Delete an app
     */
    abstract public function remove();
}
