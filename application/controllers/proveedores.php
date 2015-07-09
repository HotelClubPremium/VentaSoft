<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proveedores extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('proveedores_model');
		$this->load->model('productos_model');
	}

	

	public function index($folder_nav=null,$nav=null)
	{
		$data['titulo']				=		'Proveedores';
		$data['viewControlador']	=		'proveedores';
		$data['viewNave']	        =         $folder_nav;
		$data['nave']		    	=		         $nav;
		$data['contenido']			=		      'index';
		$data['datos']				=		       $this->proveedores_model->getProveedores();
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
			
			if ($this->form_validation->run('vali_Proveedores')) { //ejecuto el archivo de form_validation
				
				$datos=array(
					'id_proveedor'  =>$this->input->post("id_proveedor"),
					'nom_proveedor' =>$this->input->post("nom_proveedor"),
					'ape_proveedor' =>$this->input->post("ape_proveedor"),
					'correo'        =>$this->input->post("correo"),
					'telefono'      =>$this->input->post("telefono"),
					);

                     $id = $this->input->post("id_proveedor");
                     $validar= $this->proveedores_model->validarExistenciaProveedorId($id);
				
				    if ($validar == true) {
							$this->session->set_flashdata('ControllerMessage','Prooveedor registrado anteriormente, verifique el codigo e intentelo nuevamente');
							redirect(base_url().'proveedores/add/'.$folder_nav.'/'.$nav,301);
				    } else {
							
							    $guardar= $this->proveedores_model->insertProveedores($datos);
								
								if ($guardar == true) {
									$this->session->set_flashdata('ControllerMessage','Datos Guardados Correctamente');
									redirect(base_url().'proveedores/add/'.$folder_nav.'/'.$nav,301);
								} else {
									$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
									redirect(base_url().'proveedores/add/'.$folder_nav.'/'.$nav,301);
								}
		                   }

			}

		}
		$data['titulo']				=		'Proveedores';
		$data['viewControlador']	=		'proveedores';
		$data['viewNave']	        =         $folder_nav;
		$data['nave']		    	=		         $nav;
		$data['contenido']			=	        	'add';
		$this->load->view('masterPage/masterPage', $data);
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
			
			if ($this->form_validation->run('vali_Proveedores')) { //ejecuto el archivo de form_validation
				
				$datos=array(
					'id_proveedor'  =>$this->input->post("id_proveedor"),
					'nom_proveedor' =>$this->input->post("nom_proveedor"),
					'ape_proveedor' =>$this->input->post("ape_proveedor"),
					'correo'        =>$this->input->post("correo"),
					'telefono'      =>$this->input->post("telefono"),
					);

				$guardar= $this->proveedores_model->updateProveedores($datos,$id);
				
				if ($guardar == true) {
					$this->session->set_flashdata('ControllerMessage','Se Ha Actualizado Correctamente');
					redirect(base_url().'proveedores/index/'.$folder_nav.'/'.$nav,301);
				} else {
					$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
					redirect(base_url().'proveedores/index/'.$folder_nav.'/'.$nav,301);
				}
				
			}

		}
	    $data['titulo']				=		'Proveedores';
		$data['viewControlador']	=		'proveedores';
		$data['viewNave']	        =         $folder_nav;
		$data['nave']		    	=		         $nav;
		$data['contenido']			=		'update';
		$data['datos']				=		$this->proveedores_model->getProveedoresId($id);
		$this->load->view('masterPage/masterPage', $data);
	}

	public function delete($id=null,$folder_nav=null,$nav=null)
	{
		$consulta_productoProveedor= $this->productos_model->productoProveedor($id); 

       if ($consulta_productoProveedor == true ) {
           $this->session->set_flashdata('ControllerMessage','Registro no eliminado, Prooveedor posee productos registrados');
		   redirect(base_url().'proveedores/index/'.$folder_nav.'/'.$nav,301);
	   }
	   else
	   {

		$consulta= $this->proveedores_model->deleteProveedor($id);
				
		if ($consulta == true) {
			$this->session->set_flashdata('ControllerMessage','Registro Eliminado Correctamente');
			redirect(base_url().'proveedores/index/'.$folder_nav.'/'.$nav,301);
		} else {
			$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
			redirect(base_url().'proveedores/index/'.$folder_nav.'/'.$nav,301);
		}
	    }

		$data['titulo']				=		'VentaSoft proveedores';
		$data['viewControlador']	=		          'proveedores';
		$data['viewNave']	        =                   $folder_nav;
		$data['nave']		    	=		                   $nav;
		$data['contenido']			=		               'delete';
		$this->load->view('masterPage/masterPage', $data, FALSE);
	}


	public function search($folder_nav=null,$nav=null)   
       {

		
		        $criterio             = $this->input->post("criterio");
			    $valor                = $this->input->post("valor");
		$data['titulo']				=    'VentaSoft Proveedores';
		$data['viewControlador']	=		       'proveedores';
		$data['viewNave']	        =              $folder_nav;
		$data['nave']		    	=		              $nav;
		$data['contenido']			=		          'search';
		$data['datos']				=		$this->proveedores_model->searchProveedores($criterio,$valor);
		$this->load->view('masterPage/masterPage', $data);
		
	}

}

/* End of file proveedores.php */
/* Location: ./application/controllers/proveedores.php */