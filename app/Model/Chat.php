<?php 

class Chat extends AppModel {
 
    public $validate = array(
                    'key' => array(
                             'rule' => array('minLength', '1')
                           ),
                    'name' => array(
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
        )
    
    
    );
}
?>