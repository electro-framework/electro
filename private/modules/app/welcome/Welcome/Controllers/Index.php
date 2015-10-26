<?php
namespace App\Welcome\Controllers;
use Selenia\Assembly\ModulesApi;
use Selenia\Http\Controllers\Controller;

class Index extends Controller
{
  const ref = __CLASS__;
  /**
   * @var ModulesApi
   */
  private $modulesApi;

  function __construct (ModulesApi $modulesApi)
  {
    $this->modulesApi = $modulesApi;
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

      </div>
      <div class="quote">rapid web development</div>
      <div class="by">made by <a href="http://impactwave.com" target="_blank">Impactwave</a></div>
    </Master>

    <?php
  }

  protected function viewModel ()
  {
    return [
      'default' => [
        'adminModuleIsInstalled' => $this->modulesApi->isInstalled ('selenia-plugins/admin-interface'),
      ],
    ];
  }
}
