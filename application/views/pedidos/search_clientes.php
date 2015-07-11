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
													  	 <h1>Gestion Clientes <small>Buscar</small></h1>
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
																		echo form_open_multipart('pedidos/search_clientes/'.$folder_nav.'/'.$nav,$atributos);
																    ?>
				                                                            	     <label class="control-label">Busqueda por:</label>
				                                                            	     <select name="criterio" id="criterio"   class="form-control">
				                                                                          <option value="id_usuario">Id</option>
				                                                                          <option value="user" >Usuario</option>
				                                                                          <option value="acceso" >Acceso</option>
				                                                            	     </select>

																		 		    <input type="text"  name="valor"  value="<?php echo set_value("valor")?>"  class="form-control" placeholder="Buscar cliente">
																		 		    <input type="submit" value="Buscar" title="Buscar cliente" class="btn btn-info">
																		 		  
															    	  <?php 
																	   echo form_close();
												                     ?>  


								<div class="panel panel-default">
												   <div class="panel-heading">
													    <a class="glyphicon glyphicon-plus-sign " aria-hidden="true" href="<?php echo base_url()?>usuarios/add/<?php echo  $folder_nav;?>/<?php echo  $nav;?>"> Nuevo </a>
													 </div>
												  <div class="panel-body">                                                                               
															    <table class="table table-hover">
																<tr>
																	<th>Id</th>
																	<th>Rol</th>
																	<th>Usuario</th>
																	<th>Acceso</th>
																	<th>Id Persona</th>
																	<th>Nombre </th>
																	<th>Acciones</th>
																</tr>
																<?php foreach ($datos as $dato) {?>
																	<tr>
																		<td><?php echo $dato->id_usuario;?></td>
																	            <!-- obtengo  el id de categoria--> 
                                                                                <!-- recorro todas las categoria y comparo id--> 
                                                                                <!-- s coinciden muestro el nombre de la categoria--> 

                                                                                 <?php
																					$rol = $dato->rol;
																					foreach($roles as $fila)
																					{
                                                                                      if ($fila -> nom_rol == $rol)
																						 {
																				  ?>
																				          <td><?=$fila -> nom_rol ?></td> 
																				  <?php 
																						 }
																								
																							}
																			      ?>
																	    <td><?php echo $dato->user; ?></td>
																		<td><?php echo $dato->acceso; ?></td>
																		<td><?php echo $dato->id_persona; ?></td>
																		<td><?php echo $dato->nom_persona; ?></td>
                                                                            
																		<td><a aria-hidden="true"  title="Gestionar Pedido" href="<?php echo base_url()?>pedidos/productos/<?php echo $dato->id_usuario?>/<?php echo  $folder_nav;?>/<?php echo $nav;?>"> <img src="<?php echo base_url();?>utilities/img/iconos/glyphicons-cart.png"></img> </a> <span class="glyphicon glyphicon-option-horizontal"></span> <a class="glyphicon glyphicon-pencil" aria-hidden="true"  title="Editar Usuario" href="<?php echo base_url()?>usuarios/update/<?php echo $dato->id_usuario?>/<?php echo  $folder_nav;?>/<?php echo $nav;?>"></a></td>
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