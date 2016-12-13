 <?php 
                        
            echo $this->element('navbar-2');         
           
  ?>

   

<!-- app/View/Productos/nuevo.ctp -->
<div class="user form">


<?php echo $this->Form->create('Producto', array('type' => 'file', 'novalidate' => 'novalidate')); ?>
    <fieldset>
    <legend><?php echo ('Crear Producto'); ?></legend>
    <?php
		echo $this->Form->input('name');
		echo $this->Form->input('description', array('rows'=>3));
		echo $this->Form->input('place');
        echo $this->Form->input('price');
        echo $this->Form->input('foto', array('type' => 'file', 'label' => 'Foto'));
        echo $this->Form->input('foto_dir', array('type' => 'hidden'));
        echo $this->Form->input('category_id');
        echo $this->Form->input('user_id');
    ?>
    </fieldset>
<?php echo $this->Form->end('Publicar producto'); ?>

</div>

<div class="redireccion">
<?php 
if($this->Session->check('Auth.User')){
echo $this->Html->link( "Volver a la lista de productos",   array('controller'=>'productos','action'=>'index')); 
/*echo $this->Html->link( "Logout",   array('action'=>'logout')); */
}else{
echo $this->Html->link( "Volver a inicio",   array('controller'=>'posts','action'=>'view')); 
}
?>
</div>

</body>

