<?php
use Selenia\Core\DependencyInjection\Injector;
use Selenia\WebServer\WebServer;
/*
 * Temporarily uncomment the following line for troubleshooting on restricted hosting environments.
 * It enables error logging to a file the project's root directory.
*/
//ini_set ('error_log', __DIR__ . '/error.log');

// Start the class autoloader.

require "private/packages/autoload.php";

/*
 * Run the framework's HTTP subsystem, which then runs the web application.
 * You can customize the Dependency Injector the framework uses by changing the fist argument of
 * the class constructor below.
 */
(new WebServer (new Injector))->run (__DIR__);
