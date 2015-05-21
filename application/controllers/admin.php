<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Admin extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index()
	{
		if($this->session->userdata('rol') == FALSE || $this->session->userdata('rol') != 'Administrador')
		{
			redirect(base_url().'login');
		}

		$data['titulo']				= 	'Bienvenido Administrador';
		$data['viewControlador']	=	'rolAdmin';
		$data['viewNave']	        =   'rolAdmin';
	    $data['nave']	     		=	'navAdmin';
		$data['contenido']			=	'index';
		$this->load->view('masterPage/masterPage', $data);
		
	}
}
