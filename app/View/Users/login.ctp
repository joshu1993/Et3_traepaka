<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Por favor introduzca usuario y contraseña'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
</div>
<div class="redireccion">

<?php
 	echo $this->Html->link( "Registrarse",   array('action'=>'add') ); 
?>
</div>

<div class="redireccion">
<?php
	echo $this->Html->link('Volver al inicio',array('controller'=>'productos','action'=>'index'));
?>
</div>
