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

				      <div class="col-md-9">  <!--/ abre contenido --> 


				      	<div class="row">
												  <div class="panel panel-default">
													  <div class="panel-heading">
													  	 <h1>Carrito <small>Productos en carrito</small></h1>
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
												     <a  href="<?php echo base_url()?>pedidos/productos/<?php echo  $folder_nav;?>/<?php echo  $nav;?>" class="btn btn-warning btn-sm" role="button"> Volver a Productos </a>
													</div>
												<div class="panel-body">  
                                                     
                                                     <?php echo form_open('pedidos/actualizar_carrito/'.$folder_nav.'/'.$nav)?>

															      <table class="table table-hover">
																<tr>
																	<th class="left">Cantidad</th>
																	<th>Producto</th>
																	<th>Valor Unitario</th>
																	<th>Sub-total</th>
																	<th>Acciones</th>
																</tr>

																		<?php 
																		$i = 1;
																	    ?>

																		<?php foreach ($this->cart->contents() as $items): ?>

																		        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                                                                                
																		        <tr>    
																					    <td>
																			                	<div class="col-xs-4">
																			                	<?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '4', 'size' => '2', 'placeholder'=>'cant', 'class'=>'form-control','type'=>'number')); ?>
																			                	</div>
																		                </td>
																		                <td>
																		                        <?php echo $items['name']; ?>
																		                </td>
																		                <td>
																		                	    <?php echo number_format($items['price'],2,',','.'); ?>
																		                </td>
																		                <td>$   
																		                	    <?php echo number_format($items['subtotal'],2,',','.'); ?>
																		                </td>
																		                 <td>  
																		                 	
																		                	 <a aria-hidden="true"  title="Quitar Producto del Carrito" onclick="if(confirmarEliminar() == false) return false" title="Quitar del carrito" href="<?php echo base_url()?>pedidos/quitar_producto_carrito/<?php echo $items['rowid'];?>/<?php echo  $folder_nav;?>/<?php echo  $nav;?>"> <img src="<?php echo base_url();?>utilities/img/iconos/glyphicons-cart-in.png"></img></a>   
																		                     
																		                </td>
																		        </tr>

																		<?php $i++; ?>

																		<?php endforeach; ?>

																		<tr>
																		        <td class="active"> </td>
																		        <td class="active"> </td>
																		        <td class="danger right"><strong>Total</strong> </td>
																		        <td class="danger right">$<?php echo  number_format($this->cart->total(),2,',','.'); ?> </td>
                                                                                <td class="active"> </td>
																		        <td class="active"> </td>
																		</tr>

																		</table>

															<p><?php echo form_submit('', 'Actualizar Carrito'); ?></p>  
															<a aria-hidden="true"  title="Limpiar Carrito" href="<?php echo base_url()?>pedidos/limpiar_carrito/<?php echo $folder_nav;?>/<?php echo $nav;?>"> <img src="<?php echo base_url();?>utilities/img/iconos/glyphicons-cart-tick.png"></img></a>                                                                            
															   


								                 </div>
								</div>
							</div>	

				      </div>  <!--/cierre vcol md9--> 
                </div>
			</div>
</div>	

