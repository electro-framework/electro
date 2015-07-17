<?php
namespace App\Controllers;
use Selene\Controller;

class Welcome extends Controller
{
  const ref = __CLASS__;

  protected function viewModel ()
  {
    return [
      'list1' => [
        ['url' => 'example', 'text' => 'Example module'],
        ['url' => '#', 'text' => 'Getting Started'],
        ['url' => '#', 'text' => 'Introduction'],
        ['url' => '#', 'text' => 'Creating your first page'],
      ],
    ];
  }

  protected function render ()
  { ?>
    <Master>

      <div class="banner">
        <div class="title">Selene
          <div class="quote">rapid web development</div>
        </div>
        <div class="by">made by <a href="http://impactwave.com" target="_blank">Impactwave</a></div>
      </div>

      <div class="intro">

        <h1>Well done!</h1>
        <p>You have succesfully installed Selene on your computer.</p><br><br>

        <h2>Now what?</h2>
        <div class="text">
          <p>The <i>express way</i> to start is by opening the Modules Manager and installing some pre-made moules on
             this application.</p>
          <div class="center space">
            <a class="btn" href="modules-manager">Install Modules</a>
          </div>
          <p>P.S. Don't forget remove this example module after you've finished.</p>
        </div>

        <p>You may also want to open these links for example and documentation pages:</p>
        <ul class="list">
          <Repeat for="{{ !list1}}">
            <li><a href="{{ url }}">{{ text }}</a></li>
          </Repeat>
        </ul>

      </div>

    </Master>

    <?php
  }
}
