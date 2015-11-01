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
        'app.comments',
        'app.threads',
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
            'body' => 'test comment body'
        ]);
        $result = $this->Comments->save($comment);
        $this->assertNotEquals(false, $result);
    }

    public function testValidationNG()
    {
        $comment = $this->Comments->newEntity([
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
}
