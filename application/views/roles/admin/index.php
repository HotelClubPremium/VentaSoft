
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
				      <div class="col-md-9">
				      <h1 style="text-align: center">Bienvenido de nuevo <?=$this->session->userdata('perfil')?></h1>
				      </div>
                </div>
		
				
			</div>
		</div>	
