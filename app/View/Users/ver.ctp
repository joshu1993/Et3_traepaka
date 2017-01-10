 <?php 
                        
            echo $this->element('navbar-2');         
           
  ?>

<div class= "user form">

<h1>Detalles del usuario: <?php echo $user['User']['username']; ?></h1>
</div>

    <div class= "user form">
<p><strong>Username: </strong><?php echo $user['User']['username']; ?></p>
<p><strong>Name: </strong><?php echo $user['User']['name']; ?></p>
<p><strong>Apellido: </strong><?php echo $user['User']['surname']; ?></p>
<p><strong>Email: </strong><?php echo $user['User']['email']; ?></p>
<p><strong>Tipo: </strong><?php echo $user['User']['tipo']; ?></p>
<p><strong>Creado: </strong><?php echo $user['User']['created']; ?></p>
    </div>

 <div class= "user form">
<h1>Productos Usuario:</h1>
 </div>
 <div class= "user form">
<?php if(empty($user['Producto'])): ?>
	
	<p> No tiene productos asociados </p>
	
<?php endif; ?>	


	<?php foreach($user['Producto'] as $us): ?>

		<p><strong>Nombre: </strong><?php echo $us['name']; ?></p>
        <p><strong>Descripcion: </strong><?php echo $us['description']; ?></p>
        <p><strong>Lugar: </strong><?php echo $us['place']; ?></p>
        <p><strong>Precio: </strong><?php echo $us['price']; ?></p>
        <p><strong>creado: </strong><?php echo $us['created']; ?></p>
        <br></br>
		
	<?php endforeach; ?>

	</div>

<div class="redireccion">
		<?php echo $this->Html->link('Volver a lista de usuarios',array('controller'=>'users','action'=>'index'));?>
</div>



