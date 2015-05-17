<!DOCTYPE html>
	<html lang="es">
	<head>
		  
		 <script src="http://code.jquery.com/jquery-1.8.3.js"></script>		 	
	</head>
	<body>

	
           <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                      <div class="panel panel-info" >
                                <div class="panel-heading">
                                    <div class="panel-title">Inicio Session</div>
                                </div>   


                              <div style="padding-top:30px" class="panel-body" >

                                      <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                                                             <?php
                                                                    $username = array('name' => 'username', 'placeholder' => 'Digite su usuario', 'id' => 'login-username', 'type' => 'text', 'class' => 'form-control');
                                                                    $password = array('name' => 'password', 'placeholder' => 'Digite su contraseña','id' => 'login-password', 'type' => 'password', 'class' => 'form-control');
                                                                    $submit = array('name' => 'submit', 'value' => 'Iniciar sesión', 'title' => 'Iniciar sesión','class' => 'btn btn-success center-block');
                                                               ?>
                                                          
                                                                <?=form_open(base_url().'login/new_user')?>

                                                                <div style="margin-bottom: 30px" class="input-group">
                                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                      <?=form_input($username)?>
                                                                      <p> <?=form_error('username')?></p>                                     
                                                               </div>
                                                        
                                                                <div style="margin-bottom: 30px" class="input-group">
                                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                                      <?=form_password($password)?>
                                                                      <p><?=form_error('password')?></p>
                                                                </div>

                                                        <div style="margin-top:10px" class="form-group ">
                                                            <!-- Button -->
                                                            <div class="col-sm-24 controls">
                                                                <?=form_hidden('token',$token)?>
                                                                <?=form_submit($submit)?>
                                                            </div>
                                                        </div>
                                                        <hr></hr>
                                                                <?=form_close()?>
                                                                <?php 
                                                                if($this->session->flashdata('usuario_incorrecto'))
                                                                {      
                                                                ?>      
                                                                <p><?=$this->session->flashdata('contraseña_incorrecta')?></p>
                                                                <?php
                                                                }
                                                                ?>  
                                                     
                              </div>                     
                    </div>  
         </div>
  

                                              
    
	</body>
</html>