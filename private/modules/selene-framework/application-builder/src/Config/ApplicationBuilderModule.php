<?php
namespace Selene\ApplicaitonBuilder\Config;

use Selene\ApplicaitonBuilder\Controllers\Index;

class ApplicationBuilderModule
{
  const ref = __CLASS__;

  static function routes ()
  {
    return [

      PageRoute ([
        'title'      => 'Modules Manager Index',
        'URI'        => 'modules-manager',
        'controller' => Index::ref,
      ]),

    ];
  }
}
