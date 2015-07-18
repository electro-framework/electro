<?php

use Selene\ApplicaitonBuilder\Config\ApplicationBuilderModule;

ModuleOptions (__DIR__, [
  'templates'  => true,
  'views'      => true,
  'public'     => 'modules/modules-manager',
//  'publish'    => [],
//  'lang'       => true,
//  'assets'     => [],
//  'config'     => [],
//  'components' => [],
//  'presets'    => [],
  'routes'     => ApplicationBuilderModule::routes (),
]);
