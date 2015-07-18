<?php

use Selene\Welcome\Config\WelcomeModule;

ModuleOptions (__DIR__, [
  'templates'  => true,
  'views'      => true,
  'public'     => 'modules/welcome',
//  'publish'    => [],
//  'lang'       => true,
//  'assets'     => [],
//  'config'     => [],
//  'components' => [],
//  'presets'    => [],
  'routes'     => WelcomeModule::routes (),
]);
