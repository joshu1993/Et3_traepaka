   <?php 
      if (isset($current_user)) {                
          echo $this->element('navbar-2'); 
        } else {                
          echo $this->element('navbar-1'); 
        } 
    ?>

<div class="amaño">
</div>

 
<div>


	  <?php foreach($productos as $producto): ?>
        <div id="cuadroproductos" type="submit" class="row">
          <div id="cuadroanuncio" class= "col-sm-4">
            <div id="nombreProducto" >

              <h1><?php echo $this -> Html -> image('../files/producto/foto/'. $producto['Producto']['foto_dir'].'/'. 'big_'.$producto['Producto']['foto']);?></h1>

              <h1><?php echo $producto['Producto']['name']; ?></h1>
              <h2><?php echo $producto['Producto']['place']; ?></h2>

		          <h2><?php echo $producto['Producto']['price']; ?>€&nbsp&nbsp</h2>
            </div>
              <h3><?php echo $producto['Producto']['description']; ?></h3>
            <div id="botones" class="col-sm-6" >
              <button type="submit" class="verdetalles"><?php echo $this->Form->postLink('Detalles', array('action'=> 'ver', $producto['Producto']['id'])); ?></button>
              <button type="submit" class="loquiero"><?php echo $this->Form->postLink('Lo quiero!', array('action'=> 'chat', $producto['Producto']['id'])); ?></button>
            </div>
          </div>
		    </div>
		<?php endforeach; ?>
     
    </div>
  
</div>




 