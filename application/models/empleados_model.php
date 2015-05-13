<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empleados_model extends CI_Model {

    public function __construct()
	{
		parent::__construct();
	}

	public function insertEmpleados($datos=array())
	{
		$this->db->insert('empleados', $datos);
		return true;
	}

	public function getEmpleados()
	{
		$query=$this->db
				->select('*')
				->from('empleados')
				->get();
		return $query->result();
	}

	public function getEmpleadosId($id)
	{
		$consulta=array('id_empleado'=>$id);
		$query=$this->db
				->select('*')
				->from('empleados')
				->where($consulta)
				->get();
		return $query->row();
	}

	public function updateEmpleados($datos=array(),$id)
	{
		$this->db->where('id_empleado', $id);
		$this->db->update('empleados', $datos);
		return true;
	}

	public function deleteEmpleados($id)
	{
		$this->db->where('id_empleado', $id);
		$this->db->delete('empleados');
		return true;
	}

}

/* End of file empleados_model.php */
/* Location: ./application/models/empleados_model.php */