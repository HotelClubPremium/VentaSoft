<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('personas_model');
		$this->load->model('mapas_model');
	}

	public function index($folder_nav=null,$nav=null)
	{
		if($this->session->userdata('rol') == FALSE)
		{
			redirect(base_url().'login');
		}
		$data['titulo']				=		'Mapas';
		$data['viewControlador']	=		'mapas';
		$data['viewNave']	        =         $folder_nav;
		$data['nave']		    	=		         $nav;
		$data['contenido']			=		      'index';
		$data['datos']				=		       $this->personas_model->getPersonas();
		$this->load->view('masterPage/masterPage', $data);
	
	}

	public function getUbicacion($idPersona,$folder_nav=null,$nav=null)
	{
		$config = array();
		$config['center']= 'valledupar,colombia';
		$config['zoom'] = 'auto';
		$config['map_type'] = 'DROP';
		$config['map_width'] = '80%';		
		$config['map_height'] = '600px';
		$this->googlemaps->initialize($config);	
		$markers = $this->mapas_model->getUbicacion($idPersona);
		foreach($markers as $info_marker)
		{	
			$marker = array();
			$marker ['animation'] = 'BOUNCE';
			$marker ['position'] = $info_marker->latitud.','.$info_marker->longitud;	
			$marker ['infowindow_content'] = $info_marker->nom_persona;
			$marker ['id'] = $info_marker->id_persona; 
			$this->googlemaps->add_marker($marker);			
		}
		$data['map'] = $this->googlemaps->create_map();
		$data['titulo']				=		'Mapas';
		$data['viewControlador']	=		'mapas';
		$data['viewNave']	        =         $folder_nav;
		$data['nave']		    	=		         $nav;
		$data['contenido']			=		      'mapas';
		$this->load->view('masterPage/masterPage', $data);
	}

}

/* End of file mapas.php */
/* Location: ./application/controllers/mapas.php */