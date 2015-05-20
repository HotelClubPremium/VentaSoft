<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$data['titulo']				= 	'Home';
		$data['viewControlador']	=	'home';
		$data['viewNave']	        =   'home';
	    $data['nave']	     		=	'navHome';
		$data['contenido']			=	'index';
		$this->load->view('masterPage/masterPage', $data);
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */