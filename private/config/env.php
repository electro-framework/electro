<?php
Dotenv::load (dirname (dirname (__DIR__)));
Dotenv::required (['DB_DRIVER', 'DB_HOST', 'DB_DATABASE', 'DB_USERNAME', 'DB_PASSWORD']);
