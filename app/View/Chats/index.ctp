 <?php 
      if (isset($current_user)) {                
          echo $this->element('navbar-3'); 
        } else {                
          echo $this->element('navbar-1'); 
        } 
    ?>

<script src="https://use.fontawesome.com/45e03a14ce.js"></script>
  <div class="main_section">
    <div class="container">
      <div class="chat_container">
          <div class="col-sm-5 chat_sidebar">
              <div class="row">
                      <div class="dropdown all_conversation">
                      <button class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"    aria-expanded="false">
                        <i class="fa fa-weixin" aria-hidden="true"></i>
                        Chats
                      </button>
                      </div>
                      </div>

            <div class="member_list">
               <ul class="list-unstyled">
                
                <div>
                  <?php foreach($chats as $us): ?>
                    <li class="left clearfix">
                    <span class="chat-img pull-left">
                     <img src="../app/webroot/img/usuario_hombre.jpg" alt="User Avatar" class="img-circle">
                     </span>
                      <div class="chat-body clearfix">
                        <div class="header_sec">
                           <strong class="primary-font"><?php echo $us['Chat']['id']; ?></strong>
                        </div>
                        <div class="contact_sec">
                           <strong class="primary-font"><?php echo $us['Chat']['user_id']; ?></strong><span class="badge pull-right"></span>
                        </div>
                        </div>
                    </li>
                  <?php endforeach; ?>
                </div>
            
                       
              </ul>
              </div>
            </div>

     <!--Barra_titulo_chat-->
     <div class="col-sm-7 message_section">
     <div class="row">
     <div class="new_message_head">
     <div class="pull-left"><button><?= $us['Chat']['name']
               ?></button></div></div>
     
     <!--Area de chat-->
     
     <div class="chat_area">
     <ul class="list-unstyled">
     <div>
              <!-- aqui hay que hacer una función que muestre de primero el mensaje del comprador, y despues muestre la contestacion del current_user-->
                  <?php if(count($chats) == 0): ?>
                     <h3> No tiene chats asociados </h3>
                  <?php endif; ?>
                  <?php foreach($chats as $us): ?>
                    <li class="left clearfix">
                    <span class="chat-img pull-left">
                     <img src="../app/webroot/img/usuario_hombre.jpg" alt="User Avatar" class="img-circle">
                     </span>
                      <div class="chat-body1 clearfix">
                        <?php echo $us['Chat']['message']; ?>
                        <div class="chat_time pull-right"><?php echo $us['Chat']['time']; ?></div>
                        </div>
                    </li>
                  <?php endforeach; ?>
      </div>
                  <li class="left clearfix admin_chat">
                     <span class="chat-img1 pull-right">
                     <img src="/ET2_Traepaka/app/webroot/img/usuario_hombre.jpg" alt="User Avatar" class="img-circle">
                     </span>
                     <div class="chat-body1 clearfix">
                        <p>Hola Ramón. Si, te doy la información que necesitas. </p>
                     <div class="chat_time pull-left">09:44</div>
                     </div>
               </li>
        </ul>
     </div>

     <!--Escribir_mensaje-->
          <div class="message_write">
              <?php echo $this->Form->create('Chat'); ?>
                <fieldset>
                  <?php
                      echo $this->Form->input('Message', array('rows'=>3, 'label' => ''));
                      echo $this->Form->hidden('user_id', array('value' => $current_user['id']));
                  ?>
                </fieldset>
                  
              <div class="chat_bottom">
                <?php echo $this->Form->end('Enviar chat'); ?>
              </div>
          </div>




      </div>
    </div>
  </div>
