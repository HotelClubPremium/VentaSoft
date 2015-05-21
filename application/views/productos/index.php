<div class="container_12">
			<div class="grid_12">
				<div class="row">
				      <div class="col-md-2">
				      	    <div class="panel panel-info" >
                                <div class="panel-heading">
                                    <div class="panel-title">Bienvenido !</div>
                                </div> 
                                <div style="padding-top:10px" class="panel-body" >
                                	 <div class="form-group">
										     <label> Rol :</label> 
										      <input type="text" class="form-control" disabled value='<?=$this->session->userdata('rol')?>'></input>  
										     <label> Usuario :</label> 
										     <input type="text" class="form-control" disabled value='<?=$this->session->userdata('user')?>'></input>  
										  </div>
								      <hr> </hr>
								      <?=anchor(base_url().'login/logout_ci', 'Cerrar sesión')?>
								   
                                </div>
                            </div>
		 	          </div>

				      <div class="col-md-9">
				     



								<h1>Gestion de Productos</h1>
								<?php //envio de mensajes de error de autenticacion
								if ($this->session->flashdata('ControllerMessage') != '') { ?>
									<div class="alert alert-success">
										<p><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
									</div>
								<?php } ?>


								 <?php  // recibir por parametro el nombre del diretorio  y el nav que pedendiendo del rol (rolAdmin,rolCliente,rolVendedor)
								       $nav= $nave;
								       $folder_nav= $viewNave;
								 ?>


								<div class="panel panel-default">
											     <div class="panel-heading">
												  <a class="glyphicon glyphicon-plus-sign" aria-hidden="true" href="<?php echo base_url()?>productos/add/<?php echo  $folder_nav;?>/<?php echo  $nav;?>">  Nuevo Producto</a></div>
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

				      </div>
                </div>
			</div>
</div>	








