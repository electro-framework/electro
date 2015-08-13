<?php
// Application-specific configuration

return [
  'main' => [

    'name'                => 'site',          // session cookie name
    'appName'             => 'Your App',
    'title'               => '@ - Your App',  // @ = page title
    'defaultURI'          => '/',
    #'favicon'             => '',             // uncomment only if required
    'autoControllerClass' => 'Selene\Controller',
    'subApplications'     => [],
    'URINotFoundURL'      => false,           // custom 404 page

    // Localization:
    'translation'         => false,           // enable translations; default language is selected on .env
    'languages'           => [
      'en:en-US:English:en_US|en_US.UTF-8|us',
      'pt:pt-PT:Português:pt_PT|pt_PT.UTF-8|ptg',
    ],

    // Sessions:
    'globalSessions'      => false,     // share the sessio between the application and its sub-applications?
    'requireLogin'        => false,     // require login for this application?

    // For use with the admin-module:
    'homeIcon'            => '',
    'homeTitle'           => 'Home',
    'userModel'           => '',
    'loginView'           => '',
  ],
];
