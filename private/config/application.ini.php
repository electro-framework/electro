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

    'modules'             => [
      'selene-framework/core-tasks',
      'selene-framework/welcome',
      'selene-framework/application-builder',
      'selene-framework/matisse-components',
      'selene-framework/admin-module',
      'selene-framework/migrations',
    ],

  ],
];
