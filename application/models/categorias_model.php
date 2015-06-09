<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorias_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function insertCategorias($datos=array())					
	{
		$this->db->insert('categorias', $datos);
		return true;
	}

	public function getCategorias()
	{
		$query=$this->db
				->select('*')
				->from('categorias')
				->get();
		return $query->result();
	}

	public function getCategoriasId($id)
	{
		$consulta=array('id_categoria'=>$id);
		$query=$this->db
				->select('*')
				->from('categorias')
				->where($consulta)
				->get();
		return $query->row();
	}

	public function getCategoriasNombre($id)
	{
		$consulta=array('id_categoria'=>$id);
		$query=$this->db
				->select('*')
				->from('categorias')
				->where($consulta)
				->get();
		return $query->row();
	}
	
	public function updateCategorias($datos=array(),$id)
	{
		$this->db->where('id_proveedor', $id);
		$this->db->update('proveedores', $datos);
		return true;
	}

	public function deleteCategorias($id)
	{
		$this->db->where('id_proveedor', $id);
		$this->db->delete('proveedores');
		return true;
	}

}

/* End of file proveedores_model.php */
/* Location: ./application/models/proveedores_model.php */