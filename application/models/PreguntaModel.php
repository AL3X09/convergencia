<?php

/*
 *
 * @author Alex Cifuentes S.
 *
 */

class PreguntaModel extends CI_Model {
  
  public function __construct() {
    parent:: __construct();
  }
  
 

 function listarPreguntas()
 {
  $query = $this->db->get('pregunta');
  return $result = $query->result_array();
 }

 function listarPreguntasXTema()
 {
  $this->db->select('pregunta.*,respuesta.*');
  $this->db->from('pregunta');
  $this->db->join('tema', 'pregunta.fk_tema = tema.id');
  $this->db->join('respuesta', 'pregunta.id = respuesta.fk_pregunta');
  $query=$this->db->get();
  return $result = $query->result_array();
 }

 
}



