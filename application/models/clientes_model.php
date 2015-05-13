<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function insertClientes($datos=array())
	{
		$this->db->insert('clientes', $datos);
		return true;
	}

	public function getClientes()
	{
		$query=$this->db
				->select('*')
				->from('clientes')
				->get();
		return $query->result();
	}

	public function getClientesId($id)
	{
		$consulta=array('id_cliente'=>$id);
		$query=$this->db
				->select('*')
				->from('clientes')
				->where($consulta)
				->get();
		return $query->row();
	}

	public function updateClientes($datos=array(),$id)
	{
		$this->db->where('id_cliente', $id);
		$this->db->update('clientes', $datos);
		return true;
	}

	public function deleteClientes($id)
	{
		$this->db->where('id_cliente', $id);
		$this->db->delete('clientes');
		return true;
	}
}

/* End of file clientesModel.php */
/* Location: ./application/models/clientesModel.php */