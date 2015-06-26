<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('productos_model');
		$this->load->model('proveedores_model');
		$this->load->model('categorias_model');
	}

	public function index($folder_nav=null,$nav=null)
	{   

		$data['titulo']				=    'VentaSoft Productos';
		$data['viewControlador']	=		       'productos';
		$data['viewNave']	        =              $folder_nav;
		$data['nave']		    	=		              $nav;
		$data['contenido']			=		           'index';
		$data['datos']				=		$this->productos_model->getProductos();
		//todas las categorias y proveedores para buscar el nombre y mostrarlo   y no el id como aparece en la la bd
		$data['categorias'] 		=		$this->categorias_model->getCategorias();
		$data['proveedores']		=		$this->proveedores_model->getProveedores();
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
				$this->form_validation->set_error_delimiters('<span>','</span>');

			if ($this->form_validation->run('vali_Productos')) { //ejecuto el archivo de form_validation
				
              

				$datos =array(
					'id_producto'          =>$this->input->post("id_producto"),
					'nom_producto'         =>$this->input->post("nom_producto"),
					'cantidad'             =>$this->input->post("cantidad"),
					'valor_producto'       =>$this->input->post("valor_producto"),
					'descripcion'          =>$this->input->post("descripcion"),
					'id_categoria'         =>$this->input->post("id_categoria"),
					'id_proveedor'         =>$this->input->post("id_proveedor")
					         );

                     
                     $id = $this->input->post("id_producto");
                     $validar= $this->productos_model->validarExistenciaProductoId($id);
				
				    if ($validar == true) {
							$this->session->set_flashdata('ControllerMessage','Producto registrado anteriormente, verifique el codigo e intentelo nuevamente');
							redirect(base_url().'productos/add/'.$folder_nav.'/'.$nav,301);
				    } else {
							
							   $consulta= $this->productos_model->insertProducto($datos);
							   if ($consulta == true) {
									$this->session->set_flashdata('ControllerMessage','Se Ha Guardado Correctamente');
									redirect(base_url().'productos/add/'.$folder_nav.'/'.$nav,301);
								} else {
									$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
									redirect(base_url().'productos/add/'.$folder_nav.'/'.$nav,301);
								}
		                   }
				
			}

		}


		$data['titulo']				=		'VentaSoft Productos';
		$data['viewControlador']	=		          'productos';
		$data['viewNave']	        =                 $folder_nav;
		$data['nave']		    	=		                 $nav;
		$data['contenido']			=		                'add';
        //todas las categorias y proveedores para buscar el nombre y mostrarlo   y no el id como aparece en la la bd
		$data['categorias'] 		=		$this->categorias_model->getCategorias();
        $data['proveedores']		=		$this->proveedores_model->getProveedores();
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