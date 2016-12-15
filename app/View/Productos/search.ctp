<div class="user form">

<?php if($ajax != 1): ?>

    <h1>Buscar producto</h1>
 	<br>
    <div class="row">
        <?php echo $this->Form->create('Producto', array('type' => 'GET')); ?>
        
        <div class="col-sm-2">
            <?php echo $this->Form->input('search', array('label' => false, 'div' => false, 'class' => 'form-control', 'autocomplet' => 'off', 'value' => $search)); ?>
        </div>
        
  
        
        <div class="col-sm-2">
           <?php echo $this->Form->button('Buscar', array('div' => false, 'class' => 'btn btn-primary')); ?>
        </div>
        
        <?php echo $this->Form->end(); ?>
        
    </div>

    <br><br>
    
<?php endif; ?>

<?php if(!empty($search)): ?>

    <?php if(!empty($productos)): ?>
    
    <div class="row">
        <?php foreach($productos as $producto): ?>
            <div class="col-sm-3">
                <figure class="producto">
                    <?php echo $this->Html->image('../files/producto/foto/' . $producto['Producto']['foto_dir'] . '/' . 'thumb_' . $producto['Producto']['foto'], array('url' => array('controller' => 'productos', 'action' => 'ver', $producto['Producto']['id']))); ?>
                </figure>
                <br>
                <?php echo $this->Html->link($producto['Producto']['name'], array('action' => 'ver', $producto['Producto']['id'])); ?>
                <br>
                $ <?php echo $producto['Producto']['price'] ;?>
                <br><br>
            </div>
        <?php endforeach; ?>
    </div>
    <br><br><br>
    
    <?php else: ?>
    
    <h2> No se encontró el producto que busca </h2>
    
    <?php endif; ?>

<?php endif; ?>
</div>