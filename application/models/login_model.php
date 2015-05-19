<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Login_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function login_user($user,$pass)
	{
		$this->db->where('user',$user);
		$this->db->where('pass',$pass);
		$query = $this->db->get('usuarios');
		if($query->num_rows() == 1)
		{
			return $query->row();
		}else{
			$this->session->set_flashdata('usuario_incorrecto','Credenciales de inicio session no validos, verifique e intente nuevamente');
			redirect(base_url().'login','refresh');
		}
	}
}
