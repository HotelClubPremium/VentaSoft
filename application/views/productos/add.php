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
				     
															     <h1>Agregar Productos</h1>
											<?php 
												$atributos = array( 'id_producto' => 'form','name'=>'form');
												echo form_open_multipart(null,$atributos);
											 ?>
											 
											 	
											 
											<?php if ($this->session->flashdata('ControllerMessage') != '') { ?>
												<div class="alert alert-success">
													<p><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
												</div>
											<?php } ?>
											<p><?php echo validation_errors();?></p>
											<div class="col-md-4">
												
											</div>
											<div class="col-md-4">

												<div class="form-group">
													<label>Id Producto</label>
													<input type="text" name="id_producto" class="form-control" value="<?php echo set_value("id_producto")?>">
												</div>
												<div class="form-group">
													<label>Nombre</label>
													<input type="text" name="nom_producto" class="form-control" value="<?php echo set_value("nom_producto")?>">
												</div>
												<div class="form-group">
													<label>Cantidad</label>
													<input type="number" name="cantidad" class="form-control" value="<?php echo set_value("cantidad")?>">
												</div>
												<div class="form-group">
													<label>Vlr Unitario</label>
													<input type="text" name="valor_producto" class="form-control" value="<?php echo set_value("valor_producto")?>">
												</div>
												<div class="form-group">
													<label>Descripcion</label>
													<input type="text" name="descripcion" class="form-control" value="<?php echo set_value("descripcion")?>">
												</div>
												<div class="form-group">
													<label> ID Categoria</label>
													<input type="text" name="id_categoria" class="form-control" value="<?php echo set_value("id_categoria")?>">
												</div>

												<div class="form-group">
													<label> ID Proveedor</label>
													<input type="text" name="id_proveedor" class="form-control" value="<?php echo set_value("id_proveedor")?>">
												</div>
												
												<input type="submit" value="Enviar" title="Enviar" class="btn btn-primary">

											</div>
												
											 <?php 
											 	echo form_close();
											 ?>



								

				      </div> <!--/ cierre contenido --> 
                </div>
			</div>
</div>	



