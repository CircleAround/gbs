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
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Users = TableRegistry::get('Users');
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/threads/index');
        $this->assertResponseOk();
        $threads = $this->viewVariable('threads');

        // 件数をチェックする　現在は、2レコードあり
        $this->assertEquals(2, $threads->count());

        //2レコードのデータを確認する
        $array = $threads->toArray();
        $this->assertEquals('1-title', $array[0]['title']);
        $this->assertEquals('1-body', $array[0]['body']);
        $this->assertEquals('2-title', $array[1]['title']);
        $this->assertEquals('2-body', $array[1]['body']);
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
      $this->get('/threads/view/1');
      $this->assertResponseOk();

      $thread = $this->viewVariable('thread');
      $array = $thread->toArray();

      //thread1を確認、付随したcomments全件のデータを１つずつ確認する
      $this->assertEquals(1, $array['id']);
      $this->assertEquals('1-title', $array['title']);
      $this->assertEquals('1-body', $array['body']);

      $this->assertEquals('thread1-comment1',$array['comments'][0]['body']);
      $this->assertEquals('thread1-comment2',$array['comments'][1]['body']);
      $this->assertEquals('thread1-comment3',$array['comments'][2]['body']);
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAddNG()
    {
        //$Users = TableRegistry::get('Users');
        $user = $this->Users->find()->first();
        $this->session(['user_id' => $user->id]);

        $threads = TableRegistry::get('Threads');
        $query = $threads->find('all'); // 2レコード作成済み
        $record_count = $query->count();

        $data = [
            'actor_id' => $user->id,
            'title' => '',
            'body' => 'zzzzzzzzzz-New Body'
        ];

        $this->post('/threads/add', $data);

        // flash文言のチェック
        $this->assertResponseContains('The thread could not be saved.');

        // データが書き込まれたか確認、NGでデータはかかれないので件数は変わらず2件
        $threads = TableRegistry::get('Threads');
        $query = $threads->find('all');
        // 即値で判定するのがよい、ロジックは入れない
        $this->assertEquals(2, $query->count());
    }

    public function testAddOK()
    {
        //$Users = TableRegistry::get('Users');
        $user = $this->Users->find()->first();
        $this->session(['user_id' => $user->id]);

        $threads = TableRegistry::get('Threads');
        $query = $threads->find('all'); // レコード作成済み
        $record_count = $query->count();

        $data = [
            'actor_id' => $user->id,
            'title' => 'zzzzzzzzzz-New Title',
            'body' => 'zzzzzzzzzz-New Body'
        ];

        $this->post('/threads/add', $data);

        // データが書き込まれたか確認、OKなので3件になった
        $threads = TableRegistry::get('Threads');
        $query = $threads->find('all');
        // 即値で判定するのがよい、ロジックは入れない
        $this->assertEquals(3, $query->count());

        // リダイレクト先はOKか
        $this->assertRedirect(['action'=>'index']);
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEditNG()
    {
      //$Users = TableRegistry::get('Users');
      $user = $this->Users->find()->first();
      $this->session(['user_id' => $user->id]);

      $this->post('/threads/edit/1', ['body' => '']);

      // flash文言のチェック
      $this->assertResponseContains('The thread could not be saved.');

      $threads = TableRegistry::get('Threads');
      $query = $threads->find()->where(['id' => 1]);

      $array = $query->toArray();
      $this->assertEquals('1-body', $array[0]['body']); // データは元のまま
    }

    public function testEditOK()
    {
      //$Users = TableRegistry::get('Users');
      $user = $this->Users->find()->first();
      $this->session(['user_id' => $user->id]);

      $this->post('/threads/edit/1', ['body' => 'change1-body']);

      $threads = TableRegistry::get('Threads');
      $query = $threads->find()->where(['id' => 1]);

      $array = $query->toArray();
      $this->assertEquals('change1-body', $array[0]['body']);

      // リダイレクト先はOKか
      $this->assertRedirect(['action'=>'index']);
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
