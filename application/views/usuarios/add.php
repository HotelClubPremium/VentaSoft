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
													  	 <h1>Gestion Usuarios <small>Agregar</small></h1>
													  </div>
												  </div>
									  
											  

								<div class="panel panel-default">
									      <div class="panel-heading">
										              
							 			  </div>
								          <div class="panel-body">  

								          	                  	<?php 
																	$atributos = array('usuarios'=> 'form','name'=>'form' ,'class'=>'form-horizontal');
																	echo form_open_multipart(null,$atributos);
															    ?>
																			<?php if ($this->session->flashdata('ControllerMessage') != '') { ?>
																				<div class="alert alert-success">
																					<p><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
																				</div>
																			<?php } ?>

																 <?php  // recibir por parametro el nombre del diretorio  y el nav que pedendiendo del rol (rolAdmin,rolCliente,rolVendedor)
																       $nav = $nave;
																       $folder_nav = $viewNave;
																 ?>
		
                                                          <div class="row">
															     	    <form class="form-horizontal">
																		</form>
																		
															  <fieldset>
																	   <legend> Informacion Basica (persona)</legend>

																	        <div class="form-group">
																		        <label class="control-label col-xs-4">Id Persona (*):</label>
																		        <div class="col-xs-4">
																		           <input type="text" name="id_persona" placeholder="id persona" class="form-control" value="<?php echo set_value("id_persona")?>">
																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('id_persona'); ?></span>
                                                                                </div>
																		    </div>
																		    <div class="form-group">
																		        <label class="control-label col-xs-4">Nombre (*):</label>
																		        <div class="col-xs-4">
																		           <input type="text" name="nom_persona" placeholder="nombre" class="form-control" value="<?php echo set_value("nom_persona")?>">
																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('nom_persona'); ?></span>
                                                                                </div>
																		    </div>
																		    <div class="form-group">
																		        <label class="control-label col-xs-4">Apellidos (*):</label>
																		        <div class="col-xs-4">
																		           <input type="text" name="ape_persona" placeholder="apellidos" class="form-control" value="<?php echo set_value("ape_persona")?>">
																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('ape_persona'); ?></span>
                                                                                </div>
																		    </div>

																		    <div class="form-group">
																		        <label class="control-label col-xs-4">Sexo (*):</label>
																		        <div class="col-xs-4">
                                                                                      <select name="sexo" id="sexo" class="form-control">
                                                                                      	    <option value="m">m</option>
																							<option value="f">f</option>
																					  </select>

																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('sexo'); ?></span>
                                                                               </div>
																		    </div>
																		    <div class="form-group">
																		        <label class="control-label col-xs-4">Fecha Nacimiento (*):</label>
																		        <div class="col-xs-4">
																		           <input type="date" name="fecha_nacimiento"  class="form-control" value="<?php echo set_value("fecha_nacimiento")?>">
																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('fecha_nacimiento'); ?></span>
                                                                                </div>
																		    </div>

																		    <div class="form-group">
																		        <label class="control-label col-xs-4">Direccion (*):</label>
																		        <div class="col-xs-4">
																		           <input type="text" name="direccion" placeholder="direccion" class="form-control" value="<?php echo set_value("direccion")?>">
																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('direccion'); ?></span>
                                                                                </div>
																		    </div>

																		     <div class="form-group">
																		        <label class="control-label col-xs-4">Correo (*):</label>
																		        <div class="col-xs-4">
																		        <input type="text" name="correo" placeholder="correo" class="form-control"  >
																		        </div>
                                                                                <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('correo'); ?></span>
                                                                               </div>
																		    </div>

																		    <div class="form-group">
																		        <label class="control-label col-xs-4">Telefono (*):</label>
																		        <div class="col-xs-4">
																		        <input type="text" name="telefono" placeholder="telefono"  class="form-control"  >
																		        </div>
                                                                                <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('telefono'); ?></span>
                                                                               </div>
																		    </div>
																		    

                                      						</fieldset>
															<fieldset>
																	    <legend> Informacion Usuario (usuario)</legend>

																	        <div class="form-group">
																		        <label class="control-label col-xs-4">Id Usuario (*):</label>
																		        <div class="col-xs-4">
																		           <input type="text" name="id_usuario" placeholder="id usuario" class="form-control" value="<?php echo set_value("id_usuario")?>">
																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('id_usuario'); ?></span>
                                                                                </div>
																		    </div>

                                                                           <div class="form-group">
																		        <label class="control-label col-xs-4">Rol (*):</label>
																		        <div class="col-xs-4">
                                                                                

																				       <select name="rol" id="rol"  class="form-control">
																						 <?php
																							//obtengo todos los roles
																							
																								foreach($roles as $fila)
																								{
																						  ?>
																							<option value="<?=$fila -> nom_rol ?>"><?=$fila -> nom_rol ?></option>
																						  <?php
																							    }
																					      ?>		
																						</select>

																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('nom_rol'); ?></span>
                                                                               </div>
																		    </div>

																		     <div class="form-group">
																		        <label class="control-label col-xs-4">Usuario (*):</label>
																		        <div class="col-xs-4">
																		          <input type="text" name="user" placeholder="usuario" class="form-control" value="<?php echo set_value("user")?>">
																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('user'); ?></span>
                                                                               </div>
																		    </div>

																		    <div class="form-group">
																		        <label class="control-label col-xs-4">Acceso (*):</label>
																		        <div class="col-xs-4">
                                                                                      <select name="acceso" id="acceso" class="form-control">
                                                                                      	    <option value="0">Inabilitado</option>
																							<option value="1">Habilitado</option>
																					  </select>

																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('acceso'); ?></span>
                                                                               </div>
																		    </div>


                                      						</fieldset>
                                                                            

																			    <div class="form-group">
																			        <div class="col-xs-offset-1 col-xs-10">
																			        	
																			        	   
																						  <div class="alert alert-info">
																							 <strong>Observaciones!</strong> Los Campos con (*) deben llenarse obligatoriamente
																			              </div>
																			        </div>
																			    </div>
																			    <div class="form-group">
																			        <div class="col-xs-offset-4 col-xs-5">
																			        	  <input type="submit" value="Guardar" title="Guardar nuevo usuario" class="btn btn-success">
																			       </div>
																			    </div>

                                                                         <?php 
															 	         echo form_close();
													                     ?>  
                            </div>

                                                		  
								           </div>
								</div>
						
                          </div>

				      </div> <!--/ cierre contenido --> 
                </div>
			</div>
</div>	



