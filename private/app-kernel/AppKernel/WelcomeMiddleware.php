<?php
namespace AppKernel;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Selenia\Interfaces\Http\RequestHandlerInterface;

class WelcomeMiddleware implements RequestHandlerInterface
{
    function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next)
    {
        $o = <<<'HTML'
<h1 align=center>electro</h1>
HTML;
        $response->getBody()->write($o);
        return $response;
    }
}
