 <?php 
                        
            echo $this->element('navbar-2');         
           
  ?>

<div class= "user form">

<h1>Detalles del usuario <?php echo $user['User']['username']; ?></h1>
<div class = "colocar">
<p><strong>Username: </strong><?php echo $user['User']['username']; ?></p>
<p><strong>Name: </strong><?php echo $user['User']['name']; ?></p>
<p><strong>Apellido: </strong><?php echo $user['User']['surname']; ?></p>
<p><strong>Email: </strong><?php echo $user['User']['email']; ?></p>
<p><strong>Tipo: </strong><?php echo $user['User']['tipo']; ?></p>
<p><strong>Creado: </strong><?php echo $user['User']['created']; ?></p>
</div>
<div>
<h1>Productos Usuario:</h1>

<?php if(empty($user['Producto'])): ?>
	
	<p> No tiene productos asociados </p>
	
<?php endif; ?>	
<div>

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
	</div>

</div>

<div class="redireccion">
		<?php echo $this->Html->link('Volver a la lista de usuarios',array('controller'=>'users','action'=>'index'));?>
</div>



