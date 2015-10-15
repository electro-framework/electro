<?php
/*
 * Temporarily uncomment the following line for troubleshooting on restricted hosting environments.
 * It enables error logging to a file the project's root directory.
*/
//ini_set ('error_log', __DIR__ . '/error.log');

// Start the class autoloader.
require "private/packages/autoload.php";

/*
 * Run the framework, which then runs the web application on the current directory.
 */
$application = new Selenia\Application();
$application->run (__DIR__);
