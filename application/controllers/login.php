<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: isra
 * Date: 19/01/13
 * Time: 18:51
 * To change this template use File | Settings | File Templates.
 */
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('login_model');
    }
	
	public function index()
	{	
		switch ($this->session->userdata('perfil')) {
			case '':	
						$data['token'] = $this->token();
						$data['titulo']				= 	'Inicio Session';
						$data['viewControlador']	=	'login';
					    $data['nave']	     		=	'navLogin';
						$data['contenido']			=	'index';
						$this->load->view('masterPage/masterPage', $data);	

				break;
			case 'Administrador':
				redirect(base_url().'admin');
				break;
			case 'Vendedor':
				redirect(base_url().'vendedor');
				break;	
			case 'Cliente':
				redirect(base_url().'cliente');
				break;
			default:		
				        $data['titulo']				= 	'Inicio Session';
						$data['viewControlador']	=	'login';
					    $data['nave']	     		=	'navLogin';
						$data['contenido']			=	'index';
						$this->load->view('masterPage/masterPage', $data);	
				break;		
		}
	}
	
	public function token()
	{
		$token = md5(uniqid(rand(),true));
		$this->session->set_userdata('token',$token);
		return $token;
	}
	
	public function new_user()
	{
		if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token'))
		{
            $this->form_validation->set_rules('username', 'nombre de usuario', 'required|trim|min_length[2]|max_length[150]|xss_clean');
            $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[5]|max_length[150]|xss_clean');
 
            //lanzamos mensajes de error si es que los hay
            $this->form_validation->set_message('required', 'El %s es requerido');
            $this->form_validation->set_message('min_length', 'El %s debe tener al menos %s carácteres');
            $this->form_validation->set_message('max_length', 'El %s debe tener al menos %s carácteres');
			if($this->form_validation->run() == FALSE)
			{
				$this->index();
			}else{
				$username = $this->input->post('username');
				$password = sha1($this->input->post('password'));
				$check_user = $this->login_model->login_user($username,$password);
				if($check_user == TRUE)
				{
					$data = array(
	                'is_logued_in' 	=> 		TRUE,
	                'id_usuario' 	=> 		$check_user->id,
	                'perfil'		=>		$check_user->perfil,
	                'username' 		=> 		$check_user->username,
	                'email' 		=> 		$check_user->email
            		);		
					$this->session->set_userdata($data);
					$this->index();
				}
			}
		}else{
			redirect(base_url().'login');
		}
	}

	public function logout_ci()
	{
		$this->session->sess_destroy();
		$this->index();
	}
}
