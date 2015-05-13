<h1>Agregar Proveedores</h1>
<?php 
	$atributos = array( 'id' => 'form','name'=>'form');
	echo form_open_multipart(null,$atributos);
 ?>
  
<?php if ($this->session->flashdata('ControllerMessage') != '') { ?>
	<div class="alert alert-success">
		<p><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
	</div>
<?php } ?>
<p><?php echo validation_errors();?></p>

<div class="col-md-4">
	
</div>
<div class="col-md-4">
	<div class="form-group">
		<label>Id (*)</label>
		<input type="text" name="id" class="form-control" value="<?php echo set_value("id")?>">
	</div>
	<div class="form-group">
		<label>Nombre (*)</label>
		<input type="text" name="nombre" class="form-control" value="<?php echo set_value("nombre")?>">
	</div>
	<div class="form-group">
		<label>Apellido</label>
		<input type="text" name="apellido" class="form-control" value="<?php echo set_value("apellido")?>">
	</div>
	<div class="form-group">
		<label>Correo (*)</label>
		<input type="email" name="correo" class="form-control" value="<?php echo set_value("correo")?>">
	</div>
	<div class="form-group">
		<label>Telefono (*)</label>
		<input type="text" name="telefono" class="form-control" value="<?php echo set_value("telefono")?>">
	</div>
	<input type="submit" value="Enviar" title="Enviar" class="btn btn-primary">
	<p><small>Los Campos con (*) deben Llenarse por Obligacion</small></p>
</div>
	
 <?php 
 	echo form_close();
 ?>