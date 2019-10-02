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
      $this->db->select('usuarios.*,directus_files.filename');
      $this->db->from('tema');
      $this->db->join('directus_files', 'tema.imagen = directus_files.id ');
      $query=$this->db->get();
      return $data=$query->result_array();
 }
 
  function listarCandidatoSeleccion($user, $sesion) {
    $query = $this->db->query("CALL CandidatoRespuestasResult($user, $sesion)");
    return $query->result();
  }
 
}