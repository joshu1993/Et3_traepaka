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
                    <button class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-weixin" aria-hidden="true"></i>
                        Chats
                    </button>
                </div>


                <div class="member_list">
                    <ul class="list-unstyled">

                        <div>
                            <?php foreach ($conversaciones as $conversacion): ?>
                                <li class="left clearfix">

                                    <a href="<?= $this->Html->url(array(
                                        'controller' => 'Chats',
                                        'action' => 'mostrar',
                                        '?' => array(
                                            'producto_id' => $conversacion['Chat']['producto_id'],
                                            'user_id' => $current_user['id'] == $conversacion['Chat']['created_by'] ?
                                                $conversacion['Chat']['user_id'] :
                                                $conversacion['Chat']['created_by']
                                        )
                                    )) ?>">
                                      <span class="chat-img pull-left">
                                        <img src="<?= $this->Html->url('/img/usuario_hombre.jpg') ?>" alt="User Avatar"
                                             class="img-circle">
                                      </span>
                                        <div class="chat-body clearfix">
                                            <div class="header_sec">
                                                <strong class="primary-font"><?php echo $conversacion['Producto']['name']; ?></strong>
                                            </div>
                                            <div class="contact_sec">
                                                <strong class="primary-font">
                                                    <?= $current_user['id'] == $conversacion['Chat']['created_by'] ?
                                                        $conversacion['User']['username'] :
                                                        $conversacion['UserCreador']['username'] ?>
                                                </strong>
                                                <span class="badge pull-right"></span>
                                            </div>
                                        </div>
                                    </a>
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
                        <button><?= $producto['Producto']['name'] ?></button>
                    </div>
                </div>


                <!--Area de chat-->

                <div class="chat_area">
                    <ul class="list-unstyled">
                        <div>
                            <!-- aqui hay que hacer una función que muestre de primero el mensaje del comprador (puede ser current_user, y despues muestre la contestacion del vendedor-->
                            <?php if (count($chats) == 0): ?>
                                <h3> No tiene chats asociados </h3>
                            <?php endif; ?>
                            <?php foreach ($chats as $chat): ?>

                                    <li class="left clearfix">
                    <span class="chat-img pull-left">
                     <img data-toggle="tooltip" title="<?= $chat['UserCreador']['username'] ?>" src="<?= $this->Html->url('/img/usuario_hombre.jpg') ?>" alt="User Avatar" class="img-circle">
                     </span>
                                        <div class="chat-body1 clearfix">
                                            <?php echo $chat['Chat']['message']; ?>
                                            <div class="chat_time"><?php echo $chat['Chat']['time']; ?></div>
                                        </div>
                                    </li>
                            <?php endforeach; ?>


                        </div>
                    </ul>
                </div>

                <!--Escribir_mensaje-->
                <div class="message_write">
                    <?php echo $this->Form->create('Chat'); ?>
                    <fieldset>
                        <?php
                        echo $this->Form->input('message', array('rows' => 3, 'label' => ''));
                        echo $this->Form->hidden('producto_id', array('value' => $producto['Producto']['id']));
                        echo $this->Form->hidden('no_redirect', array('value' => 'true'));
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

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>