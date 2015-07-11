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
													  	 <h1>Pedidos  <small>Buscar</small></h1>
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
                                                         
									                              <?php 
																		$atributos = array( 'search' => 'form','name'=>'form' ,'class'=>'navbar-form navbar-right' ,'role'=>'search');
																		echo form_open_multipart('pedidos/search_pedidos_realizados/'.$folder_nav.'/'.$nav,$atributos);
																    ?>
				                                                            	     <label class="control-label">Busqueda por:</label>
				                                                            	     <select name="criterio" id="criterio"   class="form-control">
				                                                                          <option value="id_pedido" >Id Pedido</option>
				                                                                          <option value="fecha_pedido" selected >Fecha</option>
				                                                                          <option value="id_persona" >Id Cliente</option>
				                                                                          <option value="id_vendedor" >Id Vendedor</option>
				                                                            	     </select>

																		 		    <input type="text"  name="valor"  value="<?php echo set_value("valor")?>"  class="form-control" placeholder="Buscar pedidos">
																		 		    <input type="submit" value="Buscar" title="Buscar pedidos" class="btn btn-info">
																		 		  
															    	  <?php 
																	   echo form_close();
												                     ?>  


								<div class="panel panel-default">
												   <div class="panel-heading">
													    <a class="glyphicon glyphicon-plus-sign " aria-hidden="true" href="<?php echo base_url()?>pedidos/clientes/<?php echo  $folder_nav;?>/<?php echo  $nav;?>"> Nuevo </a>
													 </div>
												  <div class="panel-body">                                                                               
															    <table class="table table-hover">
																<tr>
																	<th>Id pedido</th>
																	<th>Fecha</th>
																	<th>Id Cliente</th>
																	<th>Estado</th>
																	<th>Id Vendedor</th>
																	<th>Acciones</th>
																</tr>
																<?php foreach ($datos as $dato) {?>
																	<tr>
																		<td><?php echo $dato->id_pedido;?></td>
																		<td><?php echo $dato->fecha_pedido;?></td>
																		<td><?php echo $dato->id_persona; ?></td>

                                                                                <!-- obtengo  el id de categoria--> 
                                                                                <!-- recorro todas las categoria y comparo id--> 
                                                                                <!-- s coinciden muestro el nombre de la categoria--> 

                                                                                 <?php
																					$esta = $dato->id_estado;
																					foreach($estados as $fila)
																					{
                                                                                      if ($fila -> id_estado == $esta )
																						 {
																				  ?>
																				          <td><?=$fila -> descripcion ?></td> 
																				  <?php 
																						 }
																								
																							}
																			      ?>
																		

																		<td><?php echo $dato->id_vendedor;?></td>
																		
                                                                                
						
																		<td><a class="glyphicon glyphicon-list-alt" aria-hidden="true"  title="Ver Detalles" href="<?php echo base_url()?>pedidos/pedidos_detalles/<?php echo $dato->id_pedido?>/<?php echo  $folder_nav;?>/<?php echo  $nav;?>"></a> </td>
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