<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Vendedor extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		
	}
	
	public function index()
	{
		if($this->session->userdata('rol') == FALSE || $this->session->userdata('rol') == 'Cliente')
		{
			redirect(base_url().'home');
		}
		$data['titulo'] = 'Bienvenido :' .$this->session->userdata('perfil');
		$data['viewControlador']	=	'rolVendedor';
		$data['viewNave']	        =   'rolVendedor';
	    $data['nave']	     		=	'navVendedor';
		$data['contenido']			=	'index';
		$this->load->view('masterPage/masterPage', $data);
	}
}
