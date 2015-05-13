<h1>Gestion de Productos</h1>

<?php if ($this->session->flashdata('ControllerMessage') != '') { ?>
	<div class="alert alert-success">
		<p><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
	</div>
<?php } ?>


<div class="panel panel-default">
  <div class="panel-heading">
  <a class="glyphicon glyphicon-plus-sign" aria-hidden="true" href="<?php echo base_url()?>productos/add">  Nuevo Producto</a></div>
  <div class="panel-body">
    <table class="table table-hover">
	<tr>
		<th>Id</th>
		<th>Nombre </th>
		<th>Cantidad</th>
		<th>Valor unitario</th>
		<th>Descripcion</th>
		<th>ID Categoria</th>
		<th>ID Proveedor</th>
		<th>Acciones</th>
	</tr>
	<?php foreach ($datos as $dato) {?>
		<tr>
			<td><?php echo $dato->id_producto;?></td>
			<td><?php echo $dato->nom_producto;?></td>
			<td><?php echo $dato->cantidad; ?></td>
			<td><?php echo $dato->valor_producto; ?></td>
			<td><?php echo $dato->descripcion; ?></td>
			<td><?php echo $dato->id_categoria; ?></td>
			<td><?php echo $dato->id_proveedor; ?></td>
			<td><a class="glyphicon glyphicon-pencil" aria-hidden="true" href="<?php echo base_url()?>productos/update/<?php echo $dato->id_producto?>"></a>  <span class="glyphicon glyphicon-option-horizontal"></span>     <a class="glyphicon glyphicon-trash" aria-hidden="true" href="<?php echo base_url()?>productos/delete/<?php echo $dato->id_producto?>"></a></td>
		</tr>
	<?php } ?>
</table> 
  </div>
</div>
