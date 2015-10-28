<?php
namespace App\Welcome;

use App\Welcome\Config\WelcomeModule;
use Selenia\Core\Assembly\Services\ModuleServices;
use Selenia\Interfaces\ModuleInterface;

class WelcomeServices implements ModuleInterface
{
  function boot () { }

  function configure (ModuleServices $module)
  {
    $module
      ->publishPublicDirAs('modules/selenia/welcome')
      ->provideTemplates()
      ->provideViews()
      ->registerRoutes(WelcomeModule::routes ())
      ->setDefaultConfig([
        'main' => [
          'name'    => 'site',              // session cookie name
          'appName' => 'Your App',
          'title'   => '@ - Your App',      // @ = page title
        ],
      ]);
  }
}
