<?php
namespace App\Welcome;

use App\Welcome\Controllers\Index;
use Selenia\Core\Assembly\Services\ModuleServices;
use Selenia\Interfaces\ModuleInterface;

class WelcomeModule implements ModuleInterface
{
  static function routes ()
  {
    $module = 'app/welcome';

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

  function boot () { }

  function configure (ModuleServices $module)
  {
    $module
      ->publishPublicDirAs ('modules/selenia/welcome')
      ->provideTemplates ()
      ->provideViews ()
      ->registerRoutes (self::routes ())
      ->setDefaultConfig ([
        'main' => [
          'name'    => 'site',              // session cookie name
          'appName' => 'Your App',
          'title'   => '@ - Your App',      // @ = page title
        ],
      ]);
  }

}
