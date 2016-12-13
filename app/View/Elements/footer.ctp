  <?php
    echo $this->Html->meta('icon');

    echo $this->Html->css(array('bootstrap.min','bootstrap-theme.min'));
    echo $this->Html->css('traepaka.css'); 
    
    echo $this->Html->script(array('jquery','bootstrap.min'));

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
  ?>

<footer>
     <div class="panel-footer">Copyright &copy; 2016 ·Joshua y Ramón· Todos los derechos reservados.</div>
</footer>