<?php

namespace iumioFramework\Core\Base\Database\ORM;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use iumioFramework\Theme\Server\Server500;
use iumioFramework\Core\Base\Json\JsonListener as JL;

/**
 * Class iumioUltimaDoctrine
 * @package iumioFramework\Core\Base\Database\ORM
 * @author RAFINA Dany <danyrafina@gmail.com>
 */
class iumioUltimaDoctrine
{
    use UltimaORM;

    /**
     * iumioUltimaDoctrine constructor.
     * @param string $app App name
     * @param string|null $entitypath Entity Path if is differ of default path
     */
    public function __construct(string $app, string $entitypath = null)
    {
        $this->app = $app;
        $this->entityPath = ROOT_APPS.$this->app.'/Extras/Entity/';
        $this->requireAutoload();
    }

    final protected function createEntityManagerInstance(bool $mode)
    {
        $file = JL::open(CORE."/config_files/databases.json");
        if (count( (array) $file) == 0)
            throw new Server500(new \ArrayObject(array("explain" => "Database file is empty", "solution" => "Add database informations in databases.json")));

        $coname = ($this->connectionName);
        $file = $file->$coname;

        print_r($file);
        if ($file->db_driver == null || $file->db_driver == '')
            throw new Server500(new \ArrayObject(array("explain" => "No Driver on database config", "solution" => "Add database driver in databases.json")));


        $this->params['driver'] = (strstr($file->db_driver, 'pdo'))? $file->db_driver : 'pdo_'.$file->db_driver;
        $this->params['user'] = $file->db_user;
        $this->params['password'] = $file->db_password;
        $this->params['dbname'] = $file->db_name;
        $this->params['host'] = $file->db_host;

        $config = Setup::createAnnotationMetadataConfiguration(array($this->entityPath), $mode);
        $this->em = EntityManager::create($this->params, $config);

    }

    protected function requireAutoload()
    {
        require_once ROOT_VENDOR_LIBS."doctrine2/vendor/autoload.php";
    }

    /**
     * @param bool $mode
     * @throws Server500
     */
     public function getConnection(bool $mode = false)
    {
        $file = JL::open(CORE."/config_files/databases.json");
        if (count( (array) $file) == 0)
            throw new Server500(new \ArrayObject(array("explain" => "Database file is empty", "solution" => "Add database informations in databases.json")));


        $config = Setup::createAnnotationMetadataConfiguration(array($this->entityPath), $mode);
        $this->em = EntityManager::create($this->params, $config);
    }

    /**
     * @param bool $mode
     * @return EntityManager
     */
    public function getEntityManager(bool $mode = false): EntityManager
    {
        if ($this->em == null) $this->createEntityManagerInstance($mode);
        return ($this->em);
    }

}

