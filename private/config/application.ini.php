<?php
// Application-specific configuration

return [
  'main' => [

    'name'                => 'site',
    'appName'             => 'Your App',
    'title'               => '@ - Your App',
    'defaultURI'          => '/',
    'routingMapFile'      => 'private/config/routes.php',
    'autoControllerClass' => 'Controller',
    #'favicon'             => '',
    'translation'         => false,
    #'languages'           => [],
    'debugMode'           => true,
    'compressOutput'      => true,
    'globalSessions'      => false,
    'isSessionRequired'   => false,
    'imageRedirection'    => true
  ]
];