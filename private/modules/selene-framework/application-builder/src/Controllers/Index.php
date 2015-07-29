<?php
namespace Selene\ApplicaitonBuilder\Controllers;
use Selene\Controller;
use Selene\Lib\PackagistAPI;

class Index extends Controller
{
  const ref = __CLASS__;

  protected function render ()
  { ?>
    <Main>

      <h3>Available plugin modules</h3>

      <div style="display:inline-block">
        <Repeat for="{{ !packages }}">
          <p>
            <label for="P{{ #ord }}">
              <input id="P{{ #ord }}" type="checkbox">
              {{ name }}
            </label>
        </Repeat>

        <p align="right">
          <button class="btn">Install</button>
      </div>

    </Main>

    <?php
  }

  protected function viewModel ()
  {
    return [
      'packages' => (new PackagistAPI)->type ('selene-plugin')->search (true),
    ];
  }
}
