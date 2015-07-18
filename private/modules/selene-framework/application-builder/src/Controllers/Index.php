<?php
namespace Selene\ApplicaitonBuilder\Controllers;
use Packagist\Api\Client;
use Selene\Controller;

class Index extends Controller
{
  const ref = __CLASS__;

  protected function viewModel ()
  {
    $client = new Client();

    return [
      'packages' => $client->all (['vendor' => 'selene-framework']),
    ];
  }

  protected function render ()
  { ?>
    <Main>

      <h3>Available modules</h3>

      <Repeat for="{{ !packages }}">
        <li>{{ #self }}
      </Repeat>

    </Main>

    <?php
  }
}
