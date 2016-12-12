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

          <li><a <?php echo $this->Html->link('Inicio', '/Posts/view', array('class' => 'button')); ?></a></li>
          <li><a <?php echo $this->Html->link('Chats', '/Chats/vista', array('class' => 'button')); ?></a></li>
          <li class="active"><a <?php echo $this->Html->link('Productos', '/Productos/index', array('class' => 'button')); ?></a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <div id="nombredeusuario" class= "col-sm-1">
               <button type="submit" class="nombreusuario"><img src="/ET2_Traepaka/app/webroot/img/logousuario.png"></img>    &nbsp<?php echo $this->Html->link('Control Usuarios',array('controller'=>'users','action'=>'index')); ?>
               </button>
              <!-- <button type="submit" class="nombreusuario"><img src="/ET2_Traepaka/app/webroot/img/logousuario.png"></img>&nbsp<?php echo $this->Form->postLink('Usuario', array('controller'=>'users','action'=> 'index', $user['User']['id'])); ?></button>-->
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

<div class="redireccion">
  
  <!--<button type="submit" class="verdetalles"><?php echo $this->Form->Link('Añadir nuevo producto', array('action'=> 'nuevo'), array('confirm' => 'Añadir producto ')); ?></button>-->
    <?php
    echo $this->Html->link('Añadir nuevo producto', array ('controller'=>'productos','action'=>'nuevo'));
    ?>

</div>
 <section>
     <div class="user form">
	  <?php foreach($productos as $producto): ?>
        <div id="cuadroproductos" type="submit" class="row">
          <div id="cuadroanuncio" class= "col-sm-4">
            <div id="imagenproducto">
              <img src="/ET2_Traepaka/app/webroot/img/"></img>
            </div>
            <div id="nombreProducto" >

              <h1><?php echo $producto['Producto']['name']; ?></h1>
              <h2><?php echo $producto['Producto']['place']; ?></h2>

		          <h2><?php echo $producto['Producto']['price']; ?>€&nbsp&nbsp</h2>
            </div>
              <h3><?php echo $producto['Producto']['description']; ?></h3>
            <div id="botones" class="col-sm-6" >
              <button type="submit" class="verdetalles"><?php echo $this->Form->postLink('Detalles', array('action'=> 'ver', $producto['Producto']['id'])); ?></button>

              <button type="submit" class="editar"><?php echo $this->Html->link('Editar',array('controller'=>'productos','action'=>'editar', $producto['Producto']['id'])); ?></button>

              <button type="submit" class="eliminar"><?php echo $this->Form->postLink('Eliminar', array('action'=> 'eliminar', $producto['Producto']['id']), array('confirm' => 'Eliminar producto ')); ?></button>

            </div>
          </div>
		    </div>
		<?php endforeach; ?>
     
    </div>
  </section>
</div>

 <section>

  <div class="redireccion">
  
   <?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
   <?php echo $this->Paginator->numbers(array(   'class' => 'numbers'     ));?>
   <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
 
  </div>
  <!--
    <div id="paginasbuscar" class="row">
      <nav aria-label="..."><ul class="pagination">...</ul></nav>
        <ul class="pagination">
          <li class="disabled">
            <span>
              <span aria-hidden="true">&laquo;</span>
            </span>
          </li>
          <li class="active"><span>1 <span class="sr-only">(current)</span></span></li>
          <li> <span>2 <span class="sr-only">(current)</span></span></li>
          <li> <span>3 <span class="sr-only">(current)</span></span></li>
          <li> <span>4 <span class="sr-only">(current)</span></span></li>
          <li> <span>5 <span class="sr-only">(current)</span></span></li>
          <li> <span>6 <span class="sr-only">(current)</span></span></li>
          <li> <span>7 <span class="sr-only">(current)</span></span></li>
          <li> <span>8 <span class="sr-only">(current)</span></span></li>
          <li> <span>9 <span class="sr-only">(current)</span></span></li>
          </ul>
      </nav>
    </div>
    -->
  </section>
  
  
    <footer>
     <div class="panel-footer">Copyright &copy; 2016 ·Joshua y Ramón· Todos los derechos reservados.</div>
  </footer>
  
<script src="js/jquery.js" ></script>
<script src="js/bootstrap.js" ></script>
</body>
</html>

 