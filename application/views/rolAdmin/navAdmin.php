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
           
            <?php $nav='navAdmin';
                  $folder_nav='rolAdmin';
            ?>

            <ul class="nav navbar-nav ">
				<li class="active"><a href="<?php echo base_url()?>admin">Inicio</a></li>
				<li><a href="<?php echo base_url()?>clientes/index/">Clientes</a></li>
                <li><a href="<?php echo base_url()?>productos">Productos</a></li>
				<li><a href="<?php echo base_url()?>proveedores/index/<?php echo  $folder_nav;?>/<?php echo  $nav;?>">Proveedores</a></li>
				<li><a href="#">ADMIN</a></li>
                <li><a href="<?php echo base_url()?>empleados">Empleados</a></li>  
				<li><a href="<?php echo base_url()?>usuarios">Usuarios</a></li>      
                <li class      ="dropdown">
                <a data-toggle ="dropdown" class="dropdown-toggle" href="#">Acerca de <b class="caret"></b></a>
                <ul role       ="menu" class="dropdown-menu">
                <li><a href    ="#">Quienes somos</a></li>
                <li><a href    ="#">Ubicación</a></li>
                <li><a href    ="#">Historia</a></li>
                </ul>
                </li>
            </ul>
        </div>
</nav>
<section class="contenedor">
