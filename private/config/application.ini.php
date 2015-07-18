<?php
// Application-specific configuration

return [
  'main' => [

    'name'                => 'site',
    'appName'             => 'Your App',
    'title'               => '@ - Your App',
    'defaultURI'          => '/',
    'autoControllerClass' => 'Selene\\Controller',
    #'favicon'             => '',
    'translation'         => false,
    #'languages'           => [],
    'globalSessions'      => false,
    'isSessionRequired'   => false,

    'modules' => [
      'selene-framework/welcome',
      'selene-framework/application-builder',
    ],

  ]
];
