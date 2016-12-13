 <?php 
                        
            echo $this->element('navbar-2');         
           
  ?>


<!-- app/View/Users/index.ctp -->
<div class="user form">

<h1> Lista de usuarios:</h1>
<table>
    <thead>
		<tr>
			<th><?php echo $this->Form->checkbox('all', array('name' => 'CheckAll',  'id' => 'CheckAll')); ?></th>
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
		<?php if($count % 2): echo '<tr>'; else: echo '<tr class="zebra">' ?>
		<?php endif; ?>
			<td><?php echo $this->Form->checkbox('User.id.'.$user['User']['id']); ?></td>
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

<div class="user form">

 <section>

   <?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'enabled'));?>
   <?php echo $this->Paginator->numbers(array(   'class' => 'numbers'     ));?>
   <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'enabled'));?>
  
  <!--
    <div id="paginasbuscar" class="row">
      <nav aria-label="..."><ul class="pagination">...</ul></nav>
        <ul class="pagination">
          <li class="disabled">
            <span>
              <span aria-hidden="true">&laquo;</span>
            </span>
          </li>
          <li class="active"><span>1 <span class="sr-only">(current)</span></span></li>
          <li> <span>2 <span class="sr-only">(current)</span></span></li>
          <li> <span>3 <span class="sr-only">(current)</span></span></li>
          <li> <span>4 <span class="sr-only">(current)</span></span></li>
          <li> <span>5 <span class="sr-only">(current)</span></span></li>
          <li> <span>6 <span class="sr-only">(current)</span></span></li>
          <li> <span>7 <span class="sr-only">(current)</span></span></li>
          <li> <span>8 <span class="sr-only">(current)</span></span></li>
          <li> <span>9 <span class="sr-only">(current)</span></span></li>
          </ul>
      </nav>
    </div>
    -->
  </section>
  	

</div>

<div class="redireccion">

<?php echo $this->Html->link( "Crear usuario",   array('action'=>'add'),array('escape' => false) ); ?>

</div>

</body>

</html>

