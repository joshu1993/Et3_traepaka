 <?php 
                        
            echo $this->element('navbar-2');         
           
  ?>

   

<!-- app/View/Productos/nuevo.ctp -->
<div class="user form">


<?php echo $this->Form->create('Producto', array('type'=>'file')); ?>
    <fieldset>
    <legend><?php echo ('Crear Producto'); ?></legend>
    <?php

		echo $this->Form->input('name', array('label' => 'Nombre:'));
		echo $this->Form->input('description', array('rows'=>3, 'label' => 'Descripción (mínimo 20 caracteres):'));
		echo $this->Form->input('place', array('label' => 'Lugar:'));
        echo $this->Form->input('price', array('label' => 'Precio:'));
        echo $this->Form->input('foto', array('type'=>'file', 'label' => 'Foto:'));
        echo $this->Form->input('foto_dir', array('type'=>'hidden', 'label' => 'Foto:'));
		echo $this->Form->input('category', array(
            'options' => array( 'Casa y Jardín' =>'Casa y Jardin', 'Caza y Pesca' => 'Caza y Pesca', 'Deportes' =>'Deportes', 'Mobiliario' => 'Mobiliario','Moda' => 'Moda', 'Motor' =>'Motor', 'Tecnologia' =>'Tecnologia', 'Otros' =>'Otros'), 'label' => 'Categoría:'));
        echo $this->Form->hidden('user_id', array('value' => $current_user['id']));

    ?>
    </fieldset>
<?php echo $this->Form->end('Publicar producto'); ?>

</div>

<div class="inicio">
<?php 
echo $this->Html->link( "Volver a mis productos",   array('controller'=>'productos','action'=>'mostrar'));
?>
</div>



