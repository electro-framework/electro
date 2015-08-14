<?php

use Selene\Welcome\Config\WelcomeModule;

ModuleOptions (__DIR__, [
  'templates'  => true,
  'views'      => true,
  'public'     => 'modules/welcome',
//  'publish'    => [],
//  'lang'       => true,
//  'assets'     => [],
//  'components' => [],
//  'presets'    => [],
  'routes'     => WelcomeModule::routes (),
  'config'     => [
    'main' => [
      'name'    => 'site',              // session cookie name
      'appName' => 'Your App',
      'title'   => '@ - Your App',      // @ = page title
    ],
  ],
]);
