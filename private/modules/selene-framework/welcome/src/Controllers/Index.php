<?php
namespace Selene\Welcome\Controllers;
use Selene\Controller;
use Selene\ModulesApi;

class Index extends Controller
{
  const ref = __CLASS__;

  protected function render ()
  { ?>
    <Master>

      <div class="intro">

        <h1>Well done!</h1>
        <p>You have succesfully installed Selene on your computer.</p><br><br>

        <h2>Next steps</h2>

        <If the="{{ adminModuleIsInstalled }}" isTrue>
          <div class="text">
            <p class="center">The Administration Plugin is installed.</p>
            <div class="center space">
              <a class="btn" href="admin/users">Enter Admin</a>
            </div>
          </div>
        </If>

        <div class="text">
          <p>The <i>express way</i> to start is by opening the Modules Manager and installing some pre-made moules on
             this application.</p>
          <div class="center space">
            <a class="btn" href="application-builder">Install Modules</a>
          </div>
          <p>P.S. Don't forget remove this example module after you've finished.</p>
        </div>

        <p>You may also want to open these links for example and documentation pages:</p>
        <ul class="list">
          <Repeat for="{{ !list1 }}">
            <li><a href="{{ url }}">{{ text }}</a></li>
          </Repeat>
        </ul>

      </div>

      <div class="quote">rapid web development</div>
      <div class="by">made by <a href="http://impactwave.com" target="_blank">Impactwave</a></div>
    </Master>

    <?php
  }

  protected function viewModel ()
  {
    return [
      'list1' => [
        ['url' => 'example', 'text' => 'Example page'],
        ['url' => '#', 'text' => 'Getting started'],
        ['url' => '#', 'text' => 'Introduction'],
        ['url' => '#', 'text' => 'Creating your first page'],
      ],
      'default'  => [
        'adminModuleIsInstalled' => ModulesApi::get ()->isInstalled ('selene-framework/admin-module'),
      ],
    ];
  }
}
