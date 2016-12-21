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
     <div class="col-sm-5 chat_sidebar">
              <div class="row">
                      <div class="dropdown all_conversation">
                      <button class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"    aria-expanded="false">
                        <i class="fa fa-weixin" aria-hidden="true"></i>
                        Chats
                      </button>
                      </div>
              
    
                     <div class="member_list">
                        <ul class="list-unstyled">
                
                     <div>
                        <?php foreach($chats as $chat): ?>
                          <li class="left clearfix">
                              <span class="chat-img pull-left">
                              <img src="../app/webroot/img/usuario_hombre.jpg" alt="User Avatar" class="img-circle">
                              </span>
                            <div class="chat-body clearfix">
                                 <div class="header_sec">
                                  <strong class="primary-font"><?php echo $chat['Producto']['name']; ?></strong>
                                  </div>
                                <div class="contact_sec">
                                 <strong class="primary-font"><?php echo $chat['User']['username']; ?></strong><span class="badge pull-right"></span>
                              </div>
                            </div>
                          </li>
                        <?php endforeach; ?>
                  </div>
                  </ul>
               </div>
            </div>
      </div>


      <!--Barra_titulo_chat-->
     <div class="col-sm-7 message_section">
     <div class="row">
     <div class="new_message_head">
        <div class="pull-left">
         <button><?= $chat['User']['username']?></button>
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
                    <?php print_r($current_user)?>
                    <?php if($chat['Chat']['created_by'] == 0): ?>
                    <li class="left clearfix">
                    <span class="chat-img pull-left">
                     <img src="../app/webroot/img/usuario_hombre.jpg" alt="User Avatar" class="img-circle">
                     </span>
                      <div class="chat-body1 clearfix">
                        <?php echo $chat['Chat']['message']; ?>
                        <!--<div class="chat_time pull-right"><?php echo $us['Chat']['time']; ?></div>-->
                        </div>
                    </li>
                    <?php endif; ?>
                  <?php endforeach; ?>
                  
           </div>
        </ul>
    </div>

   </div>
 </div>
</div>
</div>