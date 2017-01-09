<?php 

class Chat extends AppModel {
 
    public $validate = array(
                    'id' => array(
                             'rule' => array('minLength', '1')
                           ),
                    'message' => array(
                                 'rule' => array('minLength', '1')
                               )
                  );

    
    public $belongsTo = array(
        'Producto'=>array(
            'className'=>'Producto',
            'foreignKey'=> 'producto_id',
            'conditions'=>'',
            'depend' => false
        ),
        
        'User'=>array(
            'className'=>'User',
            'foreignKey'=> 'user_id',
            'conditions'=>'',
            'depend' => false
        ),

        'UserCreador'=>array(
            'className'=>'User',
            'foreignKey'=> 'created_by',
            'conditions'=>'',
            'depend' => false
        )
    
    
    );
}
?>