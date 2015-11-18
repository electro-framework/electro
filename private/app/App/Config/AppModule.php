<?php
namespace App\Config;

use Selenia\Application;
use Selenia\Authentication\Middleware\AuthenticationMiddleware;
use Selenia\Debugging\Middleware\WebConsoleMiddleware;
use Selenia\ErrorHandling\Middleware\ErrorHandlingMiddleware;
use Selenia\FileServer\Middleware\FileServerMiddleware;
use Selenia\Http\Middleware\CompressionMiddleware;
use Selenia\Http\Middleware\CsrfMiddleware;
use Selenia\Http\Middleware\URINotFoundMiddleware;
use Selenia\Interfaces\Http\HandlerPipelineInterface;
use Selenia\Interfaces\ModuleInterface;
use Selenia\Localization\Middleware\LanguageMiddleware;
use Selenia\Localization\Middleware\TranslationMiddleware;
use Selenia\Routing\Middleware\RoutingMiddleware;
use Selenia\Sessions\Middleware\SessionMiddleware;

class AppModule implements ModuleInterface
{
  function boot (Application $app = null, HandlerPipelineInterface $middleware = null)
  {
    $middleware
      ->addIf (!$app->debugMode, CompressionMiddleware::class)
      ->addIf ($app->debugMode, WebConsoleMiddleware::class)
      ->add (ErrorHandlingMiddleware::class)
      ->add (SessionMiddleware::class)
      ->add (CsrfMiddleware::class)
      ->add (LanguageMiddleware::class)
      ->add (AuthenticationMiddleware::class)
      ->add (FileServerMiddleware::class)
      ->add (TranslationMiddleware::class)
      ->add (RoutingMiddleware::class)
      ->add (URINotFoundMiddleware::class);
  }

}
