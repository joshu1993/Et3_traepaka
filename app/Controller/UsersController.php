<?php 
App::uses('AppController', 'Controller');

	class UsersController extends AppController {
/*
	var $helpers = array ('Session'); 

	var $components = array ('Auth','Session'); 
*/

		public $paginate = array(
       		'limit' => 25,
    		'order' => array('User.username' => 'asc' ) 
    	);
	
   		public function beforeFilter() {
       		parent::beforeFilter();
        	$this->Auth->allow('login','add'); 
    	}
	
		public function login() {
		
			// Si ya está logueado lo redirige
			if($this->Session->check('Auth.User')){
				$this->redirect(array('action' => 'index'));		
			}

			if ($this->request->is('post')) {
				if ($this->Auth->login()) {
					$this->Session->setFlash(__('Bienvenido, '. $this->Auth->user('username')));
					$this->redirect($this->Auth->redirectUrl());
				} else {
					$this->Session->setFlash(__('Nombre de usuario o contraseña invalidos'));
				}
			} 
		}

		public function logout() {
				$this->redirect($this->Auth->logout());
				/*$this->redirect(array('action' => 'index')*/
		}

   		public function index() {
				$this->paginate = array(
					'limit' => 6,
					'order' => array('User.username' => 'asc' )
					);
				$users = $this->paginate('User');
				$this->set(compact('users'));
    	}
	
		public $helpers = array('Html','Form');
 /* 
	  	public function beforeFilter() {
	    	parent::beforeFilter();
			
	        $this->Auth->allow('index', 'add','ver', 'login');
	        //$this->set('current_user', $this->Auth->user());
			
	    }
*/	
		public function ver($id= Null){
		
			if (!$id)
			{
				throw new NotFoundException('Datos Invalidos');
			}

			$user= $this->User->findById($id);

			if(!$user)
			{
				throw new NotFoundException('El Usuario no existe');
			}
			$this-> set('user', $user);
		}
		
		
/*
		public function login() {
			if($this->request->is('post')) {
				if($this->Auth->login()) {
					return $this->redirect($this->Auth->redirectUrl());
				}
				$this->Flash->error('¡Usuario y/o contraseña incorrectos!');
			}
			$this->redirect($this->referer());

		}

		public function logout() {
			$this->Session->destroy();
			$this->Flash->warning('Se ha cerrado la sesión.');		
			return $this->redirect($this->Auth->logout());
		}

*/		
		
		public function add() {
			if($this->request->is('post')) {
				$this->User->create();
				if($this->User->save($this->request->data)) {
					$this->Flash->success('EL usuario ha sido creado');
					 return $this->redirect(array('action'=>'index'));		
				}
				$this->Flash->error('EL usuario no se ha podido crear');	
				$this->redirect($this->referer());			
			}
		}

		public function edit($id = null) {

		    if (!$id) {
				$this->Session->setFlash('Introduce usuario');
				$this->redirect(array('action'=>'index'));
			}

			$user = $this->User->findById($id);
			if (!$user) {
				$this->Session->setFlash('ID Usuario invalido');
				$this->redirect(array('action'=>'index'));
			}

			if ($this->request->is('post') || $this->request->is('put')) {
				$this->User->id = $id;
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('El usuario ha sido modificado'));
					$this->redirect(array('action' => 'index', $id));
				}else{
					$this->Session->setFlash(__('No se ha podido modificar el usuario.'));
				}
			}

			if (!$this->request->data) {
				$this->request->data = $user;
			}
        }
		
/*		
		public function eliminar($id)
		{
			
			if(!$this->request->is('post'))
			{
				throw new methodNotAllowedException('INCORRECTO');
			}
			if($this->User->eliminar($id))
			{
				$this->Flash->success('El usuario con id:' . $id . 'ha sido eliminado.');
				$this->redirect(array('action' => 'index'));
			}
		}
*/


/*	    public function delete($id = null) {
		
			if (!$id) {
				$this->Session->setFlash('Introduce un usuario');
				$this->redirect(array('action'=>'index'));
			}
		
        	$this->User->id = $id;

        	if (!$this->User->exists()) {
            	$this->Session->setFlash('Usuario invalido');
				$this->redirect(array('action'=>'index'));
        	}

        	$this->Session->setFlash(__('No se ha podido eliminar el usuario'));
        	$this->redirect(array('action' => 'index'));
    	}
*/
    	public function delete($id)
	{
		if($this->request->is('get'))
		{
			throw new methodNotAllowedException('INCORRECTO');
		}
		if($this->User->delete($id))
		{
			$this->Flash->success('El usuario con id' . $id . 'ha sido eliminado');
			$this->redirect(array('action'=>'index'));
		}
	}


/*		public function delete($id = null) {
        // Prior to 2.5 use
        // $this->request->onlyAllow('post');

        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }
*/
		
	}


?>