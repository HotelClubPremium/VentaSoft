<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('clientes_model');
	}

	public function index()
	{
		$data['titulo']				=		'VentaSoft Clientes';
		$data['viewControlador']	=		'clientes';
		$data['contenido']			=		'index';
		$data['datos']				=		$this->clientes_model->getClientes();
		$this->load->view('masterPage/masterPage', $data);
	}

	public function add()
	{
		if ($this->input->post()) { //pregunto si me llegaron datos del formulario
			
			if ($this->form_validation->run('formulario/add')) { //ejecuto el archivo de form_validation
				
				$datos=array(
					'id_cliente'       =>$this->input->post("id"),
					'nom_cliente'      =>$this->input->post("nombre"),
					'sexo'             =>$this->input->post("sexo"),
					'correo'           =>$this->input->post("correo"),
					'telefono'         =>$this->input->post("telefono"),
					'fecha_nacimiento' =>$this->input->post("fecha"),
					'direccion'        =>$this->input->post("direccion")
					);

				$guardar= $this->clientes_model->insertClientes($datos);
				
				if ($guardar == true) {
					$this->session->set_flashdata('ControllerMessage','Se Ha Guardado Correctamente');
					redirect(base_url().'clientes/add',301);
				} else {
					$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
					redirect(base_url().'clientes/add',301);
				}
				
			}

		}
		$data['titulo']				=		'VentaSoft Clientes';
		$data['viewControlador']	=		'clientes';
		$data['contenido']			=		'add';
		$this->load->view('masterPage/masterPage', $data, FALSE);
	}

	public function update($id=null)
	{

		if ($this->input->post()) { //pregunto si me llegaron datos del formulario
			
			if ($this->form_validation->run('formulario/add')) { //ejecuto el archivo de form_validation
				
				$datos=array(
					'id_cliente'       =>$this->input->post("id"),
					'nom_cliente'      =>$this->input->post("nombre"),
					'sexo'             =>$this->input->post("sexo"),
					'correo'           =>$this->input->post("correo"),
					'telefono'         =>$this->input->post("telefono"),
					'fecha_nacimiento' =>$this->input->post("fecha"),
					'direccion'        =>$this->input->post("direccion")
					);

				$guardar= $this->clientes_model->updateClientes($datos,$id);
				
				if ($guardar == true) {
					$this->session->set_flashdata('ControllerMessage','Se Ha Guardado Correctamente');
					redirect(base_url().'clientes/index',301);
				} else {
					$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
					redirect(base_url().'clientes/index',301);
				}
				
			}

		}
		$data['titulo']				=		'VentaSoft Clientes';
		$data['viewControlador']	=		'clientes';
		$data['contenido']			=		'update';
		$data['datos']				=		$this->clientes_model->getClientesId($id);
		$this->load->view('masterPage/masterPage', $data, FALSE);
	}

	public function delete($id=null)
	{
		$guardar= $this->clientes_model->deleteClientes($id);
				
		if ($guardar == true) {
			$this->session->set_flashdata('ControllerMessage','Se Ha Eliminado Correctamente');
			redirect(base_url().'clientes/index',301);
		} else {
			$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
			redirect(base_url().'clientes/index',301);
		}
		$data['titulo']				=		'VentaSoft Clientes';
		$data['viewControlador']	=		'clientes';
		$data['contenido']			=		'delete';
		$this->load->view('masterPage/masterPage', $data, FALSE);
	}

}

/* End of file clientes.php */
/* Location: ./application/controllers/clientes.php */