<?php
namespace App\LoginForms\Config;

use App\LoginForms\Controllers\Login;
use Selenia\Core\Assembly\Services\ModuleServices;
use Selenia\Interfaces\Http\RoutableInterface;
use Selenia\Interfaces\Http\RouterInterface;
use Selenia\Interfaces\ModuleInterface;
use Selenia\Routing\Navigation;

class LoginFormsModule implements ModuleInterface, RoutableInterface
{
  /** @var LoginFormsSettings */
  private $settings;

  function __invoke (RouterInterface $router)
  {
    return $router->matchPrefix ($this->settings->urlPrefix (),
      function (RouterInterface $router) {
        $router
          ->dispatch ([
            'login' => Login::class,
          ]);
      });
  }

  function configure (ModuleServices $module, LoginFormsSettings $settings)
  {
    $this->settings = $settings;
    $module
      ->provideTranslations ()
      ->setDefaultConfig ([
        'main' => [
          'translation' => true,
        ],
      ])
      ->onPostConfig (function () use ($module) {
        $module
          ->provideNavigation ([$this, 'navigation'])
          ->registerRouter ($this);
      });
  }

  private function navigation ()
  {
    $prefix = $this->settings->urlPrefix ();
    return [
      "$prefix/login" => (new Navigation)
        ->title ('$LOGIN_PROMPT')
        ->visible (N),
    ];
  }

}
