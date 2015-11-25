<?php
namespace App\LoginForms\Controllers;

use Selenia\Authentication\Exceptions\AuthenticationException;
use Selenia\Http\Components\PageComponent;
use Selenia\Interfaces\UserInterface;

class Login extends PageComponent
{
  public function action_login ($param = null)
  {
    if ($this->model['lang'])
      $this->session->setLang ($this->model['lang']);
    $this->doLogin ($this->model['username'], $this->model['password']);
    return $this->redirection->intended ($this->app->baseURI);
  }

  /**
   * Attempts to log in the user with the given credentials.
   * @param string $username
   * @param string $password
   * @throws AuthenticationException If the login fails.
   */
  function doLogin ($username, $password)
  {
    global $application;
    if (empty($username))
      throw new AuthenticationException (AuthenticationException::MISSING_INFO);
    else {
      /** @var UserInterface $user */
      $user = new $application->userModel;
      $user->findByName ($username);
      if (!$user->findByName ($username))
        throw new AuthenticationException (AuthenticationException::UNKNOWN_USER);
      else if (!$user->verifyPassword ($password))
        throw new AuthenticationException (AuthenticationException::WRONG_PASSWORD);
      else if (!$user->active ())
        throw new AuthenticationException (AuthenticationException::DISABLED);
      else {
        try {
          $user->onLogin ();
          $this->session->setUser ($user);
        } catch (\Exception $e) {
          throw new AuthenticationException($e->getMessage ());
        }
      }
    }
  }

  protected function initialize ()
  {
    parent::initialize ();
    $this->session->reflashPreviousUrl ();
  }


  protected function model ()
  {
    return [
      'username' => '',
      'password' => '',
      'lang'     => null,
    ];
  }

  protected function render ()
  { ?>
    <BaseAdmin>
      <script>
        document.body.className = "login-page";
      </script>

      {!! statusMessage !!}

      <div class="login-box">
        <!--
        <div class="login-logo">
          <img src="i/logo.png"/>
        </div>
        -->
        <div class="login-box-body">
          <h1 class="text-info">{{ app.appName }}</h1>
          <h4>$LOGIN_PROMPT</h4>
          <div class="form-group has-feedback">
            <Input name="username"
                   type="text"
                   class="form-control"
                   placeholder="$LOGIN_USERNAME"
                   autofocus
                   autoselect
                   value="{{ model.username }}"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <Input name="password"
                   type="password"
                   class="form-control"
                   placeholder="$LOGIN_PASSWORD"
                   value="{{ model.password }}"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <Button class="btn-info btn-lg btn-block icon-right"
                      type="submit"
                      script="doAction('login')"
                      icon="fa fa-play-circle"
                      label="$LOGIN_BUTTON"/>
            </div>
          </div>
        </div>
      </div>
    </BaseAdmin>
    <?php
  }

}
