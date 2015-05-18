         
           <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                     
                                                                 <?php 
                                                                if($this->session->flashdata('usuario_incorrecto'))
                                                                {
                                                                ?> 
                                                                  <div class="alert alert-danger">
                                                                       <p><strong> ¡Error! </strong><?=$this->session->flashdata('usuario_incorrecto')?></p>
                                                                  </div>     
                                                                <?php
                                                                }
                                                                ?>  

                      <div class="panel panel-info" >
                                <div class="panel-heading">
                                    <div class="panel-title">Inicio Session</div>
                                </div>   

                         <div style="padding-top:30px" class="panel-body" >

                                      <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                                                             <?php
                                                                    $username = array('name' => 'username', 'placeholder' => 'Digite su usuario', 'id' => 'login-username', 'type' => 'text', 'class' => 'form-control');
                                                                    $password = array('name' => 'password', 'placeholder' => 'Digite su contraseña','id' => 'login-password', 'type' => 'password', 'class' => 'form-control');
                                                                    $submit = array('name' => 'submit', 'value' => 'Iniciar sesión', 'title' => 'Iniciar sesión','class' => 'btn btn-primary');
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

                                                        <div style="margin-top:10px" class="form-group">
                                                            <!-- Button -->
                                                            <div class="col-sm-12 controls">
                                                                <?=form_hidden('token',$token)?>
                                                                <?=form_submit($submit)?>
                                                            </div>
                                                        </div>
                                                        <hr></hr>
                                                                <?=form_close()?>
                                                               
                                                     
                              </div>                     
                    </div>  
                    <hr> </hr>
         </div>
        
 