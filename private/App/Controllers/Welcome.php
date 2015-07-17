<?php
namespace App\Controllers;
use Selene\Controller;

class Welcome extends Controller
{
  const ref = __CLASS__;

  protected function model ()
  {
    return [
      ['url' => 'example', 'text' => 'Example module'],
      ['url' => '#', 'text' => 'Getting Started'],
      ['url' => '#', 'text' => 'Introduction'],
      ['url' => '#', 'text' => 'Creating your first page'],
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
        <p>You have succesfully installed Selene on your computer.</p><br>

        <h2>Now what?</h2>
        <p>Follow these links to get you started:</p>

        <ul class="list">
          <Repeat for="{{ !default }}">
            <li><a href="{{ url }}">{{ text }}</a></li>
          </Repeat>
        </ul>
      </div>

    </Master>

    <?php
  }
}
