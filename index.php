<?php
//Uncomment the following line to log errors to the current directory, for troubleshooting.
//ini_set ('error_log', __DIR__ . '/error.log');

require "private/packages/autoload.php";

$application = new Selenia\Application();

$application->run (__DIR__);
