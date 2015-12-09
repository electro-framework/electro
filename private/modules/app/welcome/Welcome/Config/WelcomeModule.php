<?php
namespace App\Welcome\Config;

use App\Welcome\Controllers\Index;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Selenia\Core\Assembly\Services\ModuleServices;
use Selenia\Http\Components\PageComponent;
use Selenia\Interfaces\Http\RouterInterface;
use Selenia\Interfaces\ModuleInterface;
use Selenia\Interfaces\Navigation\NavigationInterface;
use Selenia\Interfaces\Navigation\NavigationProviderInterface;

class WelcomeModule implements ModuleInterface, NavigationProviderInterface
{
  /** @var RouterInterface */
  private $router;

  function __invoke (ServerRequestInterface $request, ResponseInterface $response, callable $next)
  {
    return $this->router
      ->set ([

        // Example route implementing a self-contained component-like controller.

        '.' => Index::class,

        // Example route using an automatic controller and an external view.

        'example' => factory (function (PageComponent $page) {
          $page->templateUrl = 'index.html';
          return $page;
        }),

      ])
      ->__invoke ($request, $response, $next);
  }

  function configure (ModuleServices $module, RouterInterface $router)
  {
    $this->router = $router;
    $module
      ->publishPublicDirAs ('modules/selenia/welcome')
      ->provideTemplates ()
      ->provideViews ()
      ->registerRouter ($this)
      ->provideNavigation ($this)
      ->setDefaultConfig ([
        'main' => [
          'name'    => 'site',              // session cookie name
          'appName' => 'Your App',
          'title'   => '@ - Your App',      // @ = page title
        ],
      ]);
  }

  function defineNavigation (NavigationInterface $navigation)
  {
    $navigation->add ([
      '' => $navigation
        ->link ()
        ->id ('home')
        ->title ('Welcome')
        ->links ([
          'example' => $navigation
            ->link ()
            ->title ('Example'),
        ]),
    ]);
  }

}
