 <!-- 
  <div id="buscar" class="container-fluid">

    <div class="container header-ppal">
   
      <?php echo $this->Html->image('imagenlogo.png', array('alt' => 'logo', 'class' => 'img-rounded img-responsive header-img', 'align' => 'left')); ?>
        <div class="row">
          <div class="col-lg-4 pull-right"> 
            <?php echo $this->Form->create('Post', array('controller' => 'posts', 'action' => 'search', 'type' => 'get' )); ?>
            <div class="input-group">

              <?php 
                echo $this->Form->input('search', array('class' => 'form-control', 'placeholder' => __('Buscar...'), 'div' => false, 'type' => 'text', 'label' => false));
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
    </div>
  </div>
  -->

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
          <img src="/ET2_Traepaka/app/webroot/img/imagenlogo.png">
          </div>
        </div>

        <!-- Agrupa los enlaces de navegación, formularios y otros contenidos para toggle -->
      <div class="collapse navbar-collapse" id="navegador">
        <ul class="nav navbar-nav">

          <li class="active"><a <?php echo $this->Html->link('Inicio', '/Productos/index', array('class' => 'button')); ?></a></li>
          <li><a <?php echo $this->Html->link('Chats', '/Chats/vista', array('class' => 'button')); ?></a></li>
          <li><a <?php echo $this->Html->link(' Mis Productos', '/Productos/ver', array('class' => 'button')); ?></a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
           <button type="submit" class="iniciosesion"><?php echo $this->Html->link('Iniciar Sesión',array('controller'=>'users','action'=>'login')); ?></button>
        </ul>      
    </div>
  </div>
</nav>
  </header>
