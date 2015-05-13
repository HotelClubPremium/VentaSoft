<h1>Gestion de Clientes</h1>

<?php if ($this->session->flashdata('ControllerMessage') != '') { ?>
	<div class="alert alert-success">
		<p><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
	</div>
<?php } ?>

<p>
	<a href="<?php echo base_url()?>clientes/add">Agregar Nuevo Cliente</a>
</p>

<table class="table table-hover">
	<tr>
		<th>Id</th>
		<th>Nombre Completo</th>
		<th>Sexo</th>
		<th>Fecha Nacimiento</th>
		<th>Direccion</th>
		<th>Telefono</th>
		<th>Correo</th>
		<th>Acciones</th>
	</tr>
	<?php foreach ($datos as $dato) {?>
		<tr>
			<td><?php echo $dato->id_cliente;?></td>
			<td><?php echo $dato->nom_cliente;?></td>
			<td><?php echo $dato->sexo; ?></td>
			<td><?php echo $dato->fecha_nacimiento; ?></td>
			<td><?php echo $dato->direccion; ?></td>
			<td><?php echo $dato->telefono; ?></td>
			<td><?php echo $dato->correo; ?></td>
			<td><a href="<?php echo base_url()?>clientes/update/<?php echo $dato->id_cliente?>">Editar</a> || <a href="<?php echo base_url()?>clientes/delete/<?php echo $dato->id_cliente?>">Eliminar</a></td>
		</tr>
	<?php } ?>
</table> 