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
 function listarTemasXNombre()
 {
      $this->db->select('tema.id,tema.nombre');
      $this->db->from('tema');
      $query=$this->db->get();
      return $data=$query->result_array();
 }

 function listarTemasXNombreXUsuario($fk_usuario)
 {

      $this->db->select('tema.id,tema.nombre');
      $this->db->from('tema');
      $this->db->join('usuario_tema', ' tema.id = usuario_tema.fk_tema');
      $this->db->where('usuario_tema.fk_usuario',$fk_usuario);
      $query=$this->db->get();
      return $data=$query->result_array();
 }

/**
   * 
   * @param type $usuario
   * inserto en tabla usaurios
   */
  public function insertar($pkuser,$pktema) {
    $sql = "INSERT INTO 
             usuario_tema(
              fk_usuario,
              fk_tema,
              fecha_modifica
        ) 
        VALUES (?,?, CURRENT_TIMESTAMP())";

    try {
      
      //$mysqli->set_charset('utf8');
      $stmt = $this->db->conn_id->prepare($sql);
      $stmt->bind_param('ii', $pkuser, $pktema);
      $pkuser = $pkuser;
      $pktema = $pktema;
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



