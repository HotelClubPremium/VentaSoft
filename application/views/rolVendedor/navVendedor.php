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
                     <?php 
                              $nav='navVendedor';
                              $folder_nav='rolVendedor';
                    ?>

                    <div id="navbarCollapse" class="collapse navbar-collapse nav-justified">
                        <ul class="nav navbar-nav ">
            				<li class="active"><a href="<?php echo base_url()?>vendedor">Inicio</a></li>
            			    <li><a href="<?php echo base_url()?>productos/index/<?php echo  $folder_nav;?>/<?php echo  $nav;?>">Productos</a></li>
                            <li><a href="<?php echo base_url()?>clientes/index/<?php echo  $folder_nav;?>/<?php echo  $nav;?>">Clientes</a></li>
            				<li><a href="##">VENDEDOR</a></li>      
                            <li class      ="dropdown">
                            <a data-toggle ="dropdown" class="dropdown-toggle" href="#"> Recorridos <b class="caret"></b></a>
                            <ul role       ="menu" class="dropdown-menu">
                            <li><a href    ="#">Ruta del dia</a></li>
                            <li><a href    ="#">Ubicacion Actual</a></li>
                            </ul>
                            </li>
                        </ul>
                    </div>
    </nav>

</section>
<section class="contenedor"> <!--etiqueta contenedor principal que se cierra en el footer del masterPage --> 