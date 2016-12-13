 <?php 
                        
            echo $this->element('navbar-2');         
           
  ?>

<div class="user form">

<h1>Detalles del producto <?php echo $producto['Producto']['name']; ?></h1>

</div>

<div class="user form">

<p><strong>Name: </strong><?php echo $producto['Producto']['name']; ?></p>
<p><strong>Description: </strong><?php echo $producto['Producto']['description']; ?></p>
<p><strong>Place: </strong><?php echo $producto['Producto']['place']; ?></p>
<p><strong>Price: </strong><?php echo $producto['Producto']['price']; ?></p>
<p><strong>Category: </strong><?php echo $producto['Producto']['category']; ?></p>
<p><strong>Created: </strong><?php echo $producto['Producto']['created']; ?></p>

</div>

<div class="redireccion">
<?php
  echo $this->Html->link('Volver a la lista de productos',array('controller'=>'productos','action'=>'index'));
?>
</div>
</body>

