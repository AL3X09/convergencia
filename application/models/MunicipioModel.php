<?php

/*
 *
 * @author Alex Cifuentes S.
 *
 */

class MunicipioModel extends CI_Model {
  
  public function __construct() {
    parent:: __construct();
  }
  
 

 function listarMunicipio()
 {
     $query = $this->db->get('municipio');
     $this->db->where('fk_departamento', 6);
     $result = $query->result_array();

     $muni_position = array(); 
     foreach($result as $r) { 
         $muni_position[$r['id']] = $r['nombre']; 
     } 
     $muni_position[''] = 'Seleccione una localidad...'; 
     return $muni_position; 
 }

 
}



