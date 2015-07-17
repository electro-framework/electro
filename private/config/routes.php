<?php

use App\Controllers\Welcome;

return [
  'routes' => [

    PageRoute ([
      'title'      => 'Welcome',
      'URI'        => '',
      'controller' => Welcome::ref,
    ]),

    PageRoute ([
      'title'          => 'Example Module',
      'URI'            => 'example',
      'module'         => 'example-module',
      'view'           => 'index.html',
      'autoController' => true,
    ]),

  ],
];
