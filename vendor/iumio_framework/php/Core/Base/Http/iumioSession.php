<?php

namespace iumioFramework\Core\Base\Http\Session;

use iumioFramework\Core\Base\Http\MetaBagRequest;
use iumioFramework\Core\Base\Http\SessionBagRequest;
use iumioFramework\Core\Base\Http\SessionInterfaceRequest;
use iumioFramework\Exception\Server\Server500;


/**
 * iumioSession class.
 * Manage a session
 *
 * @author Fabien Potencier <fabien@symfony.com>
 * @modifiedby Dany Rafina <danyrafina@gmail.com>
 */
class iumioSession implements SessionInterfaceRequest
{
    protected $session;
    /**
     * @return mixed
     */

    /**
     * iumioSession constructor.
     */
    public function __construct()
    {
        //session_start();
        $this->start();
    }

    public function start()
    {
        $this->session = $_SESSION;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        // TODO: Implement getId() method.
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function setId($id)
    {
        // TODO: Implement setId() method.
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        // TODO: Implement getName() method.
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function setName($name)
    {
        // TODO: Implement setName() method.
    }

    /**
     * @param int|null $lifetime
     * @return mixed
     */
    public function invalidate($lifetime = null)
    {
        // TODO: Implement invalidate() method.
    }

    /**
     * @param bool $destroy
     * @param int|null $lifetime
     * @return mixed
     */
    public function migrate($destroy = false, $lifetime = null)
    {
        // TODO: Implement migrate() method.
    }

    /**
     * @return mixed
     */
    public function save()
    {
        // TODO: Implement save() method.
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function has($name)
    {
        // TODO: Implement has() method.
    }

    /**
     * @param string $name
     * @param mixed|null $default
     * @return mixed
     */
    public function get($name, $default = null)
    {
        return (isset($this->session[$name])? $this->session[$name] : null);
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return bool
     * @throws Server500
     */
    public function set($name, $value)
    {
        if (is_string($name))
        {
            $_SESSION[$name] = $value;
            $this->start();
            return (true);
        }
        else
            throw new Server500(new \ArrayObject(array("explain" => "Session Error : Your session name is not a string value", "solution" => "Please check your value type")));
        return (false);
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return ($this->session);
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function replace(array $attributes)
    {
        // TODO: Implement replace() method.
    }

    /**
     * @param string $name
     * @return bool
     * @throws Server500
     */
    public function remove($name)
    {
        if (isset($_SESSION[$name]))
        {
            unset ($_SESSION[$name]);
            $this->start();
            return (true);
        }
        else
            throw new Server500(new \ArrayObject(array("explain" => "iumio Session Error : Your session name is not defined", "solution" => "Please check the session object with iumioSession::all instruction")));
        return (false);
    }

    /**
     * @return mixed
     */
    public function clear()
    {
        return(session_destroy());
    }

    /**
     * @return mixed
     */
    public function isStarted()
    {
        // TODO: Implement isStarted() method.
    }

    /**
     * @param SessionBagRequest $bag
     * @return mixed
     */
    public function registerBag(SessionBagRequest $bag)
    {
        // TODO: Implement registerBag() method.
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function getBag($name)
    {
        // TODO: Implement getBag() method.
    }

    /**
     * @return mixed
     */
    public function getMetaBagRequest()
    {
        // TODO: Implement getMetaBagRequest() method.
    }

}