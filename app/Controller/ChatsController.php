<?php

	class ChatsController extends AppController {
		
	public $helpers = array('Html', 'Form', 'Time');
	//public $components = array('Session');
	
	public function beforeFilter() {
	    	parent::beforeFilter();
			
	        $this->Auth->allow('ver');
            $this->loadModel('Producto');

	        $this->set('current_user', $this->Auth->user());
			
	    }
	
	public function index()
	{
		$this->set('chats', $this->Chat->find('all'));
			
	}

	
	public function add($producto_id) {
			$this->set('producto_id', $producto_id);

			if($this->request->is('post')) {
				//se obtiene el id del usuario logueado
				$this->Chat->create();
				$formData = $this->request->data["Chat"];
				$user = $this->Auth->user();
				$producto = $this->Producto->findById($formData['producto_id'])["Producto"];
				$datos = array(
					'message' => $formData['message'],
					'created_by' => $user["id"],
                    'user_id' => $producto["user_id"],
					'producto_id' => $formData['producto_id']
				);

				if($this->Chat->save($datos)) {
					$this->Flash->success('El chat ha sido creado');
					if (isset($formData['no_redirect'])) {
                        $this->redirect($this->referer());
                    } else {
                        $this->redirect(array('controller' => 'chats', 'action' => 'mostrar'));
                    }

					 return;
				}
				$this->Flash->error('El chat no se ha podido crear');	
				$this->redirect($this->referer());	
				//var_dump($this->request->query('id'));
			}
		}


	
	public function ver($id= Null){
		
			if (!$id)
			{
				throw new NotFoundException('Datos Invalidos');
			}

			$chat= $this->Chat->findById($id);

			if(!$chat)
			{
				throw new NotFoundException('El chat no existe');
			}
			$this-> set('chat', $chat);
		}

	public function mostrar(){
	    $producto_id = isset($this->params->query['producto_id']) ? $this->params->query['producto_id'] : null;

        $user = $this->Auth->user();

	    $producto = null;
	    if (!is_null($producto_id)){
	        $producto = $this->Producto->findById($producto_id);
        } else {
            $producto = $this->Chat->find('first', array(
                'conditions' => array(
                    'OR' => array(
                        'Chat.user_id' => $user["id"],
                        'Chat.created_by' => $user["id"]
                    )
                )
            ));
        }

        $chats = $this->Chat->find('all', array(
           'conditions' => array(
               'producto_id' => $producto['Producto']['id']
           )
        ));

		$this->set('chats', $chats);
		$this->set('producto', $producto);

		//var_dump($producto);

		$conversaciones = $chats = $this->Chat->find('all', array(
            'conditions' => array(
                'OR' => array(
                    'Chat.user_id' => $user["id"],
                    'Chat.created_by' => $user["id"]
                )
            )
        ));

		$this->set('conversaciones', $conversaciones);

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