<?php


namespace IumioFramework\Masters;
use IumioFramework\Core\Base\ParameterBag;
use MongoDB\BSON\ObjectID;

/**
 * Class IumioUltimaMaster
 * This is the parent master for all subclass
 * @package iumioFramework\Masters
 */

class IumioUltimaMaster
{
    protected $masterFirst = NULL;

    /**
     * @param mixed $himself
     * @return int
     */
    final protected function mastering($himself):int
    {
        $this->masterFirst = $himself;
        return (1);
    }

    /**
     * @param string $service
     * @return mixed
     */
    protected function get(string $service)
    {
        switch ($service)
        {
            case 'request':
                return (new ParameterBag())->get('request');
                break;
            case 'query':
                return (new ParameterBag())->get('query');
                break;
        }
    }

    public function render()
    {
        
    }

}