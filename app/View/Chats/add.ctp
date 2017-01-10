 <?php 
                        
            echo $this->element('navbar-2');         
           
  ?>

   

<!-- app/View/Chats/nuevo.ctp -->
<div class="user form">
<div class="message_write">
<h1> Hola <?php echo $current_user['name']?>!</h1>

<h2>Para contactar con el vendedor de este producto sólo tienes que escribirle un mensaje para iniciar la conversación con él</h2>

<?php echo $this->Form->create('Chat'); ?><!-- crear mensaje create('Mensaje')-->
    <?php
          echo $this->Form->input('message', array('rows'=>3, 'label' => ''));
          echo $this->Form->hidden('producto_id', array('value' => $producto_id));
    ?>
    </fieldset>
<?php echo $this->Form->end('Crear chat'); ?>

</div>
</div>

<div class="inicio">
<?php 
echo $this->Html->link( "Volver al inicio",   array('controller'=>'productos','action'=>'index'));
?>
</div>



