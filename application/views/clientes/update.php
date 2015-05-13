<h1>Modificar Clientes</h1>
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
		<label>Id</label>
		<input type="text" name="id" class="form-control" value="<?php echo $datos->id_cliente?>">
	</div>
	<div class="form-group">
		<label>Nombre</label>
		<input type="text" name="nombre" class="form-control" value="<?php echo $datos->nom_cliente?>">
	</div>
	<div class="form-group">
		<label>Correo</label>
		<input type="email" name="correo" class="form-control" value="<?php echo $datos->correo?>">
	</div>
	<div class="form-group">
		<label>Direccion</label>
		<input type="text" name="direccion" class="form-control" value="<?php echo $datos->direccion?>">
	</div>
	<div class="form-group">
		<label>Telefono</label>
		<input type="text" name="telefono" class="form-control" value="<?php echo $datos->telefono?>">
	</div>
	<div class="form-group">
		<label>Fecha Nacimiento</label>
		<input type="date" name="fecha" class="form-control" value="<?php echo $datos->fecha_nacimiento?>">
	</div>
	<div class="form-group">
		<label>Sexo</label> 
		<select name="sexo" id="sexo" class="form-control">
			<option value="0">Seleccionar</option>
			<option value="m">Masculino</option>
			<option value="f">Femenino</option>	
		</select>
	</div>
	<input type="submit" value="Enviar" title="Enviar" class="btn btn-primary">

</div>
	
 <?php 
 	echo form_close();
 ?>