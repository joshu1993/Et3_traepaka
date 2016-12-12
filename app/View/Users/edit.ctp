<?php
    echo $this->Html->meta('icon');

    echo $this->Html->css(array('bootstrap.min','bootstrap-theme.min'));
    echo $this->Html->css('traepaka.css'); 
    echo $this->Html->script(array('jquery','bootstrap.min'));

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
  ?>
<!doctype html>
<html>
<head>
<!--
<meta charset="UTF-8">

 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimun-scale=1.0, user-scalable=no">

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
 <link rel="stylesheet" href="css/traepaka.css"></link>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 <title>Traepaká</title>
-->
</head>

<body>
  <header>
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
      <div class="container">
        <!-- Logo y toggle quedan agrupados para una mejor visualización en dispositivos móviles -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegador" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          <div id="logo" >
          <img src="/ET2_Traepaka/app/webroot/img/imagenlogo.png">
          </div>
        </div>

        <!-- Agrupa los enlaces de navegación, formularios y otros contenidos para toggle -->
      <div class="collapse navbar-collapse" id="navegador">
        <ul class="nav navbar-nav">

          <li><a <?php echo $this->Html->link('Inicio', '/Posts/view', array('class' => 'button')); ?></a></li>
          <li><a <?php echo $this->Html->link('Chats', '/Chats/vista', array('class' => 'button')); ?></a></li>
          <li><a <?php echo $this->Html->link('Productos', '/Productos/index', array('class' => 'button')); ?></a></li>
        </ul> 
        <ul class="nav navbar-nav navbar-right">
        <div id="nombredeusuario" class= "col-sm-1">
               <button type="submit" class="nombreusuario"><img src="/ET2_Traepaka/app/webroot/img/logousuario.png"></img>    &nbsp<?php echo $this->Html->link('Control Usuarios',array('controller'=>'users','action'=>'index')); ?>
               </button>
                <!--<h1>Detalles del usuario <?php echo $user['User']['username']; ?></h1>-->
            </div>
        </ul>
        
        <ul class="nav navbar-nav navbar-right">
           <button type="submit" class="cierresesion"><?php echo $this->Html->link('Cerrar Sesión',array('controller'=>'users','action'=>'logout')); ?></button>
        </ul>      
    </div>
  </div>
</nav>
  </header>
<!-- app/View/Users/edit.ctp -->
<div class="users form">

<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Editar usuario'); ?></legend>
        <?php 
		echo $this->Form->hidden('id', array('value' => $this->data['User']['id']));
		echo $this->Form->input('username', array('label' => 'Nombre usuario', 'readonly' => 'readonly', 'label' => 'El nombre de usuario no puede cambiarse!'));
		echo $this->Form->input('email');
        echo $this->Form->input('password_update', array( 'label' => 'Nueva contraseña', 'maxLength' => 255, 'type'=>'password', 'required' => 0));
		echo $this->Form->input('password_confirm_update', array('label' => 'Repetir contraseña', 'maxLength' => 255, 'title' => 'Repite la contraseña', 'type'=>'password', 'required' => 0));
		
		echo $this->Form->input('tipo', array(
            'options' => array( 'admin' => 'Admin', 'user' => 'User')
        )); 
?>
    </fieldset>
<?php echo $this->Form->end('Modificar usuario'); ?>
</div>
<div class="redireccion">

<table>
<?php echo $this->Html->link('Volver lista de usuarios',array('controller'=>'users','action'=>'index'));?>
</table>

</div>
</body>