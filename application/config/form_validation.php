<?php 

$config = array(

		/**
		* Formulario
		*/

		'formulario/add'	=>	array(
			array('field' => 'id',			'label'=> 'Id',				'rules' => 'required|is_string|trim|xss_clean'),
			array('field' => 'nombre',		'label'=> 'Nombre', 		'rules' => 'required|is_string|trim|xss_clean'),
			array('field' => 'direccion', 	'label'=> 'Direccion', 		'rules' => 'required|is_string|trim|xss_clean'),
			array('field' => 'telefono', 	'label'=> 'Telefono', 		'rules' => 'required|numeric|trim|xss_clean'),			
			array('field' => 'correo', 		'label'=> 'Correo', 		'rules' => 'required|valid_email|trim|xss_clean'),
			array('field' => 'sexo', 		'label'=> 'Sexo', 			'rules' => 'required|xss_clean|validaSelect')
			),

        'vali_search'	=> array(
			array('field' => 'criterio',	   'label'=> 'criterio',	    	'rules' => 'required|is_string|trim|xss_clean',),
			array('field' => 'valor',          'label'=> 'valor', 		        'rules' => 'required|is_string|trim|xss_clean')
			
	                              ),

		'vali_Proveedores'	=> array(
			array('field' => 'id_proveedor',	    'label'=> 'id_proveedor',				'rules' => 'required|is_string|trim|xss_clean'),
			array('field' => 'nom_proveedor',		'label'=> 'nom_proveedor', 		        'rules' => 'required|is_string|trim|xss_clean'),
			array('field' => 'ape_proveedor',		'label'=> 'ape_proveedor', 	         	'rules' => 'required|is_string|trim|xss_clean'),
			array('field' => 'telefono', 	        'label'=> 'telefono', 		            'rules' => 'required|numeric|trim|xss_clean'),			
			array('field' => 'correo', 		        'label'=> 'correo', 		            'rules' => 'required|valid_email|trim|xss_clean')
			),

	    'vali_Productos'	=> array(
			array('field' => 'id_producto',	   'label'=> 'id_producto',	    	'rules' => 'required|is_string|trim|xss_clean',),
			array('field' => 'nom_producto',   'label'=> 'nom_producto', 		'rules' => 'required|is_string|trim|xss_clean'),
			array('field' => 'cantidad', 	   'label'=> 'cantidad',            'rules' => 'required|numeric|trim|xss_clean'),			
			array('field' => 'valor_producto', 'label'=> 'valor_producto', 		'rules' => 'required|numeric|trim|xss_clean'),	
			array('field' => 'id_categoria',   'label'=> 'id_categoria', 		'rules' => 'required|trim|xss_clean'),
			array('field' => 'id_proveedor',   'label'=> 'id_proveedor', 		'rules' => 'required|trim|xss_clean')		
	
	                                ),
	    'vali_Personas'	=> array(
			array('field' => 'id_persona',	       'label'=> 'id_persona',	    	'rules' => 'required|is_string|trim|xss_clean',),
			array('field' => 'nom_persona',        'label'=> 'nom_persona', 		'rules' => 'required|is_string|trim|xss_clean'),
			array('field' => 'ape_persona', 	   'label'=> 'ape_persona',         'rules' => 'required|is_string|trim|xss_clean'),			
			array('field' => 'sexo',               'label'=> 'sexo', 		        'rules' => 'required|is_string|trim|xss_clean'),	
			array('field' => 'fecha_nacimiento',   'label'=> 'fecha_nacimiento',	'rules' => 'required|trim|xss_clean'),
			array('field' => 'direccion',          'label'=> 'direccion', 	        'rules' => 'required|trim|xss_clean'),
			array('field' => 'correo',             'label'=> 'correo', 		        'rules' => 'required|valid_email|xss_clean'),
			array('field' => 'telefono',           'label'=> 'telefono', 	        'rules' => 'required|numeric|xss_clean')		
	
	                                ),
	    'vali_Usuarios'	=> array(
			array('field' => 'id_usuario',	   'label'=> 'id_producto',	    	'rules' => 'required|is_string|trim|xss_clean',),
			array('field' => 'rol',            'label'=> 'rol',         		'rules' => 'required|is_string|trim|xss_clean'),
			array('field' => 'user', 	       'label'=> 'user',                'rules' => 'required|is_string|trim|xss_clean'),			
			array('field' => 'acceso',         'label'=> 'acceso', 	        	'rules' => 'required|numeric|trim|xss_clean'),	
			array('field' => 'id_persona',     'label'=> 'id_persona', 		    'rules' => 'required|trim|is_string|xss_clean')
	
	                                ),
	     
	    
	    'empleados/add'	=>	array(
			array('field' => 'id',			'label'=> 'Id',				'rules' => 'required|is_string|trim|xss_clean'),
			array('field' => 'nombre',		'label'=> 'Nombre', 		'rules' => 'required|is_string|trim|xss_clean'),
			array('field' => 'apellido',	'label'=> 'Apellido', 		'rules' => 'required|is_string|trim|xss_clean'),
			array('field' => 'direccion', 	'label'=> 'Direccion', 		'rules' => 'required|is_string|trim|xss_clean'),
			array('field' => 'telefono', 	'label'=> 'Telefono', 		'rules' => 'required|numeric|trim|xss_clean'),			
			array('field' => 'correo', 		'label'=> 'Correo', 		'rules' => 'required|valid_email|trim|xss_clean'),
			//array('field' => 'fecha', 		'label'=> 'Fecha', 		    'rules' => 'required|valid_email|trim|xss_clean'),
			array('field' => 'sexo', 		'label'=> 'Sexo', 			'rules' => 'required|xss_clean|validaSelect')
			)


		)

 ?>