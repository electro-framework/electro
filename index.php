<?php
require "private/packages/autoload.php";

$application = new Selenia\Application();

$application->run (__DIR__);
