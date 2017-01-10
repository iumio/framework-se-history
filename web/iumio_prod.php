<?php

/**
 * Iumio File for production environment
 */

$loader = require '../vendor/iumio_framework/php/Core/Requirement/Autoloader.php';
include_once '../vendor/iumio_framework/php/Core/Base/Debug/Debug.php';
use IumioFramework\Core\Base\Debug\Debug;

define('ENVIRONMENT', 'PROD');
define('HOST', $_SERVER['HTTP_HOST']);
define('ROOT', $_SERVER['DOCUMENT_ROOT']);

// This check prevents access to debug front controllers that are deployed by accident to production servers.
// Feel free to remove this, extend it, or make something more sophisticated.
if (isset($_SERVER['HTTP_CLIENT_IP'])
    || isset($_SERVER['HTTP_X_FORWARDED_FOR'])
    || !(in_array(@$_SERVER['REMOTE_ADDR'], array('127.0.0.2')) || php_sapi_name() === 'cli-server')
) {
    //  array('127.0.0.2', 'fe80::1', '::1')
    header('HTTP/1.0 403 Forbidden');
    include_once '../vendor/iumio_framework/theme/default/views/Server403.php';

    $server = new Server403(new ArrayObject(array("solution" => 'Check '.basename(__FILE__).' for more information.')));
    $server->display();
}

Debug::disabled();