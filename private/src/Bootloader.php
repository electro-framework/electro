<?php
namespace App;

use Electro\Kernel\Lib\PrimaryBootloader;

require dirname (__DIR__) . '/packages/electro/kernel/src/Kernel/Lib/PrimaryBootloader.php';

/**
 * A class that implements the application's initial bootstrapping sequence, which sets everything else in motion.
 *
 * <p>This subclass just acts as gateway to the framework-provided bootloader. It allows easy access to the bootloader
 * from `index.php` or `workman` scripts and it also allows Composer to find the class when running some event hooks.
 *
 * ><p>**Note:** we are purposefully not loading the class autoloader yet.
 *
 * @see PrimaryBootloader
 */
class Bootloader extends PrimaryBootloader
{
  function __construct ()
  {
    $this->root = dirname (dirname (__DIR__));
    parent::__construct ();
  }

}
