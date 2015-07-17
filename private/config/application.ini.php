<?php
// Application-specific configuration

return [
  'main' => [

    'name'                => 'site',
    'appName'             => 'Your App',
    'title'               => '@ - Your App',
    'defaultURI'          => '/',
    'routingMapFile'      => 'config/routes.php',
    'autoControllerClass' => 'Selene\\Controller',
    #'favicon'             => '',
    'translation'         => false,
    #'languages'           => [],
    'globalSessions'      => false,
    'isSessionRequired'   => false,

    'modules' => [
      'ExampleModule',
      'ModulesManager',
    ],

  ]
];
