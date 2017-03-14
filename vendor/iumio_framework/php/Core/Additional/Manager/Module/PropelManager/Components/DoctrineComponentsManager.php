<?php

namespace IumioFramework\Manager\Console\Module\Doctrine;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use IumioFramework\Theme\Server\Server500;
use IumioFramework\Core\Base\Json\JsonListener as JL;
use IumioFramework\Core\Additionnal\Console\Manager\Display\IumioManagerOutput as Output;

/**
 * Class DoctrineComponentsManager
 * @package IumioFramework\Manager\Console\Module\Doctrine
 * @author RAFINA Dany <danyrafina@gmail.com>
 */
class DoctrineComponentsManager
{
    protected $em = null;
    protected $params = array(
        'driver'   => '',
        'user'     => '',
        'password' => '',
        'dbname'   => '',
    );
    protected $entityPath = null;
    protected $app;
    protected $connectionName = 'default';

    /**
     * IumioUltimaDoctrine constructor.
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
            Output::displayAsError("Doctrine Manager Error \n \t Database file is empty. Add database driver in databases.json\n");

        $coname = ($this->connectionName);
        $file = $file->$coname;

        if ($file->db_driver == null || $file->db_driver == '')
            Output::displayAsError("Doctrine Manager Error \n \t No Driver on database config. Add database driver in databases.json\n");


        $this->params['driver'] = (strstr($file->db_driver, 'pdo'))? $file->db_driver : 'pdo_'.$file->db_driver;
        $this->params['user'] = $file->db_user;
        $this->params['password'] = $file->db_password;
        $this->params['dbname'] = $file->db_name;
        $this->params['host'] = $file->db_host;

        $config = Setup::createAnnotationMetadataConfiguration(array($this->entityPath), $mode);
        $this->em = EntityManager::create($this->params, $config);

    }

    /** Require Autoloader from composer
     * @return mixed
     */
    protected function requireAutoload()
    {
        require_once ROOT_VENDOR_LIBS."doctrine2/vendor/autoload.php";
    }


    /** Get connection
     * @param boolean $mode To enable or disable dev mode
     * @throws Server500
     */
     public function getConnection(bool $mode = false)
    {
        $file = JL::open(CORE."/config_files/databases.json");
        if (count( (array) $file) == 0)
            Output::displayAsError("Doctrine Manager Error \n \t Database file is empty. Add database driver in databases.json\n");

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

