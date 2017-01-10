  <?php 
      if (isset($current_user)) {                
          echo $this->element('navbar-2'); 
        } 
  ?>


<div class="user form">

<h1>Detalles del producto:  <?php echo $producto['Producto']['name']; ?></h1>

</div>

<div class="user form">

<p><?php echo $this -> Html -> image('../files/producto/foto/'. $producto['Producto']['foto_dir'].'/'. 'big_'.$producto['Producto']['foto']);?></p>
<p><strong>Nombre producto: </strong><?php echo $producto['Producto']['name']; ?></p>
<p><strong>Descripción: </strong><?php echo $producto['Producto']['description']; ?></p>
<p><strong>Lugar: </strong><?php echo $producto['Producto']['place']; ?></p>
<p><strong>Precio: </strong><?php echo $producto['Producto']['price']; ?>€ </p>
<p><strong>Categoría: </strong><?php echo $producto['Producto']['category']; ?></p>
<p><strong>Fecha de publicación: </strong><?php echo $producto['Producto']['created']; ?></p>

    <div class="loquiero">
        <?php echo $this->Html->link('Lo quiero!', array('controller'=> 'chats','action'=> 'add', $producto['Producto']['id'])); ?>
    </div>

</div>




<div class="redireccion">
<?php
  echo $this->Html->link('Volver al inicio',array('controller'=>'productos','action'=>'index'));
?>
</div>


