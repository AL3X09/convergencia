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
   * OJO SE MODIFICO NO SE USA POR EL MOMENTO
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

  /**
   * 
   * @param type $usuario
   * actualiza la tabla de respuesta x usuarios
   */
  public function update($pkuser,$pkresp, $k, $conser) {

    $sql = "UPDATE usuario_respuesta
    SET fk_respuesta= ?, fecha_modifica = CURRENT_TIMESTAMP()
    WHERE fk_usuario = ? AND conser_sesion =? AND fk_respuesta =?"; 
             
    try {
      
      $stmt = $this->db->conn_id->prepare($sql);
      $stmt->bind_param('iiii', $pkresp, $pkuser, $conser,$k);
      $pkuser = $pkuser;
      $pkresp = $pkresp;
      $conser = $conser;
      $k = $k;
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