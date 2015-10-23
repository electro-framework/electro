<?php
namespace App\LoginForms\Config;

use App\LoginForms\Controllers\Login;

class LoginFormsModule
{
  const ref = __CLASS__;

  static function routes ()
  {
    return [

      PageRoute ([
        'onMenu'     => false,
        'title'      => '$LOGIN_PROMPT',
        'URI'        => 'login',
        'controller' => Login::ref(),
      ]),

    ];

  }

  static function settings ()
  {
    global $application;
    return get ($application->config, 'app/login-forms', []);
  }
}
