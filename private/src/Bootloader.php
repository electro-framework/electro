<?php
namespace App;

use Electro\ConsoleApplication\ConsoleApplication;
use Electro\DependencyInjection\Injector;
use Electro\Interfaces\BootloaderInterface;
use Electro\Interfaces\KernelInterface;
use Electro\Interfaces\ProfileInterface;
use Electro\Profiles\ConsoleProfile;

/**
 * A class that implements the application's initial bootstrapping sequence, which sets everything else in motion.
 *
 * <p>It is responsible for launching both web and console based applications.
 * <p>It loads a 2nd level bootloader that is specific for the kind of application being run (which is selected by the
 * configuration profile specified when calling {@see boot}).
 */
class Bootloader
{
  /**
   * The original 'current working directory'. It can be used later by workman commands or other CLI sctipts if the app
   * is lauched from a directory other than the app's root.
   *
   * @var string
   */
  public $cwd;
  /**
   * @var string The application's root directory.
   */
  public $root;

  /**
   * Initializes the Bootloader instance.
   */
  function __construct ()
  {
    $this->root = dirname (dirname (__DIR__));
    $this->cwd  = getcwd ();
  }

  /**
   * A factory method that creates, sets up and returns a bootloader instance, ready for booting up.
   *
   * <p>This is useful for booting up the application without creating a global variable to hold the bootloader
   * instance.
   *
   * <p>After calling this, you are free to reference any class on the application, or do any kind of operation prior
   * to calling {@see boot}(), which will continue the boot up sequence.
   *
   * #### Example
   * You may run a web application using a single statement:
   *       App\Bootloader::make ()->boot (Electro\Profiles\StandardWebProfile::class);
   * Of course, for this example to work, a `require` statement for `Bootloader.php` would be needed prior to the
   * statement, as the autoloader is not yet available at the time the statement runs.
   *
   * @return static
   */
  static function make ()
  {
    return (new static)->setup ();
  }

  /**
   * @internal
   * This is called by Composer on the `post-install` event.
   *
   * @param Composer\Script\PackageEvent $event
   * @return int
   */
  static function runInitCommand ($event)
  {
    return self::runCommand ('init', [], $event);
  }

  /**
   * @internal
   * This is called by Composer on the `pre-package-uninstall` event.
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
   * @internal
   * This is called by Composer on the `post-update` event.
   *
   * @return int
   */
  static function runUpdateCommand ($event)
  {
    return self::runCommand ('module:refresh', [], $event);
  }

  /**
   * @internal
   * Runs a console command from within a Composer execution context.
   *
   * @param string                       $name Command name.
   * @param string[]                     $args Command arguments.
   * @param Composer\Script\PackageEvent $event
   * @return int
   */
  static private function runCommand ($name, $args = [], $event = null)
  {
    return self::make ()->boot (
      ConsoleProfile::class, 0, function (KernelInterface $kernel) use ($name, $args, $event) {
      $kernel->onConfigure (function (ConsoleApplication $consoleApp) use ($name, $args, $event) {
        $consoleApp->runCommand ($name, $args, $event);
      });
    });
  }

  /**
   * Boots up the framework and runs the application.
   *
   * @param string   $profileClass The configuration profile's fully qualified class name.
   * @param int      $urlDepth     How many URL segments should be stripped when calculating the application's root
   *                               URL.
   *                               Use it when booting a sub-application from an index.php on a sub-directory of the
   *                               main application.
   * @param callable $onStartUp    If specified, the callback will be invoked right before the kernel boots up. It will
   *                               be given the kernel instance as an argument, so that you can use this to register
   *                               listeners for kernel events, similar to what {@see ModuleInterface::startUp} does for
   *                               modules.
   * @return int Exit status code. Only meaningful for console applications.
   */
  function boot ($profileClass, $urlDepth = 0, callable $onStartUp = null)
  {
    /** @var ProfileInterface $profileClass */
    $class = $profileClass::getBootloaderClass ();
    /** @var BootloaderInterface $bootloader */
    $bootloader = new $class (new Injector, $profileClass);
    return $bootloader->boot ($this->root, $urlDepth, $onStartUp);
  }

  /**
   * Sets up the application's bootstrapping environment.
   *
   * <p>It loads the class autoloader and the `.env` file (if one exists).
   * <p>After calling this, you are free to reference any class on the application, or do any kind of operation prior
   * to calling {@see boot}(), which will continue the boot up sequence.
   *
   * @return $this Self, for chaining.
   */
  function setup ()
  {
    /*
     * On some web servers, the current directory may not be the application's root directory.
     * We need to make sure the current directory is the app's root so that all includes run flawlessly.
     */
    chdir ($this->root);

    /*
     * You may temporarily uncomment the following line for troubleshooting on restricted hosting environments.
     * It enables error logging to a file on the project's root directory.
    */
    //ini_set ('error_log', $this->root . '/error.log');

    /*
     * Start Composer's autoloader.
     */
    if ((@include "private/packages/autoload.php") === false) {
      $msg = "<h3>Project not installed</h3>
Please run <b><kbd>composer install</kbd></b> on the command line
";;
      echo defined ('STDIN') && !isset($_SERVER['REQUEST_METHOD']) ? preg_replace ('/<.*?>/', '', $msg) : $msg;
      exit (1);
    }
    return $this;
  }

}
