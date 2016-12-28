  <?php 
      if (isset($current_user)) {                
          echo $this->element('navbar-2'); 
        } 
  ?>


<div class="user form">

<h1>Detalles del chat  <?php echo $chat['Chat']['id']; ?></h1>

</div>

<div class="user form">
<?php print_r($chat);?>
<p><strong>Nombre producto: </strong><?php echo $chat['Producto']['name']; ?></p>
<p><strong>Descripción: </strong><?php echo $chat['Producto']['description']; ?></p>
<p><strong>Lugar: </strong><?php echo $chat['Producto']['place']; ?></p>
<p><strong>Precio: </strong><?php echo $chat['Producto']['price']; ?>€ </p>
<p><strong>Categoría: </strong><?php echo $chat['Producto']['category']; ?></p>
<p><strong>Fecha de publicación: </strong><?php echo $chat['Producto']['created']; ?></p>



</div>




<div class="redireccion">
<?php
  echo $this->Html->link('Volver a la lista de chats',array('controller'=>'chats','action'=>'mostrar'));
?>
</div>


