<?php
require "../vendor/autoload.php";

$application = new Selene\Application();
$application->run(__DIR__, dirname(__DIR__) . '/private');
