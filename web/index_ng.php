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

// Require the Framework Environment Dispatcher to set specific environment
$frameworkEnv = require_once __DIR__.
    '/../vendor/iumio_framework/php/Core/Requirement/Environment/FrameworkEnvironmentDispatcher.php';


\iumioFramework\Core\Requirement\Environment\FrameworkEnvironmentDispatcher::dispatch();

