<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ThreadsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ThreadsTable Test Case
 */
class ThreadsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('Threads') ? [] : ['className' => 'App\Model\Table\ThreadsTable'];
        $this->Threads = TableRegistry::get('Threads', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Threads);

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
        $thread = TableRegistry::get('Threads')->newEntity([
            'title' => 'test Thread',
            'body' => 'test Thread body'
        ]);
        $result = $this->Threads->save($thread);
        $this->assertNotEquals(false, $result);
    }

    public function testValidationNG()
    {
        $thread = TableRegistry::get('Threads')->newEntity([
            'title' => '',
            'body' => 'test Thread body'
        ]);
        $result = $this->Threads->save($thread);
        $this->assertEquals(false, $result);

        $thread = TableRegistry::get('Threads')->newEntity([
            'title' => 'test Thread',
            'body' => ''
        ]);
        $result = $this->Threads->save($thread);
        $this->assertEquals(false, $result);

        $thread = TableRegistry::get('Threads')->newEntity([
            'title' => '',
            'body' => ''
        ]);
        $result = $this->Threads->save($thread);
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
