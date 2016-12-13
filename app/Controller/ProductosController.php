<?php

class ProductosController extends AppController
{

	public $helpers = array('Html', 'Form', 'Time');
	//public $components = array('Session');
	
	public function beforeFilter() {
	    	parent::beforeFilter();
			
	        $this->Auth->allow('');
	        //$this->set('current_user', $this->Auth->user());
			
	    }
	
	public function index()
	{
		$this->set('productos', $this->Producto->find('all'));
			
	}

	

/*	
	public function nuevo()
	{
		if($this->request->is('post'))
		{
			$this->Producto->create();
			if($this->Producto->save($this->request->data))
			{
				$this->Flash->success('El producto ha sido creado');
				return $this ->redirect(array('action'=> 'index'));
			}
			$this->Flash->error('No se puedo crear producto');
		}
		$producto= $this->Producto->Producto->find('list');
		$this->set('producto',$producto);
	}

*/
	
		public function nuevo() {
			if($this->request->is('post')) {
				$this->Producto->create();
				if($this->Producto->save($this->request->data)) {
					$this->Flash->success('EL producto ha sido añadido');
					 return $this->redirect(array('action'=>'index'));		
				}
				$this->Flash->error('EL producto no se ha podido añadir');	
				$this->redirect($this->referer());			
			}
		}
/*
		 public function nuevo()
    {
        $producto = $this->Productos->newEntity();
        if ($this->request->is('post'))
        {
            $file = $this->request->data['upload'];
            $extension = substr(strtolower(strrchr($file['name'], '.')), 1);
            $allowedExtensions = array('jpg', 'jpeg', 'png');
            $hashName = time() . "_" . rand(000000, 999999);
            $producto = $this->Productos->patchEntity($producto, $this->request->data);
            if (in_array($extension, $allowedExtensions)) {
                //prepare the filename for database entry
                $imageFileName = $hashName . '.' . $extension;
                //do the actual uploading of the file. First arg is the tmp name, second arg is
                //where we are putting it
                move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/Productos/' . $imageFileName);
                $producto->image = $imageFileName;
            }
            $producto->user_id = $this->Auth->user('id');
            if ($this->Productos->save($producto)) {
                $this->Flash->success(__('The product has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        $users = $this->Productos->Users->find('list', ['limit' => 200]);
        $this->set(compact('producto', 'users'));
        $this->set('_serialize', ['product']);
    }
*/
	
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

	public function mostrar(){
		
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

	public function search() {
			$datos = $this->request->query['search'];

			$this->Paginator->settings = array(
				'limit' => 5,
				'order' => array(
					'Producto.initDate' => 'desc'),
					'conditions'=>array( 'OR' => array(
					array('Producto.name LIKE'=>'%'.$datos.'%'),
					array('Producto.description LIKE'=>'%'.$datos.'%'),)
				));

			$data = $this->Paginator->paginate('Post');

			foreach ($data as $key => $row) {
				$sql = "Select * from productos where id = ".$row["Producto"]["id"]."";
			}

			$this->set('search', $data);
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