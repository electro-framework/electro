<?php
namespace AppKernel\Config;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Selenia\Application;
use Selenia\Debugging\Middleware\WebConsoleMiddleware;
use Selenia\ErrorHandling\Middleware\ErrorHandlingMiddleware;
use Selenia\FileServer\Middleware\ContentServerMiddleware;
use Selenia\FileServer\Middleware\FileServerMiddleware;
use Selenia\Http\Middleware\CompressionMiddleware;
use Selenia\Http\Middleware\CsrfMiddleware;
use Selenia\Http\Middleware\URLNotFoundMiddleware;
use Selenia\Interfaces\Http\Shared\ApplicationMiddlewareInterface;
use Selenia\Interfaces\Http\Shared\ApplicationRouterInterface;
use Selenia\Interfaces\ModuleInterface;
use Selenia\Localization\Middleware\LanguageMiddleware;
use Selenia\Localization\Middleware\TranslationMiddleware;
use Selenia\Routing\Middleware\AutoRoutingMiddleware;
use Selenia\Routing\Middleware\PermalinksMiddleware;
use Selenia\Sessions\Middleware\SessionMiddleware;

class AppKernelModule implements ModuleInterface
{
  function __invoke (ServerRequestInterface $request, ResponseInterface $response, callable $next)
  {
    // Your app-specific configuration code goes here.

    return $next();
  }

  function boot (Application $app, ApplicationMiddlewareInterface $middleware, $debugMode, $debugConsole)
  {
    if ($app->isWebBased)
      $middleware
        ->set ([
          // Uncomment the following line to enable this class as a middleware.
          // $this,
          ContentServerMiddleware::class,
          FileServerMiddleware::class,
          when (!$debugMode, CompressionMiddleware::class),
          when ($debugConsole, WebConsoleMiddleware::class),
          WebConsoleMiddleware::class,
          TranslationMiddleware::class,
          ErrorHandlingMiddleware::class,
          SessionMiddleware::class,
          CsrfMiddleware::class,
          LanguageMiddleware::class,
          PermalinksMiddleware::class .
          'router' => ApplicationRouterInterface::class,
          when ($debugMode, AutoRoutingMiddleware::class),
          URLNotFoundMiddleware::class,
        ]);
  }

}
