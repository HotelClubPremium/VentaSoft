<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pedidos_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function insertPedido($datos=array())
	{
		$this->db->insert('pedidos', $datos);
		return true;
	}



	public function insertDetallePedido($datos=array())
	{
		$this->db->insert('detalle_pedidos', $datos);
		return true;
	}

	public function newCodigoPedido()
	{
		$query=$this->db
				->select_max('id_pedido')
				->from('pedidos')
				->get();
	
		   foreach ($query->result() as $fila)
			{
			    return $fila->id_pedido;
			}
	}

	public function getPedidos()
	{
		$query=$this->db
				->select('*')
				->from('pedidos')
				->get();
		return $query->result();
	}


	public function getEstados()
	{
		$query=$this->db
				->select('*')
				->from('estados')
				->get();
		return $query->result();
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

	public function searchProductos($criterio,$valor)
	{
		$consulta=array($criterio=>$valor);
		

		$query=$this->db
				->select('*')
				->from('productos')
				->like($consulta)
				->get();
		return $query->result();
	}

		public function search_pedidos_realizados($criterio,$valor)
	{
		$consulta=array($criterio=>$valor);
		

		$query=$this->db
				->select('*')
				->from('pedidos')
				->like($consulta)
				->get();
		return $query->result();
	}


	public function getPedidos_Detalles($id)
	{
		$query = $this->db
		       ->select('detalle_pedidos.id_pedido,detalle_pedidos.id_producto,productos.nom_producto,detalle_pedidos.cantidad,detalle_pedidos.valor_unitario')
               ->from('detalle_pedidos')
               ->join('productos','productos.id_producto = detalle_pedidos.id_producto')
               ->get();
        return $query->result();
	}

	public function getPedidos_DetallesJoin()
	{
		$query=$this->db
				->select('*')
				->from('detalle_pedidos')
				->get();
		return $query->result();
	}


	
	public function estadoProducto($id)
	{
		$consulta=array('id_producto'=>$id,
			            'estado'=>"Activo");
		$query=$this->db
				->select('*')
				->from('productos')
				->where($consulta)
				->get();
			
		      if ($query->num_rows > 0) 
		      {
		          return true;
	          }else
	          {
                  return false;
	          }

	}

	public function productoProveedor($id_proveedor)
	{
		$consulta=array('id_proveedor'=>$id_proveedor);
		$query=$this->db
				->select('*')
				->from('productos')
				->where($consulta)
				->get();
			
		      if ($query->num_rows > 0) 
		      {
		          return true;
	          }else
	          {
                  return false;
	          }

	}

	public function validarExistenciaProductoId($id)
	{
		$consulta=array('id_producto'=>$id);
		$query=$this->db
				->select('*')
				->from('productos')
				->where($consulta)
				->get();
			
		      if ($query->num_rows > 0) 
		      {
		          return true;
	          }else
	          {
                  return false;
	          }

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