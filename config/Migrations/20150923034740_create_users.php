<?php
use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('users');
        $table
            ->addColumn('name', 'string')
            ->addColumn('uid', 'string')
            ->addColumn('nickname', 'string')
            ->addColumn('avator', 'string')
            ->addColumn('access_token', 'string')
            ->addTimestamps()
            ->create();
    }
}
