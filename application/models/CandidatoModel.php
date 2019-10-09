<?php
//include 'application/vo/tbusuarios.php';

/*
 *
 * @author Alex Cifuentes S.
 *
 */

class CandidatoModel extends CI_Model {
  
  public function __construct() {
    parent:: __construct();
  }
  
  function listarCandidatos(){
      $this->db->select('candidato.nombres,apellidos,descripcion,link_pagina,directus_files.filename');
      $this->db->from('candidato');
      $this->db->join('directus_files', 'candidato.imagen = directus_files.id ');
      $query=$this->db->get();
      return $data=$query->result_array();
 }
 
  function listarCandidatoSeleccion($user, $sesion) {
    $query = $this->db->query("CALL CandidatoRespuestasResult($user, $sesion)");
    return $query->result();
  }

  function getCandidato($fk_candidato){
    $this->db->select('candidato.*,directus_files.filename');
    $this->db->from('candidato');
    $this->db->join('directus_files', 'candidato.imagen = directus_files.id ');
    $this->db->join('coalicion', 'candidato.id = coalicion.candidato_id ');
    $this->db->join('partido_politico', 'coalicion.partido_id = partido_politico.id ');
    $this->db->where('candidato.id',$fk_candidato);
    $query=$this->db->get();
    return $data=$query->result_array();
}
 
}