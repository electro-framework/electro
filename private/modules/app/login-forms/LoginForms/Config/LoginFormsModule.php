<?php
namespace App\LoginForms\Config;

use App\LoginForms\Controllers\Login;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Selenia\Core\Assembly\Services\ModuleServices;
use Selenia\Interfaces\Http\RequestHandlerInterface;
use Selenia\Interfaces\Http\RouterInterface;
use Selenia\Interfaces\ModuleInterface;
use Selenia\Interfaces\Navigation\NavigationInterface;
use Selenia\Interfaces\Navigation\NavigationProviderInterface;

class LoginFormsModule implements ModuleInterface, RequestHandlerInterface, NavigationProviderInterface
{
  /** @var RouterInterface */
  private $router;
  /** @var LoginFormsSettings */
  private $settings;

  function __invoke (ServerRequestInterface $request, ResponseInterface $response, callable $next)
  {
    return $this->router
      ->set ([
        $this->settings->urlPrefix () => [
          'login' => Login::class,
        ],
      ])
      ->__invoke ($request, $response, $next);
  }

  function configure (ModuleServices $module, LoginFormsSettings $settings, RouterInterface $router)
  {
    $this->settings = $settings;
    $this->router   = $router;
    $module
      ->provideTranslations ()
      ->setDefaultConfig ([
        'main' => [
          'translation' => true,
        ],
      ])
      ->onPostConfig (function () use ($module) {
        $module
          ->provideNavigation ($this)
          ->registerRouter ($this);
      });
  }

  function defineNavigation (NavigationInterface $navigation)
  {
    $prefix = $this->settings->urlPrefix ();
    $navigation->add([
      "$prefix/login" => $navigation
        ->link()
        ->title ('$LOGIN_PROMPT')
        ->visible (N),
    ]);
  }

}
