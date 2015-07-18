<?php
require "private/packages/autoload.php";

$application = new Selene\Application();

$application->run (__DIR__);
