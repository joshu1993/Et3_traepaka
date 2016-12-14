<?php 

App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
App::uses('AppModel', 'Model');

class Producto extends AppModel
 {
 	
 
    public $actsAs = array(
        'Upload.Upload' => array(
            'foto' => array(
                'fields' => array(
                    'dir' => 'foto_dir'
                ),  
                'thumbnailMethod'=> 'php',              
                'thumbnailSizes' => array(
      				'big' => '360x200',
                    'small' =>'150x100',
                    'thumb' =>'80x50'
                ),
                'deleteOnUpdate' => true,
                'deleteFolderOnDelete' => true
                
            ) /*, Para subir más archivos misma operación: Despues de la ,'foto' => array(
                'fields' => array(
                    'dir' => 'foto_dir'
                ),  
                'thumbnailMethod'=> 'php',              
                'thumbnailSizes' => array(
      				'big' => '360x200',
                    'small' =>'150x100',
                    'thumb' =>'80x50'
                ),
                'deleteOnUpdate' => true,
                'deleteFolderOnDelete' => true*/

        )
    );
		
	
 
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
				)
			),

		'description'=> array(
				
				'notBlank' => array(
				'rule'=> 'notBlank'
				),

				'between' => array(
                'rule' => array('between', 20, 250),
                'message' => 'Entre 20 y 250 caracteres'
            )
        ),

		'place'=> array(
				'notBlank' => array(
					'rule'=> 'notBlank'
				)
			),

		'price'=> array(
				'notBlank' => array(
					'rule'=> 'notBlank'
				)
			),
		
        'category' => array(
                    'valid' => array(
                    'rule' => array('inList', array('Casa y Jardin', 'Caza y Pesca', 'Deportes', 'Mobiliario', 'Moda', 'Motor', 'Tecnologia', 'Otros')),
                    'message' => 'Por favor introduce una categoria válida',
                    'allowEmpty' => false
                    ))
	);

}
?>