<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('usuarios_model');
		$this->load->model('personas_model');
		$this->load->model('roles_model');
	}

	public function index($folder_nav=null,$nav=null)
	{   

		$data['titulo']				=    'VentaSoft usuarios';
		$data['viewControlador']	=		       'usuarios';
		$data['viewNave']	        =             $folder_nav;
		$data['nave']		    	=		             $nav;
		$data['contenido']			=		          'index';
		$data['datos']				=		$this->usuarios_model->getUsuarios();
		//todas las categorias y proveedores para buscar el nombre y mostrarlo y no el id como aparece en la la bd
		$data['roles'] 	         	=		$this->roles_model->getRoles();
		//$data['personas']		    =		$this->personas_model->getPersonas();
		$this->load->view('masterPage/masterPage', $data);
	}

	public function add($folder_nav=null,$nav=null)
	{
		if ($this->input->post()) { //pregunto si me llegaron datos del formulario
			
                $this->form_validation->set_message('required', 'campo  obligatorio');
				$this->form_validation->set_message('integer', 'Campo debe poseer solo numeros');
				$this->form_validation->set_message('numeric', 'Campo  debe poseer solo numeros');
				$this->form_validation->set_message('is_unique', 'Campo ya registrado');
				$this->form_validation->set_message('max_length', 'Campo  debe tener un Maximo de %d Caracteres');
				$this->form_validation->set_message('valid_email', 'Campo no contiene estructura de e-mail');
				$this->form_validation->set_error_delimiters('<span>','</span>');

			if ($this->form_validation->run('vali_Usuarios') && $this->form_validation->run('vali_Personas')) { //ejecuto el archivo de form_validation
				
              

				$datos_usuarios =array(
					'rol'                  =>$this->input->post("rol"),
					'user'                 =>$this->input->post("user"),
					'pass'                 =>$this->input->post("id_persona"),
					'acceso'               =>$this->input->post("acceso"),
					'id_persona'           =>$this->input->post("id_persona")
					         );

				$datos_persona =array(
					'id_persona'           =>$this->input->post("id_persona"),
					'nom_persona'          =>$this->input->post("nom_persona"),
					'ape_persona'          =>$this->input->post("ape_persona"),
					'sexo'                 =>$this->input->post("sexo"),
					'fecha_nacimiento'     =>$this->input->post("fecha_nacimiento"),
					'direccion'            =>$this->input->post("direccion"),
					'correo'               =>$this->input->post("correo"),
					'telefono'             =>$this->input->post("telefono")
					         );

                     
                     $id = $this->input->post("id_persona");
                     $validar= $this->personas_model->validarExistenciaPersonaId($id);
				
				    if ($validar == true) {
							$this->session->set_flashdata('ControllerMessage','Usuario registrado anteriormente, verifique el codigo e intentelo nuevamente');
							redirect(base_url().'usuarios/add/'.$folder_nav.'/'.$nav,301);
				    } else {
							
							   $consulta_personas= $this->personas_model->insertPersona($datos_persona);
							   $consulta_usuarios= $this->usuarios_model->insertUsuario($datos_usuarios);
							  
							   if ($consulta_personas == true ) 
							   {

							   	   if ( $consulta_usuarios == true) 
							   	      {
									   	   	$this->session->set_flashdata('ControllerMessage','Usuario Guardado Correctamente');
											redirect(base_url().'usuarios/add/'.$folder_nav.'/'.$nav,301);
							   	      }
							   	      else
							   	      {
							   	      	$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error (guardo usuarios pero no guardo personas) Intentelo Nuevamente');
									    redirect(base_url().'usuarios/add/'.$folder_nav.'/'.$nav,301);
							   	      }

								}
								  else 
								  {
									$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error (no guardo usuarios) Intentelo Nuevamente');
									redirect(base_url().'usuarios/add/'.$folder_nav.'/'.$nav,301);
								  }
		                   }
				
			}

		}


		$data['titulo']				=		'VentaSoft Usuarios';
		$data['viewControlador']	=		          'usuarios';
		$data['viewNave']	        =                $folder_nav;
		$data['nave']		    	=		                $nav;
		$data['contenido']			=		               'add';
        //todas los roles para buscar el nombre y mostrarlo como aparece en la la bd
		$data['roles']       		=		$this->roles_model->getRoles();
      
		$this->load->view('masterPage/masterPage', $data, FALSE);
	}

	public function update($id=null,$folder_nav=null,$nav=null)
	{

		if ($this->input->post()) { //pregunto si me llegaron datos del formulario

			    $this->form_validation->set_message('required', 'campo  obligatorio');
				$this->form_validation->set_message('integer', 'Campo debe poseer solo numeros');
				$this->form_validation->set_message('numeric', 'Campo  debe poseer solo numeros');
				$this->form_validation->set_message('is_unique', 'Campo ya registrado');
				$this->form_validation->set_message('max_length', 'Campo  debe tener un Maximo de %d Caracteres');
				$this->form_validation->set_message('valid_email', 'Campo no contiene estructura de e-mail');
				$this->form_validation->set_error_delimiters('<span>','</span>');
			
			if ($this->form_validation->run('vali_Productos')) { //ejecuto el archivo de form_validation
				
				$datos=array(
					'id_producto'             =>$this->input->post("id_producto"),
					'nom_producto'            =>$this->input->post("nom_producto"),
					'cantidad'                =>$this->input->post("cantidad"),
					'valor_producto'          =>$this->input->post("valor_producto"),
					'descripcion'             =>$this->input->post("descripcion"),
					'id_categoria'            =>$this->input->post("id_categoria"),
					'id_proveedor'            =>$this->input->post("id_proveedor")
					);


				$consulta= $this->productos_model->updateProducto($datos,$id);
				
				if ($consulta == true) {
					$this->session->set_flashdata('ControllerMessage','Datos actualiazados Correctamente');
					redirect(base_url().'productos/index/'.$folder_nav.'/'.$nav,301);
				} else {
					$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
					redirect(base_url().'productos/index/'.$folder_nav.'/'.$nav,301);
				}
				
			}

		}
		$data['titulo']				=		'VentaSoft Productos';
		$data['viewControlador']	=		          'productos';
		$data['viewNave']	        =                 $folder_nav;
		$data['nave']		    	=		                 $nav;
		$data['contenido']			=		             'update';
		$data['datos']				=		$this->productos_model->getProductoId($id);
        //todas las categorias y proveedores para buscar el nombre y mostrarlo   y no el id como aparece en la la bd
 	    $data['categorias'] 		=		$this->categorias_model->getCategorias();
        $data['proveedores']		=		$this->proveedores_model->getProveedores();

        $this->load->view('masterPage/masterPage', $data, FALSE);
	}



	public function delete($id=null,$folder_nav=null,$nav=null)
	{
		$consulta= $this->productos_model->deleteProducto($id);
				
		if ($consulta == true) {
			$this->session->set_flashdata('ControllerMessage','Registro Eliminado Correctamente');
			redirect(base_url().'productos/index/'.$folder_nav.'/'.$nav,301);
		} else {
			$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
			redirect(base_url().'productos/index/'.$folder_nav.'/'.$nav,301);
		}

		$data['titulo']				=		'VentaSoft Productos';
		$data['viewControlador']	=		          'productos';
		$data['viewNave']	        =                 $folder_nav;
		$data['nave']		    	=		                 $nav;
		$data['contenido']			=		             'delete';
		$this->load->view('masterPage/masterPage', $data, FALSE);
	}

	

		public function search($folder_nav=null,$nav=null)   
       {

		
		        $criterio             = $this->input->post("criterio");
			    $valor                = $this->input->post("valor");
		$data['titulo']				=    'VentaSoft Productos';
		$data['viewControlador']	=		       'productos';
		$data['viewNave']	        =              $folder_nav;
		$data['nave']		    	=		              $nav;
		$data['contenido']			=		          'search';
		$data['datos']				=		$this->productos_model->searchProductos($criterio,$valor);
        //todas las categorias y proveedores para buscar el nombre y mostrarlo   y no el id como aparece en la la bd
 	    $data['categorias'] 		=		$this->categorias_model->getCategorias();
        $data['proveedores']		=		$this->proveedores_model->getProveedores();
		$this->load->view('masterPage/masterPage', $data);
		
	}

}

/* End of file clientes.php */
/* Location: ./application/controllers/clientes.php */