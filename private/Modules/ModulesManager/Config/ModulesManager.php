<?php
namespace Modules\ModulesManager\Config;

use Modules\ModulesManager\Controllers\Index;

class ModulesManager
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
