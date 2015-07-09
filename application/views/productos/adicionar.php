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
													  	 <h1>Gestion Productos <small>Adicionar Unidades</small></h1>
													  </div>
												  </div>
									  
								
								<div class="panel panel-default">
									      <div class="panel-heading">
										              
							 			  </div>
								          <div class="panel-body">  

								          	                  	<?php 
																	$atributos = array('productos' => 'form','name'=>'form' ,'class'=>'form-horizontal');
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
																		        <label class="control-label col-xs-4">Id Producto (*):</label>
																		        <div class="col-xs-4">
																		         <input type="text" name="id_producto" placeholder="id producto" class="form-control" value="<?php echo $datos->id_producto?>">
																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('id_producto'); ?></span>
                                                                               </div>
																		    </div>
                                                                            <div class="form-group">
																		        <label class="control-label col-xs-4">Nombre (*):</label>
																		        <div class="col-xs-4">
																		          <input type="text" name="nom_producto" placeholder="nombre" class="form-control" value="<?php echo $datos->nom_producto?>">
																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('nom_producto'); ?></span>
                                                                               </div>
																		    </div>

																		     <div class="form-group">
																		        <label class="control-label col-xs-4">Descripcion :</label>
																		        <div class="col-xs-4">
																		            <textarea rows="3"  name="descripcion"  placeholder="descripcion" class="form-control" ><?php echo $datos->descripcion?></textarea>
																		        </div>
																		         <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('descripcion'); ?></span>
                                                                               </div>
																		    </div>

																		    <div class="form-group">
																		        <label class="control-label col-xs-4" >Cantidad Actual (*):</label>
																		        <div class="col-xs-4">
																		          <input type="number" name="cantidad" placeholder="cantidad" class="form-control" value="<?php echo $datos->cantidad?>">
																		        </div>
																		         <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('cantidad'); ?></span>
                                                                               </div>
																		    </div>

																		     <div class="form-group">
																		        <label class="control-label col-xs-4" >Cantidad Adicionada (*):</label>
																		        <div class="col-xs-4">
																		          <input type="number" name="cantidad_adicionada" placeholder="cantidad adicionada" class="form-control" value="<?php echo set_value("cantidad_adicionada")?>">
																		        </div>
																		         <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('cantidad_adicionada'); ?></span>
                                                                               </div>
																		    </div>

																		     <div class="form-group">
																		        <label class="control-label col-xs-4" >Vlr Unitario (*):</label>
																		        <div class="col-xs-4">
																		        <input type="text" name="valor_producto" class="form-control" value="<?php echo $datos->valor_producto?>">
																		        </div>
                                                                                <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('valor_producto'); ?></span>
                                                                               </div>
																		    </div>

																		     <div class="form-group">
																		        <label class="control-label col-xs-4">Estado (*):</label>
																		        <div class="col-xs-4">
                                                                                

																				       <select name="estado" id="estado"   class="form-control">
																							<?php
																							

																								if ($datos->estado == "Activo") 
																								{
																								?>
                                                                                                  <option value="Activo" selected >Activo</option>
                                                                                                  <option value="Inactivo"  >Inactivo</option>
                                                                                                <?php 
																								}else{
																								 ?>
																							      <option value="Activo" >Activo</option>
                                                                                                  <option value="Inactivo" selected  >Inactivo</option>
																							   <?php
																							    }
																							  
																							?>		
																						</select>

																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('id_categoria'); ?></span>
                                                                               </div>
																		    </div>







																		      <div class="form-group">
																		        <label class="control-label col-xs-4">Categoria (*):</label>
																		        <div class="col-xs-4">
                                                                                

																				       <select name="id_categoria" id="id_categoria"   class="form-control">
																							<?php
																							//obtengo el id de categoria
																							//recorro todas las categoria 
																							//si  coinciden  ese es el seleccionado (selected) obtengo el nombre para mostrarlo y el id lo dejo como value 
																							// si no lo muestro  su nombre y le asigno el value
																								$cate = $datos->id_categoria;
																							  
																							foreach($categorias as $fila)
																							{

																								if ($fila -> id_categoria == $cate  ) 
																								{
																								?>
                                                                                                 <option value="<?=$fila -> id_categoria ?>" selected ><?=$fila -> nom_categoria ?></option>
                                                                                                <?php 
																								}else{
																								 ?>
																							
																								<option value="<?=$fila -> id_categoria ?>"><?=$fila -> nom_categoria ?></option>
																							   <?php
																							    }
																							    }
																							?>		
																						</select>

																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('id_categoria'); ?></span>
                                                                               </div>
																		    </div>

																		    <div class="form-group">
																		        <label class="control-label col-xs-4">Proveedor (*):</label>
																		        <div class="col-xs-4">
																		        	<select name="id_proveedor"  id="id_proveedor" class="form-control">
																							<?php 
																							// si no lo muestro  su nombre y le asigno el value
																								$prove = $datos->id_proveedor;
																							  
																							foreach($proveedores as $fila)
																							{

																								if ($fila -> id_proveedor == $prove) {
																								?>
                                                                                             <option value="<?=$fila -> id_proveedor ?>" selected><?=$fila -> nom_proveedor ?></option>
                                                                                                <?php 
																								}else{
																								 ?>
																							
																								 <option value="<?=$fila -> id_proveedor ?>"><?=$fila -> nom_proveedor ?></option>
																							   <?php
																							    }
																							    }
																							?>		
																						</select>
																		       </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('id_proveedor'); ?></span>
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


