<?php
require (__DIR__ . '/private/src/Bootloader.php');

App\Bootloader::make ()->boot (new Electro\Profiles\WebProfile);
