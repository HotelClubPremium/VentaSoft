<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Roles_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function insertRol($datos=array())					
	{
		$this->db->insert('roles', $datos);
		return true;
	}

	public function getRoles()
	{
		$query=$this->db
				->select('*')
				->from('roles')
				->get();
		return $query->result();
	}

	public function getRolId($id)
	{
		$consulta=array('id_rol'=>$id);
		$query=$this->db
				->select('*')
				->from('roles')
				->where($consulta)
				->get();
		return $query->row();
	}

	public function getRolNombre($id)
	{
		$consulta=array('id_rol'=>$id);
		$query=$this->db
				->select('*')
				->from('roles')
				->where($consulta)
				->get();
		return $query->row();
	}
	
	public function updateRol($datos=array(),$id)
	{
		$this->db->where('id_rol', $id);
		$this->db->update('roles', $datos);
		return true;
	}

	public function deleteRol($id)
	{
		$this->db->where('id_rol', $id);
		$this->db->delete('roles');
		return true;
	}

}

/* End of file proveedores_model.php */
/* Location: ./application/models/proveedores_model.php */