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
                 <div class="col-sm-3 chat_sidebar">
                    <div class="row">
                      <div class="dropdown all_conversation">
                      <button class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"    aria-expanded="false">
                        <i class="fa fa-weixin" aria-hidden="true"></i>
                        Chats
                      </button>
                      </div>
            <div class="member_list">
               <ul class="list-unstyled">
                  <li class="left clearfix">
                     <span class="chat-img pull-left">
                     <img src="/ET2_Traepaka/app/webroot/img/usuario_hombre.jpg" alt="User Avatar" class="img-circle">
                     </span>
                     <div class="chat-body clearfix">
                        <div class="header_sec">
                           <strong class="primary-font">Jorge García</strong>
                        </div>
                        <div class="contact_sec">
                           <strong class="primary-font">692247522</strong><span class="badge pull-right"></span>
                        </div>
                     </div>
                  </li>
                  <li class="left clearfix">
                     <span class="chat-img pull-left">
                     <img src="/ET2_Traepaka/app/webroot/img/usuario_hombre.jpg" alt="User Avatar" class="img-circle">
                     </span>
                     <div class="chat-body clearfix">
                        <div class="header_sec">
                           <strong class="primary-font">Edgar Torres</strong>
                        <div class="contact_sec">
                           <strong class="primary-font">652365411</strong> <span class="badge pull-right">3</span>
                        </div>
                     </div>
                  </li>
                  <li class="left clearfix">
                     <span class="chat-img pull-left">
                     <img src="/ET2_Traepaka/app/webroot/img/usuario_mujer.jpg" alt="User Avatar" class="img-circle">
                     </span>
                     <div class="chat-body clearfix">
                        <div class="header_sec">
                           <strong class="primary-font">Marta Serrano</strong>
                        </div>
                        <div class="contact_sec">
                           <strong class="primary-font">685214797</strong> <span class="badge pull-right">6</span>
                        </div>
                     </div>
                  </li>
                          <li class="left clearfix">
                     <span class="chat-img pull-left">
                     <img src="/ET2_Traepaka/app/webroot/img/usuario_mujer.jpg" alt="User Avatar" class="img-circle">
                     </span>
                     <div class="chat-body clearfix">
                        <div class="header_sec">
                           <strong class="primary-font">Verónica Rodríguez</strong>
                        </div>
                        <div class="contact_sec">
                           <strong class="primary-font">678245683</strong> <span class="badge pull-right"></span>
                        </div>
                     </div>
                  </li>
                          <li class="left clearfix">
                     <span class="chat-img pull-left">
                     <img src="/ET2_Traepaka/app/webroot/img/usuario_hombre.jpg" alt="User Avatar" class="img-circle">
                     </span>
                     <div class="chat-body clearfix">
                        <div class="header_sec">
                           <strong class="primary-font">Marcos Pérez</strong>
                        </div>
                        <div class="contact_sec">
                           <strong class="primary-font">684288522</strong> <span class="badge pull-right"></span>
                        </div>
                     </div>
                  </li>
                          <li class="left clearfix">
                     <span class="chat-img pull-left">
                     <img src="/ET2_Traepaka/app/webroot/img/usuario_mujer.jpg" alt="User Avatar" class="img-circle">
                     </span>
                     <div class="chat-body clearfix">
                        <div class="header_sec">
                           <strong class="primary-font">María Rey</strong>
                        </div>
                        <div class="contact_sec">
                           <strong class="primary-font">667457217</strong> <span class="badge pull-right"></span>
                        </div>
                     </div>
                  </li>
                  <li class="left clearfix">
                     <span class="chat-img pull-left">
                     <img src="/ET2_Traepaka/app/webroot/img/usuario_hombre.jpg" alt="User Avatar" class="img-circle">
                     </span>
                     <div class="chat-body clearfix">
                        <div class="header_sec">
                           <strong class="primary-font">Pedro Gallego</strong>
                        </div>
                        <div class="contact_sec">
                           <strong class="primary-font">678514523</strong> <span class="badge pull-right"></span>
                        </div>
                     </div>
                  </li>
                  <li class="left clearfix">
                     <span class="chat-img pull-left">
                     <img src="/ET2_Traepaka/app/webroot/img/usuario_mujer.jpg" alt="User Avatar" class="img-circle">
                     </span>
                     <div class="chat-body clearfix">
                        <div class="header_sec">
                           <strong class="primary-font">Rocío Molina</strong> 
                        <div class="contact_sec">
                           <strong class="primary-font">641256879</strong> <span class="badge pull-right"></span>
                        </div>
                     </div>
                  </li>                 
               </ul>
            </div></div>
         </div>

     <!--Barra_titulo_chat-->
     <div class="col-sm-9 message_section">
     <div class="row">
     <div class="new_message_head">
     <div class="pull-left"><button> Jorge García</button></div></div>
     
     <!--Area de chat-->
     
     <div class="chat_area">
     <ul class="list-unstyled">
         <li class="left clearfix">
                     <span class="chat-img1 pull-left">
                     <img src="/ET2_Traepaka/app/webroot/img/usuario_hombre.jpg" alt="User Avatar" class="img-circle">
                     </span>
                     <div class="chat-body1 clearfix">
                        <p>Hola Jorge, estoy interesado en la Ducati de tu anuncio y me gustaría que me dieses más información sobre ella</p>
                        <div class="chat_time pull-right">08:38</div>
                     </div>
                  </li>
               <li class="left clearfix">
                     <span class="chat-img1 pull-left">
                     <img src="/ET2_Traepaka/app/webroot/img/usuario_hombre.jpg" alt="User Avatar" class="img-circle">
                     </span>
                     <div class="chat-body1 clearfix">
                        <p>¿Has tenido algún golpe, o algo que deba saber? Es que me ha extrañado mucho que teniendo 6 años y tan pocos kms la vendas por ese precio..</p>
                        <div class="chat_time pull-right">08:39</div>
                     </div>
               </li>
               <li class="left clearfix admin_chat">
                     <span class="chat-img1 pull-right">
                     <img src="/ET2_Traepaka/app/webroot/img/usuario_hombre.jpg" alt="User Avatar" class="img-circle">
                     </span>
                     <div class="chat-body1 clearfix">
                        <p>Hola Ramón. Si, te doy la información que necesitas. </p>
                     <div class="chat_time pull-left">09:44</div>
                     </div>
               </li>
               <li class="left clearfix admin_chat">
                     <span class="chat-img1 pull-right">
                     <img src="/ET2_Traepaka/app/webroot/img/usuario_hombre.jpg" alt="User Avatar" class="img-circle">
                     </span>
                     <div class="chat-body1 clearfix">
                        <p>Con la moto la verdad es que no he tenido ningún golpe, su precio tan barato se debe a que necesito el dinero y me urge..</p>
                     <div class="chat_time pull-left">09:45</div>
                     </div>
               </li>     
        </ul>
     </div>
     <!--Escribir_mensaje-->
          <div class="message_write">
             <textarea class="form-control" placeholder="Escribe aquí tu mensaje..."></textarea>
             <div class="clearfix"></div>
             <div class="chat_bottom"><a href="#" class="pull-left upload_btn"><i class="fa fa-cloud-upload" aria-hidden="true"></i> 
                Adjuntar archivo</a> 
                <a href="#" class="pull-right btn btn-success"> Enviar</a></div>
             </div>
          </div>
       </div> 
      </div>
    </div>
  </div>
</section>
 
<script src="js/jquery.js" ></script>
<script src="js/bootstrap.js" ></script>
</body>
</html>
