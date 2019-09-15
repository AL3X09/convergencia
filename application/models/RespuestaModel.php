<?php

/*
 *
 * @author Alex Cifuentes S.
 *
 */

class RespuestaModel extends CI_Model {
  
  public function __construct() {
    parent:: __construct();
  }
  
 

 /*function listarPreguntas()
 {
  $query = $this->db->get('pregunta');
  return $result = $query->result_array();
 }*/

 /**
   * 
   * @param type $usuario
   * inserto en tabla usaurios
   */
  public function insertar($pkuser,$pkresp) {
      $sql = "INSERT INTO 
               usuario_respuesta(
                fk_usuario,
                fk_respuesta,
                fecha_modifica
          ) 
          VALUES (?,?, CURRENT_TIMESTAMP())";
  
      try {
        
        //$mysqli->set_charset('utf8');
        $stmt = $this->db->conn_id->prepare($sql);
        $stmt->bind_param('ii', $pkuser, $pkresp);
        $pkuser = $pkuser;
        $pkresp = $pkresp;
        $stmt->execute();
        $ultimo_id_generado = $stmt->insert_id;
        $lineas_afectadas = $stmt->affected_rows;
        $stmt->close();
        if ($lineas_afectadas > 0) {
            $r = true;
          } else {
            $r = false;
          }
      } catch (Exception $ex) {
        $stored_exc = $ex;
        print $ex;
        $r = false;
      }
  
      return $r;
    }

}