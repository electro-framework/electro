<?php

use Modules\ModulesManager\Config\ModulesManager;

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
  'routes'     => ModulesManager::routes (),
]);
