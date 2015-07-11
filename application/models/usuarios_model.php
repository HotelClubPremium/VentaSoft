<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
    
    /* modelo d usuarios  */

	public function insertUsuario($datos_usuarios=array())
	{
		$this->db->insert('usuarios', $datos_usuarios);
		return true;
	}

	public function getUsuarios()
	{
		$query=$this->db
				->select('*')
				->from('usuarios')
				->get();
		return $query->result();
	}

	public function getUsuariosJoin()
	{
		$query = $this->db
		       ->select('usuarios.id_usuario,usuarios.rol,usuarios.user,usuarios.acceso,usuarios.id_persona,personas.nom_persona')
               ->from('usuarios')
               ->join('personas','personas.id_persona = usuarios.id_persona')
               ->get();
        return $query->result();
	}


// Produce: 
// SELECT * FROM blogs
// JOIN comentarios ON comentarios.id = blogs.id

	public function getUsuarioId($id)
	{
		$consulta=array('id_usuario'=>$id);
		$query = $this->db
		       ->select('usuarios.id_usuario,usuarios.rol,usuarios.user,usuarios.acceso,usuarios.id_persona,personas.nom_persona,personas.ape_persona,personas.sexo,personas.fecha_nacimiento,personas.direccion,personas.correo,personas.telefono')
               ->from('usuarios')
               ->join('personas','personas.id_persona = usuarios.id_persona')
               ->where($consulta)
               ->get();
		return $query->row();
	}

public function searchIdUsuario($id)
	{
		$consulta=array('id_usuario'=>$id);
		$query=$this->db
				->select('id_persona')
				->from('usuarios')
				->where($consulta)
				->get();
		return $query->row();
	}


	public function searchId_perosna($id)
	{
		$consulta=array('id_usuario'=>$id);
		$query=$this->db
				->select('id_persona')
				->from('usuarios')
				->where($consulta)
				->get();
		   foreach ($query->result() as $fila)
			{
			    return $fila->id_persona;
			}
	}
	

	public function searchUsuarios($criterio,$valor)
	{
        $consulta=array($criterio=>$valor);
		$query = $this->db
		       ->select('usuarios.id_usuario,usuarios.rol,usuarios.user,usuarios.acceso,usuarios.id_persona,personas.nom_persona')
               ->from('usuarios')
               ->join('personas','personas.id_persona = usuarios.id_persona')
               ->like($consulta)
               ->get();
        return $query->result();
		
	}


	public function searchClientes($criterio,$valor)
	{
        $consulta=array($criterio=>$valor,
        	            "rol"=>"Cliente");
		$query = $this->db
		       ->select('usuarios.id_usuario,usuarios.rol,usuarios.user,usuarios.acceso,usuarios.id_persona,personas.nom_persona')
               ->from('usuarios')
               ->join('personas','personas.id_persona = usuarios.id_persona')
               ->like($consulta)
               ->get();
        return $query->result();
		
	}

	public function validarExistenciaUsuarioId($id)
	{
		$consulta=array('id_usuario'=>$id);
		$query=$this->db
				->select('*')
				->from('usuarios')
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

	public function updateUsuario($datos=array(),$id)
	{
		$this->db->where('id_usuario', $id);
		$this->db->update('usuarios', $datos);
		return true;
	}

	public function deleteUsuario($id)
	{
		$this->db->where('id_usuario', $id);
		$this->db->delete('usuarios');
		return true;
	}

}

/* End of file clientesModel.php */
/* Location: ./application/models/clientesModel.php */