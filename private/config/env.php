<?php
use Dotenv\Dotenv;

$dotenv = new Dotenv(dirname (__DIR__));
$dotenv->load();
$dotenv->required (['DB_DRIVER', 'DB_HOST', 'DB_DATABASE', 'DB_USERNAME', 'DB_PASSWORD']);
