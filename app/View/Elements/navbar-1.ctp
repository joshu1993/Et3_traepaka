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
          <li><a <?php echo $this->Html->link(' Mis productos', '/Productos/mostrar', array('class' => 'button')); ?></a></li>
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
        <ul class="nav navbar-nav navbar-right">
           <button type="submit" class="iniciosesion"><?php echo $this->Html->link('Iniciar Sesión',array('controller'=>'users','action'=>'login')); ?></button>
        </ul>      
    </div>
  </div>
</nav>
</header>

<section>
    <div id="cuadroscentro" type="submit" class="row">
      <div id="cuadroprimero" class= "col-sm-4" >
        <div id="palabracuadro1" >
        <h4>Compra y vende en Traepaká</h4>
        <h5>Sé el primero en enterarte de lo que venden a tu alrededor y consigue dinero vendiendo aquello que ya no utilices. ¡Reciclar te reportará dinero!</h5>
        </div>
      </div>
      <div id="cuadrosegundo" class= "col-sm-4" >
        <div id="palabracuadro" >
        <h4>Cómodo y sencillo</h4> 
        </div>
        <h5>Busca de una manera muy simple los productos que te interesan y de la misma forma anuncia los que desees vender.</h5>
      </div>
      <div id="cuadrotercero" class= "col-sm-4" >
        <div id="palabracuadro" >
        <h4> Pago seguro €€</h4>
        </div>
        <h5>Realiza los pagos de manera segura a través de nuestra plataforma y recibe también los cobros de las transacciones de forma protegida.</h5>
      </div>
    </div>
  </section>