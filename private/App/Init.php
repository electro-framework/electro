<?php
namespace App;

use Dotenv\Dotenv;
use Electro\Core\ConsoleApplication\ConsoleApplication;
use Electro\Core\DependencyInjection\Injector;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\NullOutput;

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
    $root = dirname (dirname (__DIR__));
    if (file_exists ("$root/.env")) {
      $dotenv = new Dotenv ($root);
      $dotenv->load ();
    }
  }

  /**
   * (internal use)
   * This is called by Composer on the post-install event.
   *
   * @param Composer\Script\PackageEvent $event
   * @return int
   */
  static function runInitCommand ($event)
  {
    return self::runCommand ('init', [], $event);
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
    return self::runCommand ('module:cleanup', ['-s', $package->getName ()], $event);
  }

  /**
   * (internal use)
   * This is called by Composer on the post-update event.
   *
   * @return int
   */
  static function runUpdateCommand ($event)
  {
    return self::runCommand ('module:refresh', [], $event);
  }

  /**
   * (internal use)
   * Runs the specified console command from within a Composer execution context.
   *
   * @param string                       $name Command name.
   * @param string[]                     $args Command arguments.
   * @param Composer\Script\PackageEvent $event
   * @return int
   */
  static private function runCommand ($name, $args = [], $event = null)
  {
    $output = null;
    if ($event) {
      $io = $event->getIO ();

      // Check for the presence of the -q|--quiet option.
      $r = new \ReflectionProperty($io, 'input');
      $r->setAccessible (true);
      /** @var ArgvInput $input */
      $input = $r->getValue ($io);
      if ($input->getOption ('quiet'))
        $output = new NullOutput;

      else {
        // DO NOT change the order of evaluation!
        switch (true) {
          case $io->isDebug ():
            $verbose = ConsoleOutput::VERBOSITY_DEBUG;
            break;
          case $io->isVeryVerbose ():
            $verbose = ConsoleOutput::VERBOSITY_VERY_VERBOSE;
            break;
          case $io->isVerbose ():
            $verbose = ConsoleOutput::VERBOSITY_VERBOSE;
            break;
          default:
            $verbose = ConsoleOutput::VERBOSITY_NORMAL;
        }
        $output = new ConsoleOutput($verbose, $io->isDecorated ());
      }
    }
    $root = dirname (__DIR__);
    require "$root/packages/autoload.php";
    Init::init ();
    $consoleApp = ConsoleApplication::make (new Injector);
    $consoleApp->setupStandardIO (array_merge (['', $name], $args), $output);
    return $consoleApp->execute ();
  }

}
