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
		$data['titulo']             =   'Bienvenido Cliente';
		$data['viewControlador']	=	'rolCliente';
		$data['viewNave']	        =   'rolCliente';
	    $data['nave']	     		=	'navcliente';
		$data['contenido']			=	'index';
		$this->load->view('masterPage/masterPage', $data);
	}
}
