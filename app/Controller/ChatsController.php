<?php

	class ChatsController extends AppController {
		
	public $helpers = array('Html', 'Form', 'Time');
	//public $components = array('Session');
	
	public function beforeFilter() {
	    	parent::beforeFilter();
			
	        $this->Auth->allow('ver');
	        //$this->set('current_user', $this->Auth->user());
			
	    }
	
	public function index()
	{
		$this->set('chats', $this->Chat->find('all'));
			
	}

	
	public function add() {
			if($this->request->is('post')) {
				$this->Chat->create();
				if($this->Chat->save($this->request->data)) {
					$this->Flash->success('El chat ha sido creado');
					 return $this->redirect(array('controller' => 'chats', 'action' => 'mostrar'));		
				}
				$this->Flash->error('El chat no se ha podido crear');	
				$this->redirect($this->referer());			
			}
		}


	
	public function ver($id= Null){
		
			if (!$id)
			{
				throw new NotFoundException('Datos Invalidos');
			}

			$Chat= $this->Chat->findById($id);

			if(!$chat)
			{
				throw new NotFoundException('El chat no existe');
			}
			$this-> set('chat', $chat);
		}

	public function mostrar(){

		$this->set('chats', $this->Chat->find('all'));
		
		if($this->request->is('post')) {
				$this->Chat->create();
				if($this->Chat->save($this->request->data)) {
					$this->Flash->success('El chat ha sido creado');
					 return $this->redirect(array('controller' => 'chats', 'action' => 'mostrar'));		
				}
				$this->Flash->error('El chat no se ha podido crear');	
				$this->redirect($this->referer());			
			}
		
			}

	

	public function eliminar($id)
	{
		if($this->request->is('get'))
		{
			throw new methodNotAllowedException('INCORRECTO');
		}
		if($this->Chat->delete($id))
		{
			$this->Flash->success('El chat con id' . $id . 'ha sido eliminado');
			$this->redirect(array('action'=>'index'));
		}
	}
          
		private function isValidUser($id, $user_id) {
			$ownerChat = $this->Chat->findById($id);
			//print_r($ownerPost);
			if($ownerChat['Chat']['user_id'] == $user_id) {
				return true;
			} else {
				return false;
			}

		}
	
}