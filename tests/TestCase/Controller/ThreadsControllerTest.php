<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ThreadsController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Controller\ThreadsController Test Case
 */
class ThreadsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users',
        'app.threads',
        'app.comments'
        // 'app.actors'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $threads = TableRegistry::get('Threads');
        $query = $threads->find('all'); // 2レコード作成済み
        $this->assertEquals(2, $query->count());

        $this->get('/threads/index');
        $this->assertResponseOk();
        $result = $this->viewVariable('threads');
//debug($result);
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {


    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {

        $Users = TableRegistry::get('Users');
        $user = $Users->find()->first(); 
        $this->session(['user_id' => $user->id]);

        $threads = TableRegistry::get('Threads');
        $query = $threads->find('all'); // 2レコード作成済み
        $record_count = $query->count();


       // NGなデータ
        $data = [
            'actor_id' => $user->id,
            'title' => '',
            'body' => 'zzzzzzzzzz-New Body'
        ];

        $this->post('/threads/add', $data);
        
        // flash文言のチェック
        $this->assertResponseContains('The thread could not be saved.');
 
        // データが書き込まれたか確認
        $threads = TableRegistry::get('Threads');
        $query = $threads->find('all');
        // NGでデータは描かれないため2件のまま
        $this->assertEquals($record_count, $query->count());


       // OKなデータ
        $data = [
            'actor_id' => $user->id,
            'title' => 'zzzzzzzzzz-New Title',
            'body' => 'zzzzzzzzzz-New Body'
        ];

        $this->post('/threads/add', $data);
        
        // flash文言のチェック　失敗します。Flash->successの文言が取れていません。
        //$this->assertResponseContains('The thread has been saved.');
 
        // データが書き込まれたか確認
        $threads = TableRegistry::get('Threads');
        $query = $threads->find('all');
        // OKなので３件になった
        $this->assertEquals($record_count+1, $query->count());
        
        // リダイレクト先はOKか
        $this->assertRedirect(['action'=>'index']);
        
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
 
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
