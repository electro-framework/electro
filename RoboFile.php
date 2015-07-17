<?php
use Robo\Tasks;

/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li
 */
class RoboFile extends Tasks
{
  /**
   * Builds the whole project, including all modules
   * Use this command right after cloning a project or whenever modules are added, removed or updated.
   * @param array $options
   * @option $exclude-bower|x Makes the build run faster by skipping the installation/update of front-end libraries
   *         trough Bower
   */
  function build ($options = ['exclude-libs|x' => false])
  {
    $this->cleanApp ();
    $this->cleanModules ();
    if (!$options['exclude-libs'])
      $this->cleanLibs ();
  }

  /**
   * Cleans the front-end libraries from the public_html/lib folder
   */
  function cleanLibs ()
  {
    $this->taskCleanDir ('public_html/lib')->run ();
  }

  /**
   * Cleans the application-specific assets from the public_html/dist folder
   */
  function cleanApp ()
  {
    $this->taskCleanDir ('public_html/dist')->run ();
  }

  /**
   * Cleans the module's assets from the public_html/modules folder
   */
  function cleanModules ()
  {
    $this->taskCleanDir ('public_html/modules')->run ();
  }

  /**
   * Builds the main project, excluding modules.
   * Use this command whenever you need to recompile/repackage your application's assets.
   */
  function update ()
  {
    $this->yell ("Hello World!");
  }
}
