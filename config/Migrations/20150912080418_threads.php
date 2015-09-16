<?php
use Migrations\AbstractMigration;

class Threads extends AbstractMigration
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
        $table = $this->table('threads');

        $table
            ->addColumn('actor_id','integer')
            ->addColumn('title','string')
            ->addColumn('body','text')
            ->addTimestamps() // created_at、updated_atを作る
            ->addIndex(array('actor_id'),array('unique' => true))
            ->create();

    }
}
