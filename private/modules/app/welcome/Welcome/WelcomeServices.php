<?php
namespace App\Welcome;

use Selenia\Interfaces\InjectorInterface;
use Selenia\Interfaces\ServiceProviderInterface;
use App\Welcome\Config\WelcomeModule;

class WelcomeServices implements ServiceProviderInterface
{
  function boot () { }

  function register (InjectorInterface $injector)
  {
    ModuleOptions (__DIR__, [
      'templates'  => true,
      'views'      => true,
      'public'     => 'modules/selenia/welcome',
      //  'publish'    => [],
      //  'lang'       => true,
      //  'assets'     => [],
      //  'components' => [],
      //  'presets'    => [],
      'routes'     => WelcomeModule::routes (),
      'config'     => [
        'main' => [
          'name'    => 'site',              // session cookie name
          'appName' => 'Your App',
          'title'   => '@ - Your App',      // @ = page title
        ],
      ],
    ]);
  }

}
