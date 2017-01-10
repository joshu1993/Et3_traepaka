  
<!-- app/View/Users/addadmin.ctp -->
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>

        <legend><?php echo ('Registro de usuarios'); ?></legend>

        <?php echo $this->Form->input('username');
		echo $this->Form->input('name');
		echo $this->Form->input('surname');
        echo $this->Form->input('password', array( 'label' => 'Password (mínimo 8 caracteres):'));
		echo $this->Form->input('email');
        echo $this->Form->input('tipo', array(
            'options' => array('admin' => 'Admin', 'user' => 'User')
        ));
    ?>
    </fieldset>
<?php echo $this->Form->end('Añadir usuario'); ?>
</div>

<div class="redireccion">
<?php
if($this->Session->check('Auth.User')){
echo $this->Html->link( "Volver a la lista de usuarios",   array('controller'=>'users','action'=>'index'));
/*echo $this->Html->link( "Logout",   array('action'=>'logout')); */
}else{
echo $this->Html->link( "Volver a inicio",   array('controller'=>'productos','action'=>'index'));
}
?>
</div>


