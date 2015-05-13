<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productos_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function insertProducto($datos=array())
	{
		$this->db->insert('productos', $datos);
		return true;
	}

	public function getProductos()
	{
		$query=$this->db
				->select('*')
				->from('productos')
				->get();
		return $query->result();
	}

	public function getProductoId($id)
	{
		$consulta=array('id_producto'=>$id);
		$query=$this->db
				->select('*')
				->from('productos')
				->where($consulta)
				->get();
		return $query->row();
	}

	public function updateProducto($datos=array(),$id)
	{
		$this->db->where('id_producto', $id);
		$this->db->update('productos', $datos);
		return true;
	}

	public function deleteProducto($id)
	{
		$this->db->where('id_producto', $id);
		$this->db->delete('productos');
		return true;
	}
}

/* End of file clientesModel.php */
/* Location: ./application/models/clientesModel.php */