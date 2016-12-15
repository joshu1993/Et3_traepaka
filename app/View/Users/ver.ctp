 <?php 
                        
            echo $this->element('navbar-2');         
           
  ?>

<div>
		<?php echo $this->Html->link('Volver a la lista de usuarios',array('controller'=>'users','action'=>'index'));?>
</div>

<div>

<h1>Detalles del usuario <?php echo $user['User']['username']; ?></h1>

<p><strong>Username: </strong><?php echo $user['User']['username']; ?></p>
<p><strong>Name: </strong><?php echo $user['User']['name']; ?></p>
<p><strong>Apellido: </strong><?php echo $user['User']['surname']; ?></p>
<p><strong>Email: </strong><?php echo $user['User']['email']; ?></p>
<p><strong>Tipo: </strong><?php echo $user['User']['tipo']; ?></p>
<p><strong>Creado: </strong><?php echo $user['User']['created']; ?></p>

<h3>Productos Usuario:</h3>

<?php if(empty($user['Producto'])): ?>
	
	<p> No tiene productos asociados </p>
	
<?php endif; ?>	

	<?php foreach($user['Producto'] as $us): ?>
		
		<p>
			Nombre: <?php echo $us['name']; ?>
			<br />
			Descripcion: <?php echo $us['description']; ?>
			<br />
			Lugar: <?php echo $us['place']; ?>
			<br />
			Precio: <?php echo $us['price']; ?>
			<br />
			creado: <?php echo $us['created']; ?>
			<br />
		</p>
		
	<?php endforeach; ?>

</div>



