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
													  	 <h1>Gestion Usuarios <small>Actualizar</small></h1>
													  </div>
												  </div>
									  
								
								<div class="panel panel-default">
									      <div class="panel-heading">
										              
							 			  </div>
								          <div class="panel-body">  

								          	                  	<?php 
																	$atributos = array('usuarios' => 'form','name'=>'form' ,'class'=>'form-horizontal');
																	echo form_open_multipart(null,$atributos);
															    ?>
																			<?php if ($this->session->flashdata('ControllerMessage') != '') { ?>
																				<div class="alert alert-success">
																					<p><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
																				</div>
																			<?php } ?>


																 <?php  // recibir por parametro el nombre del diretorio  y el nav que pedendiendo del rol (rolAdmin,rolCliente,rolVendedor)
																       $nav= $nave;
																       $folder_nav= $viewNave;
																 ?>
		
                                                          <div class="row">
															     	   <form class="form-horizontal">
							
																		</form>
																	       <div class="form-group">
																		       <div class="col-xs-4">
																		         <input type="hidden" name="id_persona" placeholder="id persona" class="form-control" value="<?php echo $datos->id_persona?>">
																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('id_persona'); ?></span>
                                                                               </div>
																		    </div>
                                                                            <div class="form-group">
																		        <label class="control-label col-xs-4">Nombre (*):</label>
																		        <div class="col-xs-4">
																		          <input type="text" name="nom_persona" placeholder="nombre" class="form-control" value="<?php echo $datos->nom_persona?>">
																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('nom_persona'); ?></span>
                                                                               </div>
																		    </div>

																		    <div class="form-group">
																		        <label class="control-label col-xs-4">Apellidos (*):</label>
																		        <div class="col-xs-4">
																		          <input type="text" name="ape_persona" placeholder="apellidos" class="form-control" value="<?php echo $datos->ape_persona?>">
																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('ape_persona'); ?></span>
                                                                               </div>
																		    </div>

																		     <div class="form-group">
																		        <label class="control-label col-xs-4">Sexo (*):</label>
																		        <div class="col-xs-4">
                                                                                

																				       <select name="sexo" id="sexo"   class="form-control">
																							<?php
																							

																								if ($datos->sexo == "m") 
																								{
																								?>
		                                                                                                  <option value="m" selected >Masculino</option>
		                                                                                                  <option value="f"  >Femenino</option>
                                                                                                <?php 
																								}else{
																								 ?>
																									       <option value="m"  >Masculino</option>
		                                                                                                   <option value="f" selected >Femenino</option>
																							   <?php
																							    }
																							  
																							?>		
																						</select>

																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('sexo'); ?></span>
                                                                               </div>
																		    </div>

																		    <div class="form-group">
																		        <label class="control-label col-xs-4">Fecha Nacimiento (*)</label>
																		        <div class="col-xs-4">
																		            <input type="date" name="fecha_nacimiento" class="form-control" value="<?php echo $datos->fecha_nacimiento?>">
																		        </div>
																		         <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('fecha_nacimiento'); ?></span>
                                                                               </div>
																		    </div>

																		   <div class="form-group">
																		        <label class="control-label col-xs-4">Direccion (*)</label>
																		        <div class="col-xs-4">
																		        <input type="text" name="direccion" placeholder="direccion" class="form-control" value="<?php echo $datos->direccion?>">
																		        </div>
																		         <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('direccion'); ?></span>
                                                                               </div>
																		    </div>

																		    <div class="form-group">
																		        <label class="control-label col-xs-4">Correo (*):</label>
																		        <div class="col-xs-4">
																		        <input type="email" name="correo"  placeholder="correo" class="form-control" value="<?php echo $datos->correo?>">
																		        </div>
																		         <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('correo'); ?></span>
                                                                               </div>
																		    </div>										   

																		     <div class="form-group">
																		        <label class="control-label col-xs-4" >Telefono (*):</label>
																		        <div class="col-xs-4">
																		        <input type="text" name="telefono" placeholder="telefono" class="form-control" value="<?php echo $datos->telefono?>">
																		        </div>
                                                                                <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('telefono'); ?></span>
                                                                               </div>
																		    </div> 


																		        <div class="form-group">
																		        <label class="control-label col-xs-4">Rol (*):</label>
																		        <div class="col-xs-4">
                                                                                

																				       <select name="rol" id="rol"   class="form-control">
																							<?php
																							//obtengo el id de categoria
																							//recorro todas las categoria 
																							//si  coinciden  ese es el seleccionado (selected) obtengo el nombre para mostrarlo y el id lo dejo como value 
																							// si no lo muestro  su nombre y le asigno el value
																								$rol = $datos->rol;
																							  
																							foreach($roles as $fila)
																							{

																								if ($fila->nom_rol == $rol  ) 
																								{
																								?>
                                                                                                 <option value="<?=$fila ->nom_rol?>" selected ><?=$fila ->nom_rol ?></option>
                                                                                                <?php 
																								}else{
																								 ?>
																							
																								<option value="<?=$fila ->nom_rol?>"><?=$fila ->nom_rol ?></option>
																							   <?php
																							    }
																							    }
																							?>		
																						</select>

																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('rol'); ?></span>
                                                                               </div>
																		    </div>



																		     <div class="form-group">
																		        <label class="control-label col-xs-4">Usuario (*):</label>
																		        <div class="col-xs-4">
																		          <input type="text" name="user" placeholder="usuario" class="form-control" value="<?php echo $datos->user?>">
																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('user'); ?></span>
                                                                               </div>
																		    </div>

																		        <div class="form-group">
																		        <label class="control-label col-xs-4">Acceso (*):</label>
																		        <div class="col-xs-4">
                                                                                

																				       <select name="acceso" id="acceso"   class="form-control">
																							<?php
																							

																								if ($datos->acceso == "0") 
																								{
																								?>
		                                                                                                  <option value="0" selected >Inabilitado</option>
		                                                                                                  <option value="1"  >Habilitado</option>
                                                                                                <?php 
																								}else{
																								 ?>
																									        <option value="0" >Inabilitado</option>
		                                                                                                    <option value="1"  selected >Habilitado</option>
																							   <?php
																							    }
																							  
																							?>		
																						</select>

																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('acceso'); ?></span>
                                                                               </div>
																		    </div>



																		     




																		    
																			    <div class="form-group">
																			        <div class="col-xs-offset-1 col-xs-10">
																			        	
																			        	   
																						  <div class="alert alert-info">
																							 <strong>Observaciones!</strong> Los Campos con (*) deben llenarse obligatoriamente
																			              </div>
																			        </div>
																			    </div>
																			    <div class="form-group">
																			        <div class="col-xs-offset-4 col-xs-5">
																			        	  <input type="submit" value="Guardar Cambios" title="Guardar Cambios" class="btn btn-success">
																			       </div>
																			    </div>

                                                                         <?php 
															 	         echo form_close();
													                     ?>  

                                                                
	                                                                 

                      </div>

                                                		  
								           </div>
								</div>
						
                          </div>
				    </div>  <!--/cierre vcol md9--> 
				      
                </div>
			</div>
</div>


