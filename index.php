<?php
require "private/vendor/autoload.php";

$application = new Selene\Application();

$__dir = __DIR__ . '/private';
chdir ($__dir);
$application->run ($__dir);
