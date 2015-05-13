<h1>Gestion de Empleados</h1>

<?php if ($this->session->flashdata('ControllerMessage') != '') { ?>
	<div class="alert alert-success">
		<p><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
	</div>
<?php } ?>

<p>
	<a href="<?php echo base_url()?>empleados/add">Agregar Nuevo Empleado</a>
</p>

<table class="table table-hover">
	<tr>
		<th>Id</th>
		<th>Nombres</th>
		<th>Apellidos</th>
		<th>Sexo</th>
		<th>Fecha Nacimiento</th>
		<th>Direccion</th>
		<th>Correo</th>
		<th>Telefono</th>
		
	</tr>
	<?php foreach ($datos as $dato) {?>
		<tr>
			<td><?php echo $dato->id_empleado;?></td>
			<td><?php echo $dato->nom_empleado;?></td>
			<td><?php echo $dato->ape_empleado;?></td>
			<td><?php echo $dato->sexo; ?></td>
			<td><?php echo $dato->fecha_nacimiento; ?></td>
			<td><?php echo $dato->direccion; ?></td>
			<td><?php echo $dato->correo; ?></td>
			<td><?php echo $dato->telefono; ?></td>
			
			<td><a href="<?php echo base_url()?>empleados/update/<?php echo $dato->id_empleado?>">Editar</a> || <a href="<?php echo base_url()?>empleados/delete/<?php echo $dato->id_empleado?>">Eliminar</a></td>
		</tr>
	<?php } ?>
</table> 