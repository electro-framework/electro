<?php
namespace App;

use Dotenv\Dotenv;
use Selenia\Console\ConsoleApplication;
use Selenia\Core\DependencyInjection\Injector;

class Init
{
  /**
   * Sets up the application's configuration.
   *
   * <p>If a .env file exists, it loads it.
   *
   * <p>This runs before the framework is initialized, right after the autoloader is set.
   * It runs for both web and console based applications.
   *
   */
  static function init ()
  {
    $root = dirname (dirname (dirname (__DIR__)));
    if (file_exists ("$root/.env")) {
      $dotenv = new Dotenv ($root);
      $dotenv->load ();
    }
  }

  /**
   * (private)
   * This is called by Composer on the post-install event.
   */
  static function runInitCommand ()
  {
    $root = dirname (dirname (__DIR__));
    require "$root/packages/autoload.php";
    $consoleApp = ConsoleApplication::make (new Injector);
    $consoleApp->setupStandardIO (['', 'init']);
    $consoleApp->execute ();
  }

}
