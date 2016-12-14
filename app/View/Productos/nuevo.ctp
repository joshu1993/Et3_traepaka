 <?php 
                        
            echo $this->element('navbar-2');         
           
  ?>

   

<!-- app/View/Productos/nuevo.ctp -->
<div class="user form">


<?php echo $this->Form->create('Producto', array('type'=>'file')); ?>
    <fieldset>
    <legend><?php echo ('Crear Producto'); ?></legend>
    <?php

		echo $this->Form->input('name');
		echo $this->Form->input('description', array('rows'=>3));
		echo $this->Form->input('place');
        echo $this->Form->input('price');
        echo $this->Form->input('foto', array('type'=>'file', 'label' => 'Foto'));
        echo $this->Form->input('foto_dir', array('type'=>'hidden', 'label' => 'Foto'));
		echo $this->Form->input('category_id', array(
            'options' => array( 'Casa y Jardín' =>'Casa y Jardin', 'Caza y Pesca' => 'Caza y Pesca', 'Deportes' =>'Deportes', 'Mobiliario' => 'Mobiliario','Moda' => 'Moda', 'Motor' =>'Motor', 'Tecnologia' =>'Tecnologia', 'Otros' =>'Otros')));
        echo $this->Form->input('user_id');
    ?>
    </fieldset>
<?php echo $this->Form->end('Publicar producto'); ?>

</div>

<div class="redireccion">
<?php 
echo $this->Html->link( "Volver a la lista de productos",   array('controller'=>'productos','action'=>'index')); 
?>
</div>

</body>

