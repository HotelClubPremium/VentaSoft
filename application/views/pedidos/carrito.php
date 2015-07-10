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
												      <br>
													</div>
												  <div class="panel-body">  
                                                     
                                                     <?php echo form_open(base_url().pedidos./.actualizar_carrito./. echo $folder_nav./.echo $nav)?>

												      <table cellpadding="6" cellspacing="1" style="width:100%" border="0">

															<tr>
															        <th>QTY</th>
															        <th>Item Description</th>
															        <th style="text-align:right">Item Price</th>
															        <th style="text-align:right">Sub-Total</th>
															</tr>

															<?php $i = 1; ?>

															<?php foreach ($this->cart->contents() as $items): ?>

															        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

															        <tr>
															                <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
															                <td>
															                        <?php echo $items['name']; ?>

															                        <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

															                                <p>
															                                        <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

															                                                <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

															                                        <?php endforeach; ?>
															                                </p>

															                        <?php endif; ?>

															                </td>
															                <td style="text-align:right"><?php echo number_format($items['price'],2,',','.'); ?></td>
															                <td style="text-align:right">$<?php echo number_format($items['subtotal'],2,',','.'); ?></td>
															        </tr>

															<?php $i++; ?>

															<?php endforeach; ?>

															<tr>
															        <td colspan="2"> </td>
															        <td class="right"><strong>Total</strong></td>
															        <td class="right">$<?php echo  number_format($this->cart->total(),2,',','.'); ?></td>
															</tr>

															</table>

															<p><?php echo form_submit('', 'Update your Cart'); ?></p>  
															<p><a aria-hidden="true"  title="Limpiar Carrito" href="<?php echo base_url()?>pedidos/limpiar_carrito/<?php echo  $folder_nav;?>/<?php echo $nav;?>"> <img src="<?php echo base_url();?>utilities/img/iconos/glyphicons-cart-tick.png"></img> </a></p>                                                                            
															   


								                  </div>
								</div>
							</div>	

				      </div>  <!--/cierre vcol md9--> 
                </div>
			</div>
</div>	

