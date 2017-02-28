<?php


namespace IumioFramework\Manager\Console\Module\Doctrine;

include_once ROOT_VENDOR_CLI_MODULES.'DoctrineManager/Components/DoctrineComponentsManager.php';

use IumioFramework\Manager\Console\Module\IumioManagerModule as ModuleInterface;

use IumioFramework\Core\Additionnal\Console\Manager\Display\IumioManagerOutput as Output;
use Symfony\Component\Console\Helper\HelperSet;

/**
 * Class DoctrineManager
 * @package IumioFramework\Manager\Console\Module\Doctrine
 * @author RAFINA Dany <danyrafina@gmail.com>
 */

class DoctrineManager implements ModuleInterface
{
    protected $options;

    public function __render()
    {
        if (empty($this->options))
            Output::displayAsError("Doctrine Manager Error \n \t You must to have an option. Referer to help command\n");
        else
        {
            $opt = $this->options[2] ?? null;
            if (strstr($opt, "--appname="))
                $this->makeCLI($this->options);
            else
                Output::displayAsError("Doctrine Manager Error \n \t This command doesn't exist. Referer to help command\n");
        }
    }

    /** Create doctrine CLI
     * @param array $options Options (appname)
     * @return int
     */
    protected function makeCLI(array $options):int
    {
        $opt = $options[2] ?? null;
        $e = explode("=", $opt);
        $appname = $e[1];
        if (strpos($appname, "App") == false) Output::displayAsError("Doctrine Manager Error : App name is invalid");
        if (!is_dir(ROOT_PROJECT."/apps/".($appname))) Output::displayAsError("Doctrine Manager Notice: App $appname is not register in apps declaration.\n");

        $doctrine = new DoctrineComponentsManager($appname);

        $em = $doctrine->getEntityManager();
        include_once ROOT_VENDOR_CLI_MODULES.'DoctrineManager/Components/cli-config.php';
        return (1);
    }


    public function __alter()
    {
        // TODO: Implement __alter() method.
    }

    public function __construct(array $options = array())
    {
        $this->options = $options;
        $this->__render();
    }

}