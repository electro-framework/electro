<?php
namespace AppKernel;

use Dotenv\Dotenv;
use Selenia\Core\ConsoleApplication\ConsoleApplication;
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
   * (internal use)
   * This is called by Composer on the post-install event.
   *
   * @return int
   */
  static function runInitCommand ()
  {
    return self::runCommand ('init');
  }

  /**
   * (internal use)
   * This is called by Composer on the post-update event.
   *
   * @param Composer\Script\PackageEvent $event
   * @return int
   */
  static function runUninstallCommand ($event)
  {
    $package = $event->getOperation ()->getPackage ();
    return self::runCommand ('module:clean', [$package->getName ()]);
  }

  /**
   * (internal use)
   * This is called by Composer on the post-update event.
   *
   * @return int
   */
  static function runUpdateCommand ()
  {
    return self::runCommand ('module:refresh');
  }

  /**
   * (internal use)
   * Runs the specified console command from within a Composer execution context.
   *
   * @param string   $name Command name.
   * @param string[] $args Command arguments.
   * @return int
   */
  static private function runCommand ($name, $args = [])
  {
    $root = dirname (dirname (__DIR__));
    require "$root/packages/autoload.php";
    Init::init ();
    $consoleApp = ConsoleApplication::make (new Injector);
    $consoleApp->setupStandardIO (array_merge (['', $name], $args));
    return $consoleApp->execute ();
  }

}
