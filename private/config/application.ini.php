<?php
// Application-specific configuration

return [
  'main' => [

    'name'                => 'site',
    'appName'             => 'Your App',
    'title'               => '@ - Your App',
    'defaultURI'          => '/',
    #'favicon'             => '',
    'autoControllerClass' => 'Selene\Controller',
    'tasksClass'          => 'Tasks',
    'translation'         => false,
    #'languages'           => [],
    'globalSessions'      => false,
    'isSessionRequired'   => false,

    'storagePath'         => 'private/storage',
    'imageArchivePath'    => 'private/storage/images',
    'fileArchivePath'     => 'private/storage/files',
    'cachePath'           => 'private/storage/cache',
    'imagesCachePath'     => 'private/storage/cache/images',
    'modulesPath'         => 'private/modules',
    'defaultModulesPath'  => 'private/packages',
    'configPath'          => 'private/config',

    'modules'             => [
      'selene-framework/core-tasks',
      'selene-framework/welcome',
      'selene-framework/application-builder',
    ],

  ],
];
