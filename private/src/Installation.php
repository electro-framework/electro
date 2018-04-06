<?php
namespace App;


class Installation
{
  /**
   * @internal
   * This is called by Composer on the `post-root-package-install` event.
   * It installs Node.js tooling using npm.
   *
   * @param Composer\Script\PackageEvent $event
   * @return int
   */
  static function runPreInstallCommand ($event)
  {
    exec ('npm install', $o, $status);
    if ($status) {
      foreach ($o as $l)
        echo $l . PHP_EOL;
      echo "
============================================================================================
Some development tools could not be installed. Make sure you have installed Node.js and npm.
The application may still run, though.
============================================================================================
";
      return $status;
    }
    return 0;
  }

}
