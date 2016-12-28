  <?php 
      if (isset($current_user)) {                
          echo $this->element('navbar-2'); 
        } 
  ?>


<div class="user form">

<h1>Chat del producto  <?php echo $producto['Producto']['name']; ?></h1>

</div>

<div class="user form">

<p><?php echo $this -> Html -> image('../files/producto/foto/'. $producto['Producto']['foto_dir'].'/'. 'big_'.$producto['Producto']['foto']);?></p>
<p><strong>Nombre producto: </strong><?php echo $producto['Producto']['name']; ?></p>
<p><strong>Descripción: </strong><?php echo $producto['Producto']['description']; ?></p>
<p><strong>Lugar: </strong><?php echo $producto['Producto']['place']; ?></p>
<p><strong>Precio: </strong><?php echo $producto['Producto']['price']; ?>€ </p>
<p><strong>Categoría: </strong><?php echo $producto['Producto']['category']; ?></p>
<p><strong>Fecha de publicación: </strong><?php echo $producto['Producto']['created']; ?></p>



</div>

<script src="https://use.fontawesome.com/45e03a14ce.js"></script>
  <div class="main_section">
    <div class="container">
     <div class="col-sm-5 chat_sidebar">
              <div class="row">
                      <div class="dropdown all_conversation">
                      <button class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"    aria-expanded="false">
                        <i class="fa fa-weixin" aria-hidden="true"></i>
                        Chats
                      </button>
                      </div>
            </div>
      </div>


      <!--Barra_titulo_chat-->
     <div class="col-sm-7 message_section">
     <div class="row">
     <div class="new_message_head">
        <div class="pull-left">
         <button><?= $chat['Producto']['name']?></button>
        </div>
     </div>



     <!--Area de chat-->
     
     <div class="chat_area">
     <ul class="list-unstyled">
     <div>
              <!-- aqui hay que hacer una función que muestre de primero el mensaje del comprador, y despues muestre la contestacion del current_user-->
                  <?php if(count($chats) == 0): ?>
                     <h3> No tiene chats asociados </h3>
                  <?php endif; ?>  
                  <?php foreach($chats as $chat):?>
                    
                    <?php if($chat['Chat']['created_by'] == $current_user['id']): ?>
                    <li class="left clearfix">
                    <span class="chat-img pull-left">
                     <img src="../app/webroot/img/usuario_hombre.jpg" alt="User Avatar" class="img-circle">
                     </span>
                      <div class="chat-body1 clearfix">
                        <?php echo $chat['Chat']['message']; ?>
                        <div class="chat_time"><?php echo $chat['Chat']['time']; ?></div>
                        </div>
                    </li>
                    <?php endif; ?>
                  <?php endforeach; ?>
                                  
                  
           </div>
        </ul>
    </div>

    <!--Escribir_mensaje-->
          <div class="message_write">
              <?php echo $this->Form->create('Chat'); ?>
                <fieldset>
                  <?php
                      echo $this->Form->hidden('created_by', array('value' => $current_user['id']));
                      echo $this->Form->input('message', array('rows'=>3, 'label' => ''));
                      echo $this->Form->hidden('time', array('value' => $chat['Chat']['time']));
                      echo $this->Form->hidden('update_time', array('value' => $chat['Chat']['update_time']));
                      echo $this->Form->hidden('user_id', array('value' => $chat['User']['id']));
                      echo $this->Form->hidden('producto_id', array('value' => $chat['Producto']['id']));
                  ?>
          
                </fieldset>
                  
              <div class="chat_bottom">
                <?php echo $this->Form->end('Enviar mensaje'); ?>
              </div>
          </div>

   </div>
 </div>
</div>
</div>



<div class="redireccion">
<?php
  echo $this->Html->link('Volver a la lista de productos',array('controller'=>'productos','action'=>'index'));
?>
</div>
</body>

