<?php
namespace App\LoginForms;

use App\LoginForms\Config\LoginFormsModule;
use Selenia\Core\Assembly\Services\ModuleServices;
use Selenia\Interfaces\ModuleInterface;

class LoginFormsServices implements ModuleInterface
{
  function boot () { }

  function configure (ModuleServices $module)
  {
    $module
      ->provideTranslations ()
      ->setDefaultConfig ([
        'main'            => [
          'translation' => true,
        ],
        'app/login-forms' => [
          'prefix' => 'admin',
        ],
      ])
      ->onPostConfig (function () use ($module) {
        $module->registerRoutes ([
          RouteGroup ([
            'prefix' => LoginFormsModule::settings ()['prefix'],
            'routes' => LoginFormsModule::routes (),
            'onMenu' => false,
          ]),
        ]);
      });
  }

}
