<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('productos_model');
	}

	public function index()
	{
		$data['titulo']				=		'VentaSoft Productos';
		$data['viewControlador']	=		'productos';
		$data['nave']			    =		'navProductos';
		$data['contenido']			=		'index';
		$data['datos']				=		$this->productos_model->getProductos();
		$this->load->view('masterPage/masterPage', $data);
	}

	public function add()
	{
		if ($this->input->post()) { //pregunto si me llegaron datos del formulario
			
			if ($this->form_validation->run('vali_Productos')) { //ejecuto el archivo de form_validation
				
				$datos=array(
					'id_producto'          =>$this->input->post("id_producto"),
					'nom_producto'         =>$this->input->post("nom_producto"),
					'cantidad'             =>$this->input->post("cantidad"),
					'valor_producto'       =>$this->input->post("valor_producto"),
					'descripcion'          =>$this->input->post("descripcion"),
					'id_categoria'         =>$this->input->post("id_categoria"),
					'id_proveedor'         =>$this->input->post("id_proveedor")
					);

				$consulta= $this->productos_model->insertProducto($datos);
				
				if ($consulta == true) {
					$this->session->set_flashdata('ControllerMessage','Se Ha Guardado Correctamente');
					redirect(base_url().'productos/add',301);
				} else {
					$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
					redirect(base_url().'productos/add',301);
				}
				
			}

		}
		$data['titulo']				=		'VentaSoft Productos';
		$data['viewControlador']	=		'productos';
		$data['contenido']			=		'add';
		$this->load->view('masterPage/masterPage', $data, FALSE);
	}

	public function update($id=null)
	{

		if ($this->input->post()) { //pregunto si me llegaron datos del formulario
			
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
					$this->session->set_flashdata('ControllerMessage','Se Ha Guardado Correctamente');
					redirect(base_url().'productos/index',301);
				} else {
					$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
					redirect(base_url().'productos/index',301);
				}
				
			}

		}
		$data['titulo']				=		'VentaSoft Productos';
		$data['viewControlador']	=		'productos';
		$data['contenido']			=		'update';
		$data['datos']				=		$this->productos_model->getProductoId($id);
		$this->load->view('masterPage/masterPage', $data, FALSE);
	}

	public function delete($id=null)
	{
		$consulta= $this->productos_model->deleteProducto($id);
				
		if ($consulta == true) {
			$this->session->set_flashdata('ControllerMessage','Se Ha Eliminado Correctamente');
			redirect(base_url().'productos/index',301);
		} else {
			$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
			redirect(base_url().'productos/index',301);
		}
		$data['titulo']				=		'VentaSoft Productos';
		$data['viewControlador']	=		'productos';
		$data['contenido']			=		'delete';
		$this->load->view('masterPage/masterPage', $data, FALSE);
	}

}

/* End of file clientes.php */
/* Location: ./application/controllers/clientes.php */