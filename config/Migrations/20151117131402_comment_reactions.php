<?php
use Migrations\AbstractMigration;

class CommentReactions extends AbstractMigration
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
         $table = $this->table('comment_reactions');

        $table
            ->addColumn('comment_id','integer')
            ->addColumn('actor_id','integer')
            ->addColumn('kind','integer',['default'=>0])
            ->addColumn('value','integer',['default'=>1])
            ->addTimestamps() // created_at、updated_atを作る
            ->addIndex('comment_id')
            ->addIndex('actor_id')
            ->create();
   }
}
