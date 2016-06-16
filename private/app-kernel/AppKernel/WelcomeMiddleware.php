<?php
namespace AppKernel;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Selenia\Interfaces\Http\RequestHandlerInterface;

class WelcomeMiddleware implements RequestHandlerInterface
{
  function __invoke (ServerRequestInterface $request, ResponseInterface $response, callable $next)
  {
    if ($request->getAttribute('virtualUri') != '')
      return $next ();
    $o = <<<'HTML'
<!doctype html>
<html>
<head>
  <style>
body {
  margin: 0;
  font-family: helvetica neue, Helvetica, sans-serif;
}

#intro {
  background: linear-gradient(45deg, #3d4375 0%, #797fab 100%);
  color: #FFF;
  text-align: center;
  padding: 50px 15px 70px;
}

#intro h1 {
  color: #FFF;
  font-size: 60px;
  font-weight: 100;
  letter-spacing: 9px;
  text-shadow: 0 0 10px #fff;
}

#intro .lead {
  font-size: 24px;
  font-weight: 100;
  margin-top:0
}

p {
  text-align: center;
  margin-top: 90px;
}
</style>
</head>
<body>
  <div id="intro">

    <h1>ELECTRO</h1>

    <p class="lead">
      A modern PHP web framework
    </p>
    
  </div>
  <p>Currently, no content is available for your home URL.</p>
</body>
</html>
HTML;
    $response->getBody ()->write ($o);
    return $response;
  }
}
