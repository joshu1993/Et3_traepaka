  <?php 
                        
            echo $this->element('navbar-2');         
           
  ?>

<div class="redireccion">
  
    <?php
    echo $this->Html->link('Añadir nuevo producto', array ('controller'=>'productos','action'=>'nuevo'));
    ?>

</div>


     <div>
    
      <?php if(count($productos) == 0): ?>
      <p> No tiene productos asociados </p>
      <?php endif; ?> 
    <?php foreach($productos as $us): ?>
        <div id="cuadroproductos" type="submit" class="row">
          <div id="cuadroanuncio" class= "col-sm-4">
            <div id="nombreProducto" >
              <h1><?php echo $this -> Html -> image('../files/producto/foto/'. $us['Producto']['foto_dir'].'/'. 'big_'. $us['Producto']['foto']);?></h1>
              <h1><?php echo $us['Producto']['name']; ?></h1>
              <h2><?php echo $us['Producto']['place']; ?></h2>

              <h2><?php echo $us['Producto']['price']; ?>€&nbsp&nbsp</h2>
            </div>
              <h3><?php echo $us['Producto']['description']; ?></h3>

            <div id="botones1" class="col-sm-6" >
              <button type="submit" class="verdetalles"><?php echo $this->Form->postLink('Detalles', array('action'=> 'ver', $us['Producto']['id'])); ?></button>

              <button type="submit" class="editar"><?php echo $this->Html->link('Editar',array('controller'=>'productos','action'=>'editar', $us['Producto']['id'])); ?></button>

              <button type="submit" class="eliminar"><?php echo $this->Form->postLink('Eliminar', array('action'=> 'eliminar', $us['Producto']['id']), array('confirm' => 'Eliminar producto ')); ?></button>

            </div>
            
          </div>
        </div>
    <?php endforeach; ?>
 
</div>
