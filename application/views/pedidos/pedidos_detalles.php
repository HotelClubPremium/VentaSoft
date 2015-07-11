<div class="container_12">
			<div class="grid_12">
				<div class="row">
				      <div class="col-md-2">
				      	    <div class="panel panel-info" >
                                <div class="panel-heading">
                                    <div class="panel-title">Bienvenido ¡</div>
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
		 	          </div> <!--/cierre vcol md2-->

				 <div class="col-md-9">

				     
		                <div class="row">

				      	             
												 <div class="panel panel-default">
													  <div class="panel-heading">
													  	 <h1>Pedidos <small>Detalles</small></h1>
													  </div>
												  </div>
									          
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
													 <br>
													 </div>
												  <div class="panel-body">                                                                               
															    <table class="table table-hover">
																<tr>
																	<th>Id pedido</th>
																	<th>Id Producto</th>
																	<th>Nombre Porducto</th>
																	<th>Cantidad</th>
																	<th>Valor Unit</th>
																	<th>Subtotal</th>
																</tr>
																<?php foreach ($datos as $dato) {?>
																	<tr>
																		<td><?php echo $dato->id_pedido;?></td>
																		<td><?php echo $dato->id_producto;?></td>
																		<td><?php echo $dato->nom_producto; ?></td>
																		<td><?php echo $dato->cantidad;?></td>
																		<td><?php echo $dato->valor_unitario;?></td>
																		<?php 
																		 $cant=  $dato->cantidad;
																		 $vlr =  $dato->valor_unitario;
																		 $subtotal=  $cant * $vlr;

																		?>
																		<td><?php echo $subtotal;?></td>
																		
																	</tr>
																<?php } 
																?>
															</table> 
								                </div>
								</div>
							</div>	

        


										

				      </div>  <!--/cierre vcol md9--> 
                </div>
			</div>
</div>	








