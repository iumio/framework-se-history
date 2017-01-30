<?php

namespace IumioFramework\Core\Requirement\Relexion;

/**
 * Class IumioReflexion
 * @package IumioFramework\Core\Requirement\Relexion
 * @author RAFINA Dany <danyrafina@gmail.com>
 */
class IumioReflexion
{

    /**
     * Pass method arguments by name
     * @param string $class Class name
     * @param string $method $method
     * @param array $args Method parameters
     * @return mixed
     * @throws \Exception
     */

    public function __named(string $class, string $method, array $args = array())
    {
        try
        {
            // echo $class."\n";
            // exit();
            $reflection = new \ReflectionMethod($class, $method);
        }
        catch (\Exception $ex)
        {
            throw new \Exception("Iumio Reflexion Method Error : ".$ex->getMessage());
        }

        $pass = array();
        foreach($reflection->getParameters() as $param)
            $pass[] = $args[$param->getName()] ?? $param->getDefaultValue();

        try
        {
            $rs = $reflection->invokeArgs(new $class(), $pass);
        }
        catch (\Exception $ex)
        {
            throw new \Exception("Iumio Reflexion Invoke Error : ".$ex->getMessage());
        }

        return ($rs);
    }

    /** Create a simple instance
     * @param string $class Class Name
     * @param array $args Constructor parameters
     * @throws \Exception
     */
    public function __simple(string $class, array $args = array())
    {
        try
        {
            $class = new \ReflectionClass($class);
            if (empty($args))
                $class->newInstanceArgs();
            else
                $class->newInstanceArgs(array($args));
        }
        catch (\Exception $ex)
        {
            throw new \Exception("Iumio Reflexion Class Error : ".$ex->getMessage());
        }
    }
}