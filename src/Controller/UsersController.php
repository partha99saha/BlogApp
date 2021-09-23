<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Table\UsersTable;
use Cake\Event\EventInterface;
use Authentication\Controller\Component\AuthenticationComponent;

/**
 * @property UsersTable $Users
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $user1
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 * @property AuthenticationComponent $Authentication
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $users = $this->paginate($this->Users);
        $this->Authorization->skipAuthorization();
        $this->set(compact('users'));
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login', 'add']);
    }

    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->role_id = $this->request->getData('role_id');
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('Unable to add the user!!! '));
        }
        $roles = $this->Users->Roles->find('list')->all();
        $this->set(compact('roles'));
        $this->set('user', $user);
    }


    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Articles',
                'action' => 'index',
            ]);
            return $this->redirect($redirect);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }
   /**
     * @param string|null $id Users id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id);
        $this->Authorization->skipAuthorization();
        $this->set(compact('user'));
    }
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData(), [
                'accessibleFields' => ['id' => false]
            ]);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The User has been saved.'));
            }
            $this->Flash->error(__('The User could not be saved. Please, try again.'));
            return $this->redirect(['action' => 'view']);
        }
        $this->set(compact('user'));
    }
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The User has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'logout']);
    }
    public function logout()
    {
        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect([
                'controller' => 'Users',
                'action' => 'login']);
        }
    }
    public function password($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData(), [
                'validate' => 'password'
            ]);
            $user->password = $this->request->getData('new_password');
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The Password has been saved.'));
                return $this->redirect(['action' => 'logout']);
            }
            $this->Flash->error(__('The Password could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }
}
