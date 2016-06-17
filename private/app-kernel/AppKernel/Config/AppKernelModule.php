<?php
namespace AppKernel\Config;

//use Electro\Authentication\Middleware\AuthenticationMiddleware;
use AppKernel\WelcomeMiddleware;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Electro\Application;
use Electro\Debugging\Middleware\WebConsoleMiddleware;
use Electro\ErrorHandling\Middleware\ErrorHandlingMiddleware;
use Electro\FileServer\Middleware\ContentServerMiddleware;
use Electro\FileServer\Middleware\FileServerMiddleware;
use Electro\Http\Middleware\CompressionMiddleware;
use Electro\Http\Middleware\CsrfMiddleware;
use Electro\Http\Middleware\URLNotFoundMiddleware;
use Electro\Interfaces\Http\Shared\ApplicationMiddlewareInterface;
use Electro\Interfaces\Http\Shared\ApplicationRouterInterface;
use Electro\Interfaces\ModuleInterface;
use Electro\Localization\Middleware\LanguageMiddleware;
use Electro\Localization\Middleware\TranslationMiddleware;
use Electro\Routing\Middleware\PermalinksMiddleware;
use Electro\Sessions\Middleware\SessionMiddleware;

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
          TranslationMiddleware::class,
          ErrorHandlingMiddleware::class,
          SessionMiddleware::class,
//          AuthenticationMiddleware::class,
          CsrfMiddleware::class,
          LanguageMiddleware::class,
          PermalinksMiddleware::class,
          'router' => ApplicationRouterInterface::class,
          WelcomeMiddleware::class,
          URLNotFoundMiddleware::class,
        ]);
  }

}
