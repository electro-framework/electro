<?php
use AppKernel\Init;
use Selenia\Core\DependencyInjection\Injector;
use Selenia\Core\WebApplication\WebApplication;

/*
 * Temporarily uncomment the following line for troubleshooting on restricted hosting environments.
 * It enables error logging to a file the project's root directory.
*/
//ini_set ('error_log', __DIR__ . '/error.log');

// Start the class autoloader.
require "private/packages/autoload.php";

// Setup the app.
Init::init ();

/*
 * Launch the application on HTTP request handling mode.
 * You can customize the Dependency Injector the framework uses by changing the fist argument of
 * the class constructor below.
 */
(new WebApplication (new Injector))->run (__DIR__);
