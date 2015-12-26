<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    protected $user_id;
    protected $current_user;

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
    }

    public function shouldLogin(){
      return false;
    }

    public function beforeFilter(\Cake\Event\Event $event){
      if ($this->shouldLogin()){
        $this->Flash->success(__('ログインしてください'));
        return $this->redirect('/');
      }
    }

    public function currentUser()
    {
        if (!empty($this->current_user)) {
            return $this->current_user;
        }

        if ($this->isLoggedIn()) {
            return $this->current_user = TableRegistry::get('Users')->get($this->user_id);
        }
        return $this->current_user;
    }

    public function isLoggedIn()
    {
        $this->user_id = $this->request->session()->read('user_id');
        return !empty($this->user_id);
    }

    /**
     * ユーザを与えたインスタンスによってログイン状態にさせる
     * 主にテストに利用する
     * @param  User $user ユーザ
     */
    public function loginAs($user){
      $this->current_user = $user;
      $this->request->session()->write('user_id', $user->id);
    }

}
