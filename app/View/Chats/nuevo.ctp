 <?php 
                        
            echo $this->element('navbar-2');         
           
  ?>

   

<!-- app/View/Chats/nuevo.ctp -->
<div class="message_write">


<?php echo $this->Form->create('Chat'); ?><!-- crear mensaje create('Mensaje')-->
    <?php
		echo $this->Form->input('message', array('rows'=>3, 'label' => ''));
		echo $this->Form->hidden('user_id', array('value' => $current_user['id']));

    ?>
    </fieldset>
<?php echo $this->Form->end('Crear chat'); ?>

</div>

<div class="inicio">
<?php 
echo $this->Html->link( "Volver a la lista de chats",   array('controller'=>'chats','action'=>'index')); 
?>
</div>



