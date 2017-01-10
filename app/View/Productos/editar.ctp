 <?php 
                        
            echo $this->element('navbar-2');         
           
  ?>

<!-- app/View/Productos/nuevo.ctp -->
<div class="users form">

<?php echo $this->Form->create('Producto'); ?>
    <fieldset>
        <legend><?php echo __('Editar producto'); ?></legend>
        <?php 
    echo $this->Form->hidden('id', array('value' => $this->data['Producto']['id']));
    echo $this->Form->input('name', array('label' => 'Nombre producto', 'readonly' => 'readonly', 'label' => 'El nombre de producto no puede cambiarse!'));
    echo $this->Form->input('description', array('rows'=>3));
    echo $this->Form->input('place');
    echo $this->Form->input('price');
    echo $this->Form->input('foto', array('type'=>'file', 'label' => 'Foto:'));
    echo $this->Form->input('foto_dir', array('type'=>'hidden', 'label' => 'Foto:'));
    echo $this->Form->input('category', array('options' => array('Casa y Jardin' =>'Casa y Jardin', 'Caza y Pesca' =>'Caza y Pesca', 'Deportes' =>'Deportes', 'Mobiliario' =>'Mobiliario','Moda' => 'Moda', 'Motor' => 'Motor', 'Tecnologia' => 'Tecnologia', 'Otros' =>'Otros'))); 
?>

    </fieldset>

    </fieldset>
<?php echo $this->Form->end('Modificar producto'); ?>
</div>

<div class="redireccion">
<?php echo $this->Html->link('Volver a mis productos', array('controller'=>'productos','action'=>'mostrar')); ?>
</div>
</body>




