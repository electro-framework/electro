<?php
namespace App\LoginForms\Config;

use Selenia\Interfaces\AssignableInterface;
use Selenia\Traits\ConfigurationTrait;

/**
 * Configuration settings for the LoginForms module.
 *
 * @method $this|string  urlPrefix (string $v = null) Relative URL that prefixes all URLs to the login pages
 */
class LoginFormsSettings implements AssignableInterface
{
  use ConfigurationTrait;

  private $urlPrefix             = 'login';

}
