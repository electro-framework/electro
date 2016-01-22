<?php
namespace DemoCompany\DemoProject\Controllers;
use Selenia\Core\Assembly\Services\ModulesRegistry;
use Selenia\Http\Components\PageComponent;

class Index extends PageComponent
{
  public $adminModuleIsInstalled;
  /**
   * @var ModulesRegistry
   */
  private $modulesRegistry;

  function inject ()
  {
    return function (ModulesRegistry $registry) {
      $this->modulesRegistry = $registry;
    };
  }


  protected function render ()
  { ?>
    <Master>

      <div class="intro">

        <h1>Well done!</h1>
        <p>You have succesfully installed Selenia on your computer.</p><br><br>

        <If the="{{ adminModuleIsInstalled }}" isTrue>
          <div class="text">
            <p class="center">The Administration Interface Plugin is installed.</p>
            <div class="center space">
              <a class="btn" href="admin/users">Enter Admin</a>
            </div>
          </div>
        </If>

        <p><a href="example"><small>Click here to test the routing subsystem</small></a></p>

      </div>
      <div class="quote">rapid web development</div>
      <div class="by">made by <a href="http://impactwave.com" target="_blank">Impactwave</a></div>
    </Master>

    <?php
  }

  protected function viewModel ()
  {
    $this->adminModuleIsInstalled = $this->modulesRegistry->isInstalled ('selenia-plugins/admin-interface');
  }
}
