<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapas_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function getUbicacion($idPersona)
	{
		$query=$this->db
				->select("g.id_persona,g.latitud,g.longitud,g.fecha,p.nom_persona")
				->from("geolocalizacion g")
				->join("personas p","g.id_persona = p.id_persona","inner")
				->where(array('g.id_persona'=>$idPersona))
				->get();
		return $query->result();
	}

}

/* End of file mapas_model.php */
/* Location: ./application/models/mapas_model.php */