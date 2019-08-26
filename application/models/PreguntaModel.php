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
  //$result['temas'] = array('');
  //$result['preguntas'] = array('');

  $this->db->distinct();
  $this->db->select('tema.id,tema.nombre');
  $this->db->from('tema');
  $this->db->join('pregunta', ' tema.id = pregunta.fk_tema');
  $query=$this->db->get();
  //$result = $query->result_array();
  $result = $query->result_array();
 // loop through the types e.g. the parents
 foreach( $result as $key => $row )
 {
  
     // add the "examples" e.g. the children to the result array
     $this->db->distinct();
     $this->db->select('pregunta.*');
     $this->db->from('pregunta');
     $this->db->join('respuesta', ' pregunta.id = respuesta.fk_pregunta');
     $this->db->where('pregunta.fk_tema',$row['id']);
     $query2=$this->db->get();
     $result2 = $query2->result_array();
     
     //$result['preguntas'] =$query2->result_array();
     // loop through the types e.g. the parents
     foreach( $result2 as $key2 => $row2)
           {
            //echo $key2;
            //$row2['respuestas'] = array('');
            //$result[$key]['preguntas'] = array('');
            //echo $key;

            $this->db->distinct();
            $this->db->select('respuesta.*');
            $this->db->from('respuesta');
            $this->db->join('pregunta', ' respuesta.fk_pregunta = pregunta.id');
            $this->db->where('respuesta.fk_pregunta',$row['id']);
            $query3=$this->db->get();
            $row2['respuestas'] = $query3->result_array();
            $result[$key][$key2] = $row2;

      }

 }

 return $result;
 }

}