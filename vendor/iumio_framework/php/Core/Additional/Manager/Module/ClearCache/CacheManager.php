<?php

namespace IumioFramework\Manager\Console\Module\Cache;
use IumioFramework\Core\Additionnal\Server\IumioServerManager as Server;
use IumioFramework\Manager\Console\Module\IumioManagerModule as ModuleInterface;
use IumioFramework\Core\Additionnal\Console\Manager\Display\IumioManagerOutput as Output;

/**
 * Class CacheManager
 * @package IumioFramework\Manager\Console\Module\Cache
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class CacheManager implements ModuleInterface
{
    protected $options;

    public function __render()
    {
        if (empty($this->options))
           $this->deleteCache("dev");
        else
        {
            $opt = $this->options[2] ?? null;
            if ($opt == "--env=dev" || $opt == "--env=DEV")
                $this->deleteCache("dev", "yes");
            elseif ($opt == "--env=preprod" || $opt == "--env=PREPROD")
                $this->deleteCache("preprod", "yes");
            elseif ($opt == "--env=prod" || $opt == "--env=PROD")
                $this->deleteCache("prod", "yes");
            elseif ($opt == "--env=all" || $opt == "--env=ALL")
                $this->deleteAllCache();
            else
                throw new \Exception("Cache Manager Module Error : Environment or option is not available");
        }
    }

    /** Delete a cache from a specific environment
     * @param string $env Environment name
     * @param string $isdefault If no environment option
     */
    private function deleteCache(string $env, string $isdefault = null)
    {
        Output::displayAsSuccess("Hey, I delete cache from $env environment ".(($isdefault == null)? 'as default' : ''), "none");
        Output::displayAsSuccess("......................", "none");
        $this->callDelCreaServer($env);
        Output::displayAsSuccess("Cache delete for $env environment is successfull.");
    }

    /** Call Server delete and create function
     * @param string $env Environment name
     */
    private function callDelCreaServer(string $env)
    {
        Server::delete(ROOT_CACHE."/$env/", 'directory');
        Server::create(ROOT_CACHE."/$env/", 'directory');
    }

    /** Delete a cache for all environment
     */
    private function deleteAllCache()
    {
        $a = array("dev", "preprod", "prod");
        Output::displayAsSuccess("Hey, I delete cache for all environment", "none");
        Output::displayAsSuccess("......................", "none");
        for ($i = 0; $i < count($a); $i++)
            $this->callDelCreaServer($a[$i]);
        Output::displayAsSuccess("Cache delete for all environment is successfull.");
    }

    public function __alter()
    {
        // TODO: Implement __alter() method.
    }

    public function __construct(array $options = array())
    {
        if (empty($options))
            $this->__render();
        else
        {
            $this->options = $options;
            $this->__render();
        }
    }

}