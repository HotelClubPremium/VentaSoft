<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('empleados_model');
	}



	public function index($folder_nav=null,$nav=null)
	{
		$data['titulo']				=		'VentaSoft Empleados';
		$data['viewControlador']	=		          'empleados';
		$data['viewNave']	        =                 $folder_nav;
		$data['nave']		    	=		                 $nav;
		$data['contenido']			=		              'index';
		$data['datos']				=		$this->empleados_model->getEmpleados();
		$this->load->view('masterPage/masterPage', $data);
		
	}


	public function add($folder_nav=null,$nav=null)
	{
		if ($this->input->post()) { //pregunto si me llegaron datos del formulario
			
			if ($this->form_validation->run('empleados/add')) { //ejecuto el archivo de form_validation
				
				$datos=array(
					'id_empleado'       =>$this->input->post("id"),
					'nom_empleado'      =>$this->input->post("nombre"),
					'ape_empleado'             =>$this->input->post("apellido"),
					'sexo'           =>$this->input->post("sexo"),
					'fecha_nacimiento' =>$this->input->post("fecha"),
					'direccion'         =>$this->input->post("direccion"),
					'correo'         =>$this->input->post("correo"),
					'telefono'        =>$this->input->post("telefono")
					);

				$guardar= $this->empleados_model->insertEmpleados($datos);
				
				if ($guardar == true) {
					$this->session->set_flashdata('ControllerMessage','Se Ha Guardado Correctamente');
					redirect(base_url().'empleados/add',301);
				} else {
					$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
					redirect(base_url().'empleados/add',301);
				}
				
			}

		}
		$data['titulo']				=		'VentaSoft Empleados';
		$data['viewControlador']	=		          'empleados';
		$data['viewNave']	        =                 $folder_nav;
		$data['nave']		    	=		                 $nav;
		$data['contenido']			=		                'add';
		$this->load->view('masterPage/masterPage', $data, FALSE);
	}



	public function update($id=null)
	{

		if ($this->input->post()) { //pregunto si me llegaron datos del formulario
			
			if ($this->form_validation->run('empleados/add')) { //ejecuto el archivo de form_validation
				
				$datos=array(
					'id_empleado'       =>$this->input->post("id"),
					'nom_empleado'      =>$this->input->post("nombre"),
					'ape_empleado'      =>$this->input->post("apellido"),
					'sexo'             =>$this->input->post("sexo"),
					'fecha_nacimiento' =>$this->input->post("fecha"),
					'direccion'        =>$this->input->post("direccion"),
					'correo'           =>$this->input->post("correo"),
					'telefono'         =>$this->input->post("telefono")
					);

				$guardar= $this->clientes_model->updateEmpleados($datos,$id);
				
				if ($guardar == true) {
					$this->session->set_flashdata('ControllerMessage','Se Ha Guardado Correctamente');
					redirect(base_url().'empleados/index',301);
				} else {
					$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
					redirect(base_url().'empleados/index',301);
				}
				
			}

		}
		$data['titulo']				=		'VentaSoft Empleados';
		$data['viewControlador']	=		          'empleados';
		$data['viewNave']	        =                 $folder_nav;
		$data['nave']		    	=		                 $nav;
		$data['contenido']			=		             'update';
		$data['datos']				=		$this->empleados_model->getEmpleadosId($id);
		$this->load->view('masterPage/masterPage', $data, FALSE);
	}


	public function delete($id=null)
	{
		$guardar= $this->empleados_model->deleteEmpleados($id);
				
		if ($guardar == true) {
			$this->session->set_flashdata('ControllerMessage','Se Ha Eliminado Correctamente');
			redirect(base_url().'empleados/index',301);
		} else {
			$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
			redirect(base_url().'empleados/index',301);
		}
		$data['titulo']				=		'VentaSoft Empleados';
		$data['viewControlador']	=		'empleados';
		$data['contenido']			=		'delete';
		$this->load->view('masterPage/masterPage', $data, FALSE);
	}

}

/* End of file empleados.php */
/* Location: ./application/controllers/empleados.php */