<?php

class ProductosController extends AppController
{

	public $helpers = array('Html', 'Form', 'Time');
	//public $components = array('Session');
	
	public function beforeFilter() {
	    	parent::beforeFilter();
			
	        $this->Auth->allow('ver', 'search', 'searchjson');
	        //$this->set('current_user', $this->Auth->user());
			
	    }
	
	public function index()
	{
		$this->set('productos', $this->Producto->find('all'));
			
	}

	
	public function nuevo() {
			if($this->request->is('post')) {
				$this->Producto->create();
				if($this->Producto->save($this->request->data)) {
					$this->Flash->success('El producto ha sido creado');
					 return $this->redirect(array('controller' => 'productos', 'action' => 'index'));		
				}
				$this->Flash->error('El producto no se ha podido crear');	
				$this->redirect($this->referer());			
			}
		}


	
	public function ver($id= Null){
		
			if (!$id)
			{
				throw new NotFoundException('Datos Invalidos');
			}

			$producto= $this->Producto->findById($id);

			if(!$producto)
			{
				throw new NotFoundException('El producto no existe');
			}
			$this-> set('producto', $producto);
		}
/*
	public function chat ($id= Null){
	
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

*/
	public function mostrar(){

		$this->set('productos', $this->Producto->find('all', array(
			"conditions" => array(
				"user_id" => $this->Auth->user()["id"]))
		));
		
			}


	public function editar($id=null)
	{
		if(!$id)
		{
			throw new NotFoundException("Datos invalidos");
		}
		$producto= $this->Producto->findById($id);
		
		if(!$producto)
		{
			throw new NotFoundExeception("El producto no ha sido encontrado");
		}
		if($this->request->is(array('post','put')))
		{
			$this->Producto->id= $id;
			if($this->Producto->save($this->request->data))
			{
				$this->Flash->success('El producto ha sido modificado');
				return $this->redirect(array('action'=>'index'));
			}
			$this->Flash->error('El registro no pudo ser modificado');
		}
		if(!$this->request->data)
		{
			$this->request->data = $producto;
		}
	}

	/*
	public function editar($id = null) {

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
	*/
	public function eliminar($id)
	{
		if($this->request->is('get'))
		{
			throw new methodNotAllowedException('INCORRECTO');
		}
		if($this->Producto->delete($id))
		{
			$this->Flash->success('El producto con id' . $id . 'ha sido eliminado');
			$this->redirect(array('action'=>'index'));
		}
	}

	public function searchjson()
	{
		$term = null;
		if(!empty($this->request->query['term']))
		{
			$term = $this->request->query['term'];
			$terms = explode(' ', trim($term));
			$terms = array_diff($terms, array(''));
			foreach($terms as $term)
			{
				$conditions[] = array('Producto.name LIKE' => '%' . $term . '%');
			}
			
			$productos = $this->Producto->find('all', array('recursive' => -1, 'fields' => array('Producto.id', 'Producto.name', 'Producto.foto', 'Producto.foto_dir'), 'conditions' => $conditions, 'limit' => 20));
		}
		echo json_encode($productos);
		$this->autoRender = false;
	}
	
	public function search()
	{
		$search = null;
		if(!empty($this->request->query['search']))
		{
			$search = $this->request->query['search'];
			$search = preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]/', '', $search);
			$terms = explode(' ', trim($search));
			$terms = array_diff($terms, array(''));
			
			foreach($terms as $term)
			{
				$terms1[] = preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]/', '', $term);
				$conditions[] = array('Producto.name LIKE' => '%' . $term . '%');
			}
			$productos = $this->Producto->find('all', array('recursive' => -1, 'conditions' => $conditions, 'limit' => 200));
			if(count($productos) == 1)
			{
				return $this->redirect(array('controller' => 'productos', 'action' => 'ver', $productos[0]['Producto']['id']));
			}
			$terms1 = array_diff($terms1, array(''));
			$this->set(compact('productos', 'terms1'));
		}
		$this->set(compact('search'));
		
		if($this->request->is('ajax'))
		{
			$this->layout = false;
			$this->set('ajax', 1);
		}
		else
		{
			$this->set('ajax', 0);
		}
	}
          
		private function isValidUser($id, $user_id) {
			$ownerProducto = $this->Producto->findById($id);
			//print_r($ownerPost);
			if($ownerProducto['Producto']['user_id'] == $user_id) {
				return true;
			} else {
				return false;
			}

		}
	

}

?>