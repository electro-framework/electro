<?php
namespace App\Config;

use App\Controllers\Welcome;

class App
{
  const ref = __CLASS__;

  static function routes ()
  {
    return [

      // Example route implementing a self-contained component-like controller.

      PageRoute ([
        'title'      => 'Welcome',
        'URI'        => '',           // The root URI
        'controller' => Welcome::ref,
      ]),

      // Example route using an automatic controller and an external view.

      PageRoute ([
        'title'          => 'Example Module',
        'URI'            => 'example',
        'module'         => 'ExampleModule',
        'view'           => 'index.html',
        'autoController' => true,
      ]),

    ];
  }
}
