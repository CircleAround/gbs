<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CommentsController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Controller\CommentsController Test Case
 */
class CommentsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users',
        'app.comments',
        'app.threads',
        // 'app.actors'
    ];

    /**
     * ログイン処理のテストのためのテストアクションです。
     * タイミングを見て別の場所へ移動する予定です。
     * @return void
     */
    public function testLogin(){
      $Users = TableRegistry::get('Users'); //テーブル作成は他でやるべきかもしれません。
      $user = $Users->find()->first(); //fixtureの最初のユーザ（テストによって変えましょう）

      $this->session(['user_id' => $user->id]); // 存在するユーザとしてログインしていることにする

      $Threads = TableRegistry::get('Threads');
      $thread = $Threads->find()->first();

      // リクエスト処理
      $this->post('/comments/add', ['body' => 'test', 'thread_id' => $thread->id]);

      // 成功すればリダイレクトするはず！
      $this->assertRedirect(['controller' => 'Threads', 'action' => 'view', $thread->id]);
    }


    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
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
