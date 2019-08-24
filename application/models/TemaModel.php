<?php

/*
 *
 * @author Alex Cifuentes S.
 *
 */

class TemaModel extends CI_Model {
  
  public function __construct() {
    parent:: __construct();
  }
  
  function listarTemas()
 {
      $this->db->select('tema.*,directus_files.filename');
      $this->db->from('tema');
      $this->db->join('directus_files', 'tema.imagen = directus_files.id ');
      $query=$this->db->get();
      return $data=$query->result_array();
 }

 function listarTemas1()
 {
     $query = $this->db->get('tema');
     $this->db->join('directus_files', 'directus_files.id = tema.imagen');
     return $result = $query->result_array();

     /*$muni_position = array(); 
     foreach($result as $r) { 
         $muni_position[$r['id']] = $r['nombre']; 
     } 
     $muni_position[''] = 'Seleccione una localidad...'; 
     return $muni_position; //**/
 }

 
}



