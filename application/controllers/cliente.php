<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Cliente extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index()
	{
		if($this->session->userdata('rol') == FALSE)
		{
			redirect(base_url().'login');
		}
		$data['titulo'] = 'Bienvenido :' .$this->session->userdata('rol');
		$data['viewControlador']	=	'roles';
	    $data['nave']	     		=	'cliente/navcliente';
		$data['contenido']			=	'cliente/index';
		$this->load->view('masterPage/masterPage', $data);
	}
}
