<?php
require "../vendor/autoload.php";

$application = new Application();
$application->run(__DIR__, dirname(__DIR__) . '/private');
