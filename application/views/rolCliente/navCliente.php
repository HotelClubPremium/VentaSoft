<section class="contenedor">
        <nav role="navigation" class="navbar navbar-default nav-justified">
                <div class="navbar-header">
                    <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                   
                </div>
                <div id="navbarCollapse" class="collapse navbar-collapse nav-justified">
                       <?php 
                             $nav='navCliente';
                             $folder_nav='rolCliente';
                             $id= $this->session->userdata('id_persona');
                       ?>
           
                    <ul class="nav navbar-nav ">
        				<li class="active"><a href="<?php echo base_url()?>cliente">Inicio</a></li>
        				<li><a href="###">Seguimiento</a></li>
                         <li><a href="<?php echo base_url()?>productos/index_clientes/<?php echo  $folder_nav;?>/<?php echo  $nav;?>">Productos</a></li>
                      <li class      ="dropdown">
                        <a data-toggle ="dropdown" class="dropdown-toggle" href="#">Pedidos<b class="caret"></b></a>
                        <ul role       ="menu" class="dropdown-menu">
                            <li><a href="<?php echo base_url()?>pedidos/productos/<?php echo  $id;?>/<?php echo  $folder_nav;?>/<?php echo  $nav;?>">Nuevo</a></li>
                            <li><a href="<?php echo base_url()?>pedidos/pedidos_realizados/<?php echo  $folder_nav;?>/<?php echo  $nav;?>">Realizados</a></li>
                        </ul>
                     </li>
        				<li><a href="#">Servicio al Cliente</a></li>  
                    </ul>
                </div>
        </nav>
</section>
<section class="contenedor"> <!--etiqueta contenedor principal que se cierra en el footer del masterPage --> 