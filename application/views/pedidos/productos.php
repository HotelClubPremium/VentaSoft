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
													  	 <h1>Productos <small>Agregar al carrito</small></h1>
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
								        $id= $id_cliente;   
								 ?>

									                               <?php 
																		$atributos = array( 'search' => 'form','name'=>'form' ,'class'=>'navbar-form navbar-right' ,'role'=>'search');
																		echo form_open('productos/search/'.$folder_nav.'/'.$nav,$atributos);
																    ?>
				                                                            	     <label class="control-label">Busqueda por:</label>
				                                                            	     <select name="criterio" id="criterio"   class="form-control">
				                                                                          <option value="id_producto" >Id</option>
				                                                                          <option value="nom_producto" selected >Nombre</option>
				                                                                          <option value="valor_producto" >Valor unitario</option>
				                                                                          <option value="descripcion" >Descripcion</option>
				                                                                          <option value="estado" >Estado</option>
				                                                                          <option value="id_categoria" >Categoria</option>
				                                                            	     </select>

																		 		    <input type="text"  name="valor"  value="<?php echo set_value("valor")?>"  class="form-control" placeholder="Buscar producto">
																		 		    <input type="submit" value="Buscar" title="Buscar productos" class="btn btn-info">
																		 		  
															    	  <?php 
																	   echo form_close();
												                      ?>  


								<div class="panel panel-default">
												    <div class="panel-heading">
												    	<a  href="<?php echo base_url()?>pedidos/get_carrito/<?php echo  $id;?>/<?php echo  $folder_nav;?>/<?php echo  $nav;?>" class="btn btn-warning btn-sm" role="button"> Ir a Carrito </a>
												   </div>
												  <div class="panel-body">                                                                               
															    <table class="table table-hover">
																<tr>
																	<th>Id</th>
																	<th>Nombre </th>
																	<th>Valor unitario</th>
																	<th>Descripcion</th>
																	<th>Categoria</th>
																	<th>Unidades</th>
																	<th>Acciones</th>
																</tr>
																<?php foreach ($datos as $dato) {?>

																  <?php 
																		$atributos = array('id'=>'add_carrito','class'=>'navbar-form navbar-right');
																		echo form_open('pedidos/add_carrito/'.$id.'/'.$folder_nav.'/'.$nav,$atributos);
																    ?>
  
																  
																				<tr>
																					<td><?php echo $dato->id_producto;?></td>
																					<td><?php echo $dato->nom_producto;?></td>
																					<td><?php echo $dato->valor_producto; ?></td>
																					<td><?php echo $dato->descripcion; ?></td>
			                                                                                <!-- obtengo  el id de categoria--> 
			                                                                                <!-- recorro todas las categoria y comparo id--> 
			                                                                                <!-- s coinciden muestro el nombre de la categoria--> 

			                                                                                 <?php
																								$cate = $dato->id_categoria;
																								foreach($categorias as $fila)
																								{
			                                                                                      if ($fila -> id_categoria == $cate )
																									 {
																							  ?>
																							          <td><?=$fila -> nom_categoria ?></td> 
																							  <?php 
																									 }
																											
																										}
																						      ?>


																					<td>
																						  <div class="col-xs-5">
																					         <input type="number" name="unidades" placeholder="cant" value="0" class="form-control" value="<?php echo set_value("unidades")?>">
																					      </div>
																					</td>    

																					<input type="hidden" name="id_producto"     value="<?php echo $dato->id_producto?>"></input> 
																					<input type="hidden" name="nom_producto"    value="<?php echo $dato->nom_producto;?>"></input> 
																					<input type="hidden" name="valor_producto"  value="<?php echo $dato->valor_producto;?>"></input> 
			
												                                    <td>
																					    <input type='submit' value='' class="btn-group btn-lg" role="button" style='background:url("<?php echo base_url();?>utilities/img/iconos/glyphicons-cart-out.png") center no-repeat;padding-left:20px;' />
                                                                                    </td>
												                                   	
																				</tr>
                                                                    <?php 
																	   echo form_close();
												                      ?>  
			

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

