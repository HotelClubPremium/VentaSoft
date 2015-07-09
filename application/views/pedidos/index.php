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
													  	 <h1>Gestion Productos <small></small></h1>
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
																		echo form_open_multipart('productos/search/'.$folder_nav.'/'.$nav,$atributos);
																    ?>
				                                                            	     <label class="control-label">Busqueda por:</label>
				                                                            	     <select name="criterio" id="criterio"   class="form-control">
				                                                                          <option value="id_producto" >Id</option>
				                                                                          <option value="nom_producto" selected >Nombre</option>
				                                                                          <option value="cantidad" >Cantidad</option>
				                                                                          <option value="valor_producto" >Valor unitario</option>
				                                                                          <option value="descripcion" >Descripcion</option>
				                                                                          <option value="estado" >Estado</option>
				                                                                          <option value="id_categoria" >Categoria</option>
				                                                                          <option value="id_proveedor" >Proveedor</option>
				                                                            	     </select>

																		 		    <input type="text"  name="valor"  value="<?php echo set_value("valor")?>"  class="form-control" placeholder="Buscar producto">
																		 		    <input type="submit" value="Buscar" title="Buscar productos" class="btn btn-info">
																		 		  
															    	  <?php 
																	   echo form_close();
												                     ?>  


								<div class="panel panel-default">
												   <div class="panel-heading">
													    <a class="glyphicon glyphicon-plus-sign " aria-hidden="true" href="<?php echo base_url()?>productos/add/<?php echo  $folder_nav;?>/<?php echo  $nav;?>"> Nuevo </a>
													 </div>
												  <div class="panel-body">                                                                               
															    <table class="table table-hover">
																<tr>
																	<th>Id</th>
																	<th>Nombre </th>
																	<th>Cantidad</th>
																	<th>Valor unitario</th>
																	<th>Descripcion</th>
																	<th>Estado</th>
																	<th>Categoria</th>
																	<th>Proveedor</th>
																	<th>Acciones</th>
																</tr>
																<?php foreach ($datos as $dato) {?>
																	<tr>
																		<td><?php echo $dato->id_producto;?></td>
																		<td><?php echo $dato->nom_producto;?></td>
																		<td><?php echo $dato->cantidad; ?></td>
																		<td><?php echo $dato->valor_producto; ?></td>
																		<td><?php echo $dato->descripcion; ?></td>
																		<td><?php echo $dato->estado; ?></td>
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
                                                                                    <!-- los mismos procesos q con  categoria--> 
																			       <?php
																					$prove = $dato->id_proveedor;
																					foreach($proveedores as $fila)
																					{
                                                                                      if ($fila -> id_proveedor == $prove )
																						 {
																				  ?>
																				          <td><?=$fila -> nom_proveedor ?></td> 
																				  <?php 
																						 }
																								
																							}
																			      ?>	
						
																		<td><a class="glyphicon glyphicon-pencil" aria-hidden="true"  title="Editar Producto" href="<?php echo base_url()?>productos/update/<?php echo $dato->id_producto?>/<?php echo  $folder_nav;?>/<?php echo $nav;?>"></a>  <span class="glyphicon glyphicon-option-horizontal"></span> <a class="glyphicon glyphicon-trash" aria-hidden="true"  onclick="if(confirmarEliminar() == false) return false" title="Eliminar Producto" href="<?php echo base_url()?>productos/delete/<?php echo $dato->id_producto?>/<?php echo  $folder_nav;?>/<?php echo  $nav;?>"></a> <span class="glyphicon glyphicon-option-horizontal"></span> <a class="glyphicon glyphicon-plus" aria-hidden="true"  title="Adicionar Unidades de Productos" href="<?php echo base_url()?>productos/adicionar/<?php echo $dato->id_producto?>/<?php echo  $folder_nav;?>/<?php echo  $nav;?>"></a> </td>
																	</tr>
																<?php } 
																?>
															</table> 
								                </div>
								</div>
							</div>	

                      <section id="services">
        <div class="container">
            <div class="box first">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="center">
                            <i class="icon-apple icon-md icon-color1"></i>
                            <h4>iOS development</h4>
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</p>
                        </div>
                    </div><!--/.col-md-4-->
                    <div class="col-md-4 col-sm-6">
                        <div class="center">
                            <i class="icon-android icon-md icon-color2"></i>
                            <h4>Android development</h4>
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</p>
                        </div>
                    </div><!--/.col-md-4-->
                    <div class="col-md-4 col-sm-6">
                        <div class="center">
                            <i class="icon-windows icon-md icon-color3"></i>
                            <h4>Windows Phone development</h4>
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</p>
                        </div>
                    </div><!--/.col-md-4-->
                    <div class="col-md-4 col-sm-6">
                        <div class="center">
                            <i class="icon-html5 icon-md icon-color4"></i>
                            <h4>Ruby on Rails development</h4>
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</p>
                        </div>
                    </div><!--/.col-md-4-->
                    <div class="col-md-4 col-sm-6">
                        <div class="center">
                            <i class="icon-css3 icon-md icon-color5"></i>
                            <h4>Javascript development</h4>
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</p>
                        </div>
                    </div><!--/.col-md-4-->
                    <div class="col-md-4 col-sm-6">
                        <div class="center">
                            <i class="icon-thumbs-up icon-md icon-color6"></i>
                            <h4>Responsive web design</h4>
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</p>
                        </div>
                    </div><!--/.col-md-4-->
                </div><!--/.row-->
            </div><!--/.box-->
        </div><!--/.container-->
    </section><!--/#services-->


										

				      </div>  <!--/cierre vcol md9--> 
                </div>
			</div>
</div>	








