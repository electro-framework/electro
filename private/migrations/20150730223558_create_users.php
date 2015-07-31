<?php

use Phinx\Migration\AbstractMigration;

class CreateUsers extends AbstractMigration
{
  /**
   * Change Method.
   *
   * Write your reversible migrations using this method.
   *
   * More information on writing migrations is available here:
   * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
   */
  public function change ()
  {
    $this
      ->table ('users')
      ->addColumn ('username', 'string', ['limit' => 30])
      ->addIndex (['username'], ['unique' => true])
      ->addColumn ('password', 'string', ['limit' => 60])
      ->addColumn ('token', 'string', ['limit' => 60])
      ->addColumn ('registrationDate', 'datetime')
      ->addColumn ('lastLogin', 'datetime')
      ->addColumn ('role', 'string', ['limit' => 10])
      ->addColumn ('active', 'boolean', ['default' => 0])
      ->create ();
    $now = date ('Y-m-d H:i:s');
    $this->execute ("
      INSERT INTO users (username, registrationDate, role, active)
      VALUES ('admin', '$now', 'developer', 1);
");
  }
}
