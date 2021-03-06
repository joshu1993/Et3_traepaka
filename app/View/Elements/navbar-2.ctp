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
              <img src="<?= $this->Html->url('/img/imagenlogo.png') ?>">
          </div>
        </div>

        <!-- Agrupa los enlaces de navegación, formularios y otros contenidos para toggle -->
      <div class="collapse navbar-collapse" id="navegador">
        <ul class="nav navbar-nav">

          <li><a <?php echo $this->Html->link('Inicio', '/Productos/index', array('class' => 'button')); ?></a></li>
          <li><a <?php echo $this->Html->link('Chats', '/Chats/mostrar', array('class' => 'button')); ?></a></li>
          <li><a <?php echo $this->Html->link('Mis productos', '/Productos/mostrar', array('class' => 'button')); ?></a></li>
        </ul>
        <ul>
        <div class="navbar-form navbar-left">
          <div class="form-group"> 
            <?php echo $this->Form->create('Productos', array('controller' => 'productos', 'action' => 'search', 'type' => 'get' )); ?>
            <div class="input-group">
           
              <?php 
                echo $this->Form->input('search', array('label' => false, 'div' => false, 'id' => 'buscador', 'class' => 'form-control buscador', 'autocomplete' => 'off', 'placeholder' => 'Buscar producto...'));
              ?>
              <span class="input-group-btn">
                <?php 
                  echo $this->Form->button("<span class='glyphicon glyphicon-search'></span>", array('type' => 'submit', 'div' => false, 'class' => 'btn btn-default')); 
                ?>
              </span>
            </div>
            <?php echo $this->Form->end(); ?>
          </div>
        </div>

        </ul>

	
	<?php if ($current_user['tipo']=='user'): ?>
        <ul class="nav navbar-nav navbar-right">
        <div id="nombredeusuario" class= "col-sm-1">
               <button type="submit" class="nombreusuario"><img src="<?= $this->Html->url('/img/logousuario.png') ?>">   &nbsp <?=$current_user['username']
               ?>
               </button>
             
        </div>
        </ul>
  <?php endif; ?>
  <?php if ($current_user['tipo']=='admin'): ?>
        <ul class="nav navbar-nav navbar-right">
        <div id="nombredeusuario" class= "col-sm-1">
               <button type="submit" class="nombreusuario"><img src="<?= $this->Html->url('/img/logousuario.png') ?>">  &nbsp <?php echo $this->Html->link($current_user['username'],array('controller'=>'users','action'=>'index'));
               ?>
               </button>
         
             
        </div>
        </ul>
  <?php endif; ?>
        
        <ul class="nav navbar-nav navbar-right">
           <button type="submit" class="cierresesion"><?php echo $this->Html->link('Cerrar Sesión',array('controller'=>'users','action'=>'logout')); ?></button>
        </ul> 
           
    </div>
  </div>
</nav>
  </header>