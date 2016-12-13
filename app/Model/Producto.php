<?php 

App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
App::uses('AppModel', 'Model');

class Producto extends AppModel
 {
 
 
		
	
 
	public $belongsTo = array(
		'User'=>array(
			'className'=>'User',
			'foreignKey'=> 'user_id',
			'conditions'=>'',
			'depend' => false
		)
	
	
	);
	
	
	public $validate = array(
	
		'name'=> array(
				'notEmpty' => array(
					'rule'=> 'notEmpty'
				),
				'unique'=> array(
					'rule' => 'isUnique',
					'message'=> 'El nombre del producto debe ser unico'
				)
			),
/*
		'description'=> array(
				'notEmpty' => array(
				'rule' => array('minLength', '20'),
                'message'=> 'La descripción debe tener como mínimo 20 caracteres' 
				)
			),
		'place'=> array(
				'notEmpty' => array(
					'rule'=> 'notEmpty'
				)
			),
		'price'=> array(
				'notEmpty' => array(
					'rule'=> 'notEmpty'
				)
			),*/
		
        'category' => array(
                    'valid' => array(
                    'rule' => array('inList', array('Casa y Jardin', 'Caza y Pesca', 'Deportes', 'Mobiliario', 'Moda', 'Motor', 'Tecnologia', 'Otros')),
                    'message' => 'Por favor introduce una categoria válida',
                    'allowEmpty' => false
                    ))
	);

}
?>