 <?php 
                        
            echo $this->element('navbar-2');         
           
  ?>


<!-- app/View/Users/index.ctp -->
<div class="user form">

<h1> Lista de usuarios:</h1>
<table>
    <thead>
		<tr>
			
			<th><?php echo $this->Paginator->sort('username', 'Usuario');?>  </th>
			<th><?php echo $this->Paginator->sort('email', 'E-Mail');?></th>
			<th><?php echo $this->Paginator->sort('tipo','Tipo');?></th>
			<th><?php echo $this->Paginator->sort('created', 'Creado');?></th>
			<th><?php echo $this->Paginator->sort('ver','Ver');?></th></th>
			<th><?php echo $this->Paginator->sort('edit','Modificar');?></th></th>
			<th><?php echo $this->Paginator->sort('delete','Eliminar');?></th>
		</tr>
	</thead>
	<tbody>						
		<?php $count=0; ?>
		<?php foreach($users as $user): ?>				
		<?php $count ++;?>
		<?php if($count % 2): echo '<tr>'; else: echo '<tr>' ?>
		<?php endif; ?>
			
			<td><?php echo $user['User']['username']; ?></td>
			<td><?php echo $user['User']['email']; ?></td>
			<td><?php echo $user['User']['tipo']; ?></td>
			<td><?php echo $this->Time->niceShort($user['User']['created']); ?></td>
			<td><?php echo $this->Html->Link('+info', array('controller'=> 'users', 'action'=> 'ver',$user['User']['id'])); ?></td>
			<td><?php echo $this->Html->Link('edit', array('controller'=> 'users', 'action'=> 'edit',$user['User']['id'])); ?></td>
			<td><?php echo $this->Form->postLink('delete', array('action'=> 'delete', $user['User']['id']), array('confirm'=>'Eliminar a ' . $user['User']['name'] . '?' )); ?></td>
			</td>
		</tr>
		<?php endforeach; ?>
		<?php unset($user); ?>
	</tbody>
</table>
</div>

<div class="redireccion">

<?php echo $this->Html->link( "Crear usuario",   array('controller'=>'users', 'action'=>'addadmin')); ?>

</div>
