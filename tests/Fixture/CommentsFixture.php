<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CommentsFixture
 *
 */
class CommentsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'thread_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'actor_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'body' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'created_at' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'updated_at' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'actor_id' => ['type' => 'index', 'columns' => ['actor_id'], 'length' => []],
            'thread_id' => ['type' => 'index', 'columns' => ['thread_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $import = ['table' => 'comments'];
    public $records = [
        [
            'id' => 1,
            'thread_id' => 1,
            'actor_id' => 1,
            'body' => 'thread1-comment1',
            'created_at' => 1442997037,
            'updated_at' => 1442997037
        ],
        [
            'id' => 2,
            'thread_id' => 1,
            'actor_id' => 1,
            'body' => 'thread1-comment2',
            'created_at' => 1442997037,
            'updated_at' => 1442997037
        ],
        [
            'id' => 3,
            'thread_id' => 1,
            'actor_id' => 1,
            'body' => 'thread1-comment3',
            'created_at' => 1442997037,
            'updated_at' => 1442997037
        ],
    ];
}
