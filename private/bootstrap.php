<?php
//----------------------------------------------------------------------------------------------------------------------
// Bootstrap the application
//----------------------------------------------------------------------------------------------------------------------
// This runs before the framework is initialized, right after the autoloader is set.
// It runs for both web and console based applications.

// If a .env file exists, load it.

$envp = dirname (__DIR__);
if (file_exists ("$envp/.env")) {
  $dotenv = new Dotenv\Dotenv($envp);
  $dotenv->load ();
}
