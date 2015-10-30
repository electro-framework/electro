<?php
namespace App\LoginForms\Controllers;

use Selenia\Plugins\AdminInterface\Controllers\AdminController;

class Login extends AdminController
{
  public function action_submit ($param = null)
  {
  }

  protected function model ()
  {
  }

  protected function render ()
  { ?>
    <BaseAdmin>
      <script>
        document.body.className = "login-page";
      </script>

      {{ !controller.statusMessage }}

      <div class="login-box">
        <!--
        <div class="login-logo">
          <img src="i/logo.png"/>
        </div>
        -->
        <div class="login-box-body">
          <h1 class="text-info">{{ !application.appName }}</h1>
          <h4>$LOGIN_PROMPT</h4>
          <div class="form-group has-feedback">
            <input name="username" type="text" class="form-control" placeholder="$LOGIN_USERNAME" autofocus/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input name="password" type="password" class="form-control" placeholder="$LOGIN_PASSWORD"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <button class="btn btn-info btn-lg btn-block" type="submit" onclick="doAction('login')">$LOGIN_BUTTON
                                                                                                      &nbsp;
                <i class="fa fa-play-circle"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </BaseAdmin>
    <?php
  }

}
