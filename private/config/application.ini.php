<?php
// Application-specific configuration

return [
  'main' => [

    'name'                => 'site',              // session cookie name
    'appName'             => 'Your App',
    'title'               => '@ - Your App',      // @ = page title
    'autoControllerClass' => 'Selene\Controller',
    'subApplications'     => [],

    // URIs:
    'homeURI'             => '',                  // homepage URI
    'URINotFoundURL'      => false,               // custom 404 page
    #'favicon'             => '',                 // uncomment only if required

    // Localization:
    'translation'         => false,               // enable translations; default language is selected on .env
    'languages'           => [
      'en:en-US:English:en_US|en_US.UTF-8|us',
      'pt:pt-PT:Português:pt_PT|pt_PT.UTF-8|ptg',
    ],

    // Sessions:
    'globalSessions'      => false,     // share the session between the application and its sub-applications?
    'requireLogin'        => false,     // require login for this application?

    // For use with the admin-module:
    'homeIcon'            => 'fa fa-home',  // CSS class list, for breadcrumbs
    'homeTitle'           => 'Home',        // for breadcrumbs
    'userModel'           => '',            // user model class name
    'loginView'           => '',            // name of custom login view
  ],
];
