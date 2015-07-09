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
		$consulta=array('rol'=>"Cliente");
		$query = $this->db
		       ->select('usuarios.id_usuario,usuarios.rol,usuarios.user,usuarios.acceso,usuarios.id_persona,personas.nom_persona')
               ->from('usuarios')
               ->join('personas','personas.id_persona = usuarios.id_persona')
               ->where($consulta)
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