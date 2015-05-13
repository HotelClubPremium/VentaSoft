<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proveedores extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('proveedores_model');
	}

	public function index()
	{
		$data['titulo']				=		'VentaSoft Proveedores';
		$data['viewControlador']	=		'proveedores';
		$data['contenido']			=		'index';
		$data['datos']				=		$this->proveedores_model->getProveedores();
		$this->load->view('masterPage/masterPage', $data);
	}

	public function add()
	{
		if ($this->input->post()) { //pregunto si me llegaron datos del formulario
			
			if ($this->form_validation->run('proveedores')) { //ejecuto el archivo de form_validation
				
				$datos=array(
					'id_proveedor'  =>$this->input->post("id"),
					'nom_proveedor' =>$this->input->post("nombre"),
					'ape_proveedor' =>$this->input->post("apellido"),
					'correo'        =>$this->input->post("correo"),
					'telefono'      =>$this->input->post("telefono"),
					);

				$guardar= $this->proveedores_model->insertProveedores($datos);
				
				if ($guardar == true) {
					$this->session->set_flashdata('ControllerMessage','Se Ha Guardado Correctamente');
					redirect(base_url().'proveedores/add',301);
				} else {
					$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
					redirect(base_url().'proveedores/add',301);
				}
				
			}

		}
		$data['titulo']				=		'VentaSoft Proveedores';
		$data['viewControlador']	=		'proveedores';
		$data['contenido']			=		'add';
		$this->load->view('masterPage/masterPage', $data);
	}
	public function update($id=null)
	{

		if ($this->input->post()) { //pregunto si me llegaron datos del formulario
			
			if ($this->form_validation->run('proveedores')) { //ejecuto el archivo de form_validation
				
				$datos=array(
					'id_proveedor'  =>$this->input->post("id"),
					'nom_proveedor' =>$this->input->post("nombre"),
					'ape_proveedor' =>$this->input->post("apellido"),
					'correo'        =>$this->input->post("correo"),
					'telefono'      =>$this->input->post("telefono"),
					);

				$guardar= $this->proveedores_model->updateProveedores($datos,$id);
				
				if ($guardar == true) {
					$this->session->set_flashdata('ControllerMessage','Se Ha Guardado Correctamente');
					redirect(base_url().'proveedores/add',301);
				} else {
					$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
					redirect(base_url().'proveedores/add',301);
				}
				
			}

		}
		$data['titulo']				=		'VentaSoft Proveedores';
		$data['viewControlador']	=		'proveedores';
		$data['contenido']			=		'update';
		$data['datos']				=		$this->proveedores_model->getProveedoresId($id);
		$this->load->view('masterPage/masterPage', $data);
	}

}

/* End of file proveedores.php */
/* Location: ./application/controllers/proveedores.php */