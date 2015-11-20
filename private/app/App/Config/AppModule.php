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
use Selenia\Interfaces\Http\RequestHandlerPipelineInterface;
use Selenia\Interfaces\ModuleInterface;
use Selenia\Localization\Middleware\LanguageMiddleware;
use Selenia\Localization\Middleware\TranslationMiddleware;
use Selenia\Routing\Middleware\RoutingMiddleware;
use Selenia\Sessions\Middleware\SessionMiddleware;

class AppModule implements ModuleInterface
{
  function boot (Application $app, RequestHandlerPipelineInterface $middleware)
  {
    $middleware
      ->set ([
        when (!$app->debugMode, CompressionMiddleware::class),
        WebConsoleMiddleware::class,
        ErrorHandlingMiddleware::class,
        SessionMiddleware::class,
        CsrfMiddleware::class,
        LanguageMiddleware::class,
        AuthenticationMiddleware::class,
        FileServerMiddleware::class,
        TranslationMiddleware::class,
        RoutingMiddleware::class,
        URINotFoundMiddleware::class,
      ]);
  }

}
