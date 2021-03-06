<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Comments Controller
 *
 * @property \App\Model\Table\CommentsTable $Comments
 */
class CommentsController extends AppController
{

  public function shouldLogin(){
    $action = $this->request->params['action'];
    if($action != 'index' and $action != 'view' and !$this->isLoggedIn()){
      return true;
    }
    return false;
  }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
//            'contain' => ['Threads', 'Actors']
            'contain' => ['Threads']
        ];
        $this->set('comments', $this->paginate($this->Comments));
//        $this->set('_serialize', ['comments']);
    }

    /**
     * View method
     *
     * @param string|null $id Comment id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $comment = $this->Comments->get($id, [
//            'contain' => ['Threads', 'Actors']
        ]);
        $this->set('comment', $comment);
        $this->set('_serialize', ['comment']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $comment = $this->Comments->newEntity();
        if ($this->request->is('post')) {
            $comment = $this->Comments->patchEntity($comment, $this->request->data);
            $comment->actor_id = $this->currentUser()->id;
            if ($this->Comments->save($comment)) {
                $this->Flash->success(__('The comment has been saved.'));
            } else {
                $this->Flash->error(__('The comment could not be saved. Please, try again.'));
            }
            return $this->redirect([
              'controller' => 'threads',
              'action' => 'view',
              $this->request->data['thread_id']
            ]);
        }
        $threads = $this->Comments->Threads->find('list', ['limit' => 200]);
//        $actors = $this->Comments->Actors->find('list', ['limit' => 200]);
        $this->set(compact('comment', 'threads'));
//        $this->set('_serialize', ['comment']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Comment id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $comment = $this->Comments->get($id, [
 //           'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $comment = $this->Comments->patchEntity($comment, $this->request->data);
            if ($this->Comments->save($comment)) {
                $this->Flash->success(__('The comment has been saved.'));
                return $this->redirect([
                  'controller' => 'threads',
                  'action' => 'view',
                  $this->request->data['thread_id']
                ]);
            } else {
                $this->Flash->error(__('The comment could not be saved. Please, try again.'));
            }
        }
        $threads = $this->Comments->Threads->find('list', ['limit' => 200]);
  //      $actors = $this->Comments->Actors->find('list', ['limit' => 200]);
  //      $this->set(compact('comment', 'threads', 'actors'));
        $this->set(compact('threads', 'comment'));
 //       $this->set('_serialize', ['comment']);

    }

    /**
     * Delete method
     *
     * @param string|null $id Comment id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $comment = $this->Comments->get($id);
        if ($this->Comments->delete($comment)) {
            $this->Flash->success(__('The comment has been deleted.'));
        } else {
            $this->Flash->error(__('The comment could not be deleted. Please, try again.'));
        }
        return $this->redirect([
          'controller' => 'threads',
          'action' => 'view',
          $comment['thread_id']
        ]);
    }
}
