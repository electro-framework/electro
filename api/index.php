<?php

use Electro\Profiles\ApiProfile;

require (dirname (__DIR__) . '/private/src/Bootloader.php');

App\Bootloader::make ()->boot (new ApiProfile, 1);
