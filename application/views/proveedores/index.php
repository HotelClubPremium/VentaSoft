<h1>Gestion de Proveedores</h1>

<?php if ($this->session->flashdata('ControllerMessage') != '') { ?>
	<div class="alert alert-success">
		<p><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
	</div>
<?php } ?>

<p>
	<a href="<?php echo base_url()?>proveedores/add">Agregar Nuevo Proveedor</a>
</p>

<table class="table table-hover">
	<tr>
		<th>Id</th>
		<th>Nombre</th>
		<th>Apellidos</th>
		<th>Telefono</th>
		<th>Correo</th>
		<th>Acciones</th>
	</tr>
	<?php foreach ($datos as $dato) {?>
		<tr>
			<td><?php echo $dato->id_proveedor;?></td>
			<td><?php echo $dato->nom_proveedor;?></td>
			<td><?php echo $dato->ape_proveedor;?></td>
			<td><?php echo $dato->telefono;?></td>
			<td><?php echo $dato->correo;?></td>
			<td><a href="<?php echo base_url()?>proveedores/update">Editar</a> || <a href="<?php echo base_url()?>proveedores/delete">Eliminar</a></td>
		</tr>
	<?php } ?>
</table>