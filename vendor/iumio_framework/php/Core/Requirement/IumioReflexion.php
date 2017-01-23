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
            $reflection = new \ReflectionMethod($class, $method);
        }
        catch (\Exception $ex)
        {
            throw new \Exception("Iumio Relexion Error : ".$ex->getMessage());
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
            throw new \Exception("Iumio Relexion Invoke Error : ".$ex->getMessage());
        }

        return ($rs);
    }
}