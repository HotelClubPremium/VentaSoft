<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personas_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

  	public function insertPersona($datos_usuarios=array())
	{
		$this->db->insert('personas', $datos_usuarios);
		return true;
	}

	public function getPersonas()
	{
		$query=$this->db
				->select('*')
				->from('personas')
				->get();
		return $query->result();
	}

	public function getPersonaId($id)
	{
		$consulta=array('id_persona'=>$id);
		$query=$this->db
				->select('*')
				->from('personas')
				->where($consulta)
				->get();
		return $query->row();
	}

	public function searchPersonas($criterio,$valor)
	{
		$consulta=array($criterio=>$valor);
		

		$query=$this->db
				->select('*')
				->from('personas')
				->like($consulta)
				->get();
		return $query->result();
	}

	public function validarExistenciaPersonaId($id)
	{
		$consulta=array('id_persona'=>$id);
		$query=$this->db
				->select('*')
				->from('personas')
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

	public function updatePersona($datos=array(),$id)
	{
		$this->db->where('id_persona', $id);
		$this->db->update('personas', $datos);
		return true;
	}

	public function deletePersona($id)
	{
		$this->db->where('id_persona', $id);
		$this->db->delete('personas');
		return true;
	}


     
}

/* End of file clientesModel.php */
/* Location: ./application/models/clientesModel.php */