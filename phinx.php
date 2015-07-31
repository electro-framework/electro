<?php
$envp = dirname (__DIR__);
if (file_exists ("$envp/.env")) {
    $dotenv = new Dotenv\Dotenv($envp);
    $dotenv->load ();
}

return array(
    "paths" => array(
        "migrations" => "private/migrations"
    ),
    "environments" => array(
        "default_migration_table" => "phinxlog",
        "default_database" => "dev",
        "dev" => array(
            "adapter" => "sqlite",
            "host" => $_ENV['DB_HOST'],
            "name" => $_ENV['DB_DATABASE'],
            "user" => $_ENV['DB_USERNAME'],
            "pass" => $_ENV['DB_PASSWORD'],
            "charset" => $_ENV['DB_CHARSET'],
            "collation" => $_ENV['DB_COLLATION'],
            "port" => $_ENV['DB_PORT'],
            "unix_socket" => $_ENV['DB_UNIX_SOCKET'],
        )
    )
);
