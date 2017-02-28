<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
echo getcwd().'/../../iumio_framework/php/Core/Additional/Manager/Module/DoctrineManager/Components'.DIRECTORY_SEPARATOR.'DoctrineComponentsManager.php\n';
include_once getcwd().'/../../iumio_framework/php/Core/Additional/Manager/Module/DoctrineManager/Components'.DIRECTORY_SEPARATOR.'DoctrineComponentsManager.php';
use IumioFramework\Manager\Console\Module\Doctrine\DoctrineComponentsManager;

$doctrine = new DoctrineComponentsManager('TestApp');

$em = $doctrine->getEntityManager();

$entityManager = $em;
return ConsoleRunner::createHelperSet($entityManager);