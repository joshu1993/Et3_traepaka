  <?php 
                        
            echo $this->element('navbar-2');         
           
  ?>

<div class="redireccion">
  
  <!--<button type="submit" class="verdetalles"><?php echo $this->Form->Link('Añadir nuevo producto', array('action'=> 'nuevo'), array('confirm' => 'Añadir producto ')); ?></button>-->
    <?php
    echo $this->Html->link('Añadir nuevo producto', array ('controller'=>'productos','action'=>'nuevo'));
    ?>

</div>
 <section>
     <div class="user form">
    <?php foreach($productos as $producto): ?>
      <?php if(empty($user['Producto'])): ?>
      <p> No tiene productos asociados </p>
      <?php endif; ?> 
        <div id="cuadroproductos" type="submit" class="row">
          <div id="cuadroanuncio" class= "col-sm-4">
            <div id="imagenproducto">
              <img src="../app/webroot/img/"></img>
            </div>
            <div id="nombreProducto" >
              <h1><?php echo $us['Producto']['name']; ?></h1>
              <h2><?php echo $us['Producto']['place']; ?></h2>

              <h2><?php echo $us['Producto']['price']; ?>€&nbsp&nbsp</h2>
            </div>
              <h3><?php echo $us['Producto']['description']; ?></h3>
            <div id="botones" class="col-sm-6" >
              <button type="submit" class="verdetalles"><?php echo $this->Form->postLink('Detalles', array('action'=> 'ver', $producto['Producto']['id'])); ?></button>

              <button type="submit" class="editar"><?php echo $this->Html->link('Editar',array('controller'=>'productos','action'=>'editar', $producto['Producto']['id'])); ?></button>

              <button type="submit" class="eliminar"><?php echo $this->Form->postLink('Eliminar', array('action'=> 'eliminar', $producto['Producto']['id']), array('confirm' => 'Eliminar producto ')); ?></button>

            </div>
          </div>
        </div>
    <?php endforeach; ?>
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

 