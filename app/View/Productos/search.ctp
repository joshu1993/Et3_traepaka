
  <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 bg-white list-queries">
    <?php foreach($search as $producto) { ?>
    <div class="row small-query">
      <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
          <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
            <h2>
              <?=  $this->Html->link($producto['Producto']['name'], array('controller' => 'productos', 'action' => 'view', $producto['Producto']['id'])) ?>
            </h2>
            <p class="lead sizeP14"><?= $producto['Producto']['description']; ?></p>
          </div>
          <div class="hidden-xs col-sm-2 col-md-2 col-lg-2"></div>
          <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2">
            <?php echo $this->Html->image('imagenlogo.jpg', array('alt' => 'avatar', 'class' => 'img-responsive center-block')); ?>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
          <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <?php if($producto['Producto']['user_id'] == $current_user['id']) { ?>
              <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                  <span class="glyphicon glyphicon-cog"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li>
                    <?php 
                      echo $this->Form->postLink(__('Eliminar'), array('controller' => 'productos', 'action' => 'delete', $producto['Producto']['id']), array('class' => 'btn btn-danger', 'escape' => false), ('¿Está seguro de querer eliminar el producto?'));
                    ?>
                  </li>
                  <li>                  
                    <a class="btn btn-warning" data-toggle="modal" data-target="<?php echo "#editProducto".$producto['Producto']['id']; ?>"> <?php __('Editar')?> </a>
                  </li>
                </ul>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>

        <hr class="h-divider">


        <!-- MODAL EDIT PREGUNTA -->
        <div class="modal fade" id="<?php echo "editProducto".$producto['Producto']['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title txt-center" id="myModalLabel"><?php __('Producto')?></h3>
              </div>
              <div class="modal-body">
                <?php 
                  echo $this->Form->create('Producto', array('action' => '/productos/edit/'.$producto['Post']['id'])); 
                ?>
                <div class="form-group">                  
                  <?php echo $this->Form->input('name', array('class' => 'form-control' , 'label' => 'Nombre:')); ?>
                </div>
                <div class="form-group">
                  <label>Descripción:</label>
                  <?php echo $this->Form->textarea('description', array('class' => 'form-control', 'rows' => '3')); ?>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php __('Cerrar')?></button>
                <?php 
                  echo $this->Form->submit(__('Guardar cambios'), array('div' => false, 'class' => 'btn btn-warning')); 
                  echo $this->Form->end(); 
                ?>
              </div>
            </div>
          </div>
        </div>
    <?php } ?>


        
    <nav class="txt-center">
      <ul class="pagination">
        <?php 
          if($this->Paginator->hasPrev()) { 
            echo $this->Paginator->prev('<<', array('tag' => 'li'));
          } else {
            echo "<li class='disabled'>";
            echo $this->Paginator->prev('<<', array('tag' => 'a')); 
            echo "</li>";       
          }
        ?>
        <?php echo $this->Paginator->numbers(array('tag' => 'li', 'separator' => '', 'currentTag' => 'a', 'currentClass' => 'disabled')); ?>
        <?php 
          if($this->Paginator->hasNext()) { 
            echo $this->Paginator->next('>>', array('tag' => 'li'));
          } else {
            echo "<li class='disabled'>";
            echo $this->Paginator->next('>>', array('tag' => 'a')); 
            echo "</li>";       
          }
        ?>
      </ul>
    </nav>
  </div>