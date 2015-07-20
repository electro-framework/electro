<?php
namespace Selene\Welcome\Config;

use Selene\Welcome\Controllers\Index;

class WelcomeModule
{
  const ref = __CLASS__;

  static function routes ()
  {
    $module = 'selene-framework/welcome';

    return [

      // Example route implementing a self-contained component-like controller.

      PageRoute ([
        'title'      => 'Welcome',
        'URI'        => '',           // The root URI
        'controller' => Index::ref,
      ]),

      // Example route using an automatic controller and an external view.

      PageRoute ([
        'title'          => 'Example Page',
        'URI'            => 'example',
        'module'         => $module,
        'view'           => 'index.html',
        'autoController' => true,
      ]),

    ];
  }
}
