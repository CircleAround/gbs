<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CommentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CommentsTable Test Case
 */
class CommentsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.comment_reactions',
        'app.comments',
        'app.threads',
        'app.users'
        // 'app.actors'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Comments') ? [] : ['className' => 'App\Model\Table\CommentsTable'];
        $this->Comments = TableRegistry::get('Comments', $config);
        $this->Comment_Reactions = TableRegistry::get('Comment_Reactions');
        $this->Users = TableRegistry::get('Users');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Comments);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationOK()
    {
        $comment = $this->Comments->newEntity([
            'thread_id' => 1,
            'actor_id' => 1,
            'body' => 'test comment body'
        ]);
        $result = $this->Comments->save($comment);
        $this->assertNotEquals(false, $result);
    }

    public function testValidationNG()
    {
        $comment = $this->Comments->newEntity([
            'thread_id' => 1,
            'actor_id' => 1,
            'body' => ''
        ]);
        $result = $this->Comments->save($comment);
        $this->assertEquals(false, $result);
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    public function testdoReactionOK()
    {
  // UNKNOWN:0; GOOD_QUESTION:1; NICE_ADVISE:2; UNKNOWN:99;

        // 現在、1レコードあり
        // actor_id = 1; kind = 2は存在しないので書き込まれる
        $query = $this->Comment_Reactions->find('all'); // 1レコード
        $this->assertEquals(1, $query->count());

        $user = $this->Users->find()->first();
        $comment = $this->Comments->get(1);
        $comment->doReaction($user,2);
        $query = $this->Comment_Reactions->find('all'); // 2レコードになった
        $this->assertEquals(2, $query->count());

        $array = $query->toArray();
        $this->assertEquals(1, $array[1]['actor_id']);
        $this->assertEquals(2, $array[1]['kind']);
        $this->assertEquals(1, $array[1]['value']);
    }

    public function testdoReactionNG()
    {
        // まず、actor_id = 1; kind = 99のレコードを作成、2レコードに
        $user = $this->Users->find()->first();
        $comment = $this->Comments->get(1);
        $comment->doReaction($user, 99);
        $query = $this->Comment_Reactions->find('all');
        $this->assertEquals(2, $query->count());

        // 次、同じactor_id = 1; kind = 99なので、書き込まれず、2レコードのまま
        $user = $this->Users->find()->first();
        $comment->doReaction($user, 99);
        $query = $this->Comment_Reactions->find('all');
        $this->assertEquals(2, $query->count());
    }
}
