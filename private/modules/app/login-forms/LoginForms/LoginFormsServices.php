<?php
namespace App\LoginForms;

use App\LoginForms\Config\LoginFormsModule;
use Selenia\Interfaces\InjectorInterface;
use Selenia\Interfaces\ServiceProviderInterface;

class LoginFormsServices implements ServiceProviderInterface
{
  function boot () { }

  function register (InjectorInterface $injector)
  {
    ModuleOptions (dirname (__DIR__), [
      'lang'   => true,
      'config' => [
        'main'            => [
          'translation' => true,
        ],
        'app/login-forms' => [
          'prefix' => 'admin',
        ],
      ],
    ], function () {
      return [
        'routes' => [
          RouteGroup ([
            'prefix' => LoginFormsModule::settings ()['prefix'],
            'routes' => LoginFormsModule::routes (),
            'onMenu' => false,
          ]),
        ],
      ];
    });
  }

}
