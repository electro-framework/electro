<?php
namespace App\Config;

use Selenia\Application;
use Selenia\Core\Assembly\Services\ModuleServices;
use Selenia\Interfaces\MiddlewareStackInterface;
use Selenia\Interfaces\ModuleInterface;

class AppModule implements ModuleInterface
{
  function boot (Application $app = null, MiddlewareStackInterface $middleware = null)
  {
    $middleware
      ->addIf (!$app->debugMode, 'Selenia\Http\Middleware\CompressionMiddleware')
      ->addIf ($app->debugMode, 'Selenia\Debugging\Middleware\WebConsoleMiddleware')
      ->add ('Selenia\ErrorHandling\Middleware\ErrorHandlingMiddleware')
      ->add ('Selenia\Sessions\Middleware\SessionMiddleware')
      ->add ('Selenia\Http\Middleware\CsrfMiddleware')
      ->add ('Selenia\Localization\Middleware\LanguageMiddleware')
      ->add ('Selenia\Authentication\Middleware\AuthenticationMiddleware')
      ->add ('Selenia\FileServer\Middleware\FileServerMiddleware')
      ->add ('Selenia\Localization\Middleware\TranslationMiddleware')
      ->add ('Selenia\Routing\Middleware\RoutingMiddleware')
      ->add ('Selenia\HttpMiddleware\Middleware\URINotFoundMiddleware');
  }

  function configure (ModuleServices $module) { }

}
