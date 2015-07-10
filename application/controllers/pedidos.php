<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pedidos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('productos_model');
		$this->load->model('roles_model');
		$this->load->model('categorias_model');
		$this->load->model('clientes_model');
		$this->load->model('usuarios_model');
	    $this->load->model('proveedores_model');
	}


	public function index($folder_nav=null,$nav=null)
	{   
		   $this->clientes($folder_nav,$nav); 
	}


	public function clientes($folder_nav=null,$nav=null)
	{   

		$data['titulo']				=    'VentaSoft Productos';
		$data['viewControlador']	=		         'pedidos';
		$data['viewNave']	        =              $folder_nav;
		$data['nave']		    	=		              $nav;
		$data['contenido']			=		        'clientes';
		$data['datos']				=	    $this->clientes_model->getClientes();
		$data['roles'] 	         	=		$this->roles_model->getRoles();
		$this->load->view('masterPage/masterPage', $data);
	}

	public function productos($id=null,$folder_nav=null,$nav=null)
	{   
		$data['titulo']				=    'VentaSoft Productos';
		$data['viewControlador']	=		         'pedidos';
		$data['viewNave']	        =              $folder_nav;
		$data['nave']		    	=		              $nav;
		$data['contenido']			=		       'productos';
		$data['datos']				=		$this->productos_model->getProductos();
		//todas las categorias y proveedores para buscar el nombre y mostrarlo   y no el id como aparece en la la bd
		$data['categorias'] 		=		$this->categorias_model->getCategorias();
		$this->load->view('masterPage/masterPage', $data);
	}


	public function add_carrito($folder_nav=null,$nav=null)
	{
		print_r($_POST);

		if ($this->input->post()) { //pregunto si me llegaron datos del formulario
			
                $this->form_validation->set_message('required', 'campo  obligatorio');
				$this->form_validation->set_message('integer', 'Campo debe poseer solo numeros');
				$this->form_validation->set_message('numeric', 'Campo  debe poseer solo numeros');
				$this->form_validation->set_message('is_unique', 'Campo ya registrado');
				$this->form_validation->set_message('max_length', 'Campo  debe tener un Maximo de %d Caracteres');
				$this->form_validation->set_error_delimiters('<span>','</span>');

			if ($this->form_validation->run('vali_Carrito')) { //ejecuto el archivo de form_validation
				
				
					$data = array(
					        'id'       =>$this->input->post("id_producto"),
					        'qty'      =>$this->input->post("unidades"),
					        'price'    =>$this->input->post("valor_producto"),
					        'name'     =>$this->input->post("nom_producto")
                                );

                   $rsta = $this->cart->insert($data);

                     
				    if ($rsta == true) {
						     $this->session->set_flashdata('ControllerMessage','Producto agregado al carrito satisfactoriamente');
							 redirect(base_url().'pedidos/get_carrito/'.$folder_nav.'/'.$nav,301);
				    } else {
			
							$this->session->set_flashdata('ControllerMessage','Falla, Se ha Producido un Error Intentelo Nuevamente');
							redirect(base_url().'pedidos/add_carrito/'.$folder_nav.'/'.$nav,301);
								
		                   }
				
			}

		}


		$data['titulo']				=		'VentaSoft Productos';
		$data['viewControlador']	=		            'pedidos';
		$data['viewNave']	        =                 $folder_nav;
		$data['nave']		    	=		                 $nav;
		$data['contenido']			=		          'productos';
        $data['datos']				=		$this->productos_model->getProductos();
		//todas las categorias y proveedores para buscar el nombre y mostrarlo   y no el id como aparece en la la bd
		$data['categorias'] 		=		$this->categorias_model->getCategorias();
		$this->load->view('masterPage/masterPage', $data, FALSE);
	}

	public function get_carrito($folder_nav=null,$nav=null)
	{   
		$data['titulo']				=    'VentaSoft Productos';
		$data['viewControlador']	=		         'pedidos';
		$data['viewNave']	        =              $folder_nav;
		$data['nave']		    	=		              $nav;
		$data['contenido']			=		         'carrito';
	
		$this->load->view('masterPage/masterPage', $data);
	}

	public function limpiar_carrito($folder_nav=null,$nav=null)
	{   
		
		 $this->cart->destroy();
         redirect(base_url().'pedidos/get_carrito/'.$folder_nav.'/'.$nav,301);
		
	}

	public function actualizar_carrito($folder_nav=null,$nav=null)
	{   
		 $data= $this->input->post();
		 $this->cart->update($data);
         redirect(base_url().'pedidos/get_carrito/'.$folder_nav.'/'.$nav,301);
		
	}
	public function quitar_producto_carrito($rowid=null,$folder_nav=null,$nav=null)
	{   
		 $this -> cart -> update(array('rowid' => $rowid, 'qty' => 0));
         redirect(base_url().'pedidos/get_carrito/'.$folder_nav.'/'.$nav,301);
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
					'estado'                  =>$this->input->post("estado"),
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


	public function adicionar($id=null,$folder_nav=null,$nav=null)
	{


		if ($this->input->post()) { //pregunto si me llegaron datos del formulario

			    $this->form_validation->set_message('required', 'campo  obligatorio');
				$this->form_validation->set_message('integer', 'Campo debe poseer solo numeros');
				$this->form_validation->set_message('numeric', 'Campo  debe poseer solo numeros');
				$this->form_validation->set_message('is_unique', 'Campo ya registrado');
				$this->form_validation->set_message('max_length', 'Campo  debe tener un Maximo de %d Caracteres');
				$this->form_validation->set_error_delimiters('<span>','</span>');
			
			if ($this->form_validation->run('vali_Productos_adicionar')) { //ejecuto el archivo de form_validation


				    $cant_actual          =$this->input->post("cantidad");
					$cant_adicionada      =$this->input->post("cantidad_adicionada");

					$cantidad =  $cant_actual + $cant_adicionada;
				
				$datos=array(
					'id_producto'             =>$this->input->post("id_producto"),
					'nom_producto'            =>$this->input->post("nom_producto"),
					'cantidad'                =>$cantidad,
					'valor_producto'          =>$this->input->post("valor_producto"),
					'descripcion'             =>$this->input->post("descripcion"),
					'estado'                  =>$this->input->post("estado"),
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
		$data['contenido']			=		          'adicionar';
		$data['datos']				=		$this->productos_model->getProductoId($id);
        //todas las categorias y proveedores para buscar el nombre y mostrarlo   y no el id como aparece en la la bd
 	    $data['categorias'] 		=		$this->categorias_model->getCategorias();
        $data['proveedores']		=		$this->proveedores_model->getProveedores();

        $this->load->view('masterPage/masterPage', $data, FALSE);
	}




	public function delete($id=null,$folder_nav=null,$nav=null)
	{

		$consulta_estado= $this->productos_model->estadoProducto($id);
		if ($consulta_estado == true) {

			$this->session->set_flashdata('ControllerMessage','Registro No Eliminado, producto se encuentra en estado activo');
			redirect(base_url().'productos/index/'.$folder_nav.'/'.$nav,301);
		
		}else
		{
           $consulta= $this->productos_model->deleteProducto($id);
				
		if ($consulta == true) {
			$this->session->set_flashdata('ControllerMessage','Registro Eliminado Correctamente');
			redirect(base_url().'productos/index/'.$folder_nav.'/'.$nav,301);
		} else {
			$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
			redirect(base_url().'productos/index/'.$folder_nav.'/'.$nav,301);
		}
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


	public function search_clientes($folder_nav=null,$nav=null)   
       {

		
		        $criterio             = $this->input->post("criterio");
			    $valor                =    $this->input->post("valor");
		$data['titulo']				  =                    'Ventasoft';
		$data['viewControlador']	  =		                 'pedidos';
		$data['viewNave']	          =                    $folder_nav;
		$data['nave']		    	  =		                      $nav;
		$data['contenido']			  =		         'search_clientes';
		$data['datos']				  =		$this->usuarios_model->searchClientes($criterio,$valor);
		$data['roles'] 	         	  =		$this->roles_model->getRoles();
      
		$this->load->view('masterPage/masterPage', $data);
		
	}

}

/* End of file clientes.php */
/* Location: ./application/controllers/clientes.php */