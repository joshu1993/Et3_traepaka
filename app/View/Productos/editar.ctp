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
          <li class="active"><a <?php echo $this->Html->link('Productos', '/Productos/index', array('class' => 'button')); ?></a></li>
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

<!-- app/View/Productos/nuevo.ctp -->
<div class="users form">

<?php echo $this->Form->create('Producto'); ?>
    <fieldset>
        <legend><?php echo __('Editar producto'); ?></legend>
        <?php 
    echo $this->Form->hidden('id', array('value' => $this->data['Producto']['id']));
    echo $this->Form->input('name', array('label' => 'Nombre producto', 'readonly' => 'readonly', 'label' => 'El nombre de producto no puede cambiarse!'));
    echo $this->Form->input('description', array('rows'=>3));
    echo $this->Form->input('place');
    echo $this->Form->input('price');
    echo $this->Form->input('category', array('options' => array('Casa y Jardin' =>'Casa y Jardin', 'Caza y Pesca' =>'Caza y Pesca', 'Deportes' =>'Deportes', 'Mobiliario' =>'Mobiliario','Moda' => 'Moda', 'Motor' => 'Motor', 'Tecnologia' => 'Tecnologia', 'Otros' =>'Otros'))); 
?>

    </fieldset>

    </fieldset>
<?php echo $this->Form->end('Modificar producto'); ?>
</div>

<div class="redireccion">
<?php echo $this->Html->link('Volver a lista de productos', array('controller'=>'productos','action'=>'index')); ?>
</div>
</body>




