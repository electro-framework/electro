<?php
namespace App\Welcome\Config;

use App\Welcome\Controllers\Index;
use Selenia\Core\Assembly\Services\ModuleServices;
use Selenia\Http\Components\PageComponent;
use Selenia\Interfaces\ModuleInterface;
use Selenia\Interfaces\RouterInterface;

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
        'controller' => Index::class,
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

  function __invoke (RouterInterface $router)
  {
    return $router
      ->dispatch ([
        ''        => Index::class,
        'example' => [
          PageComponent::class, [
            'view' => 'index.html',
          ],
        ],
      ]);
  }

  function configure (ModuleServices $module)
  {
    $module
      ->publishPublicDirAs ('modules/selenia/welcome')
      ->provideTemplates ()
      ->provideViews ()
      ->registerRouter ($this)
      ->setDefaultConfig ([
        'main' => [
          'name'    => 'site',              // session cookie name
          'appName' => 'Your App',
          'title'   => '@ - Your App',      // @ = page title
        ],
      ]);
  }

}
