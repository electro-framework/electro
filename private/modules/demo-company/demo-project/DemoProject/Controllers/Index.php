<?php
namespace DemoCompany\DemoProject\Controllers;

use Selenia\Http\Components\PageComponent;

class Index extends PageComponent
{
  protected function render ()
  { ?>
    <Content of="main">

      <Jumbotron style="border-bottom:1px solid #ddd">
        <div style="text-align:center">
          <img src="modules/demo-company/demo-project/selenia_100.png">
          <h2>Selenia framework</h2><br><br>
          <p>Installation successful</p><br><br><br>
          <p>
            <a href="page1">
              <small>Click here for some demonstration pages</small>
            </a>
          </p>
        </div>
      </Jumbotron>

      <div style="float:right;margin:-15px 15px">
        Copyright © 2014 <a href="http://impactwave.com" target="_blank">Impactwave</a> Lda, all rights reserved.
      </div>
    </Content>

    <Include view="layouts/main.html"/>
    <?php
  }

}
