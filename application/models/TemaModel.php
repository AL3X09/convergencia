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
      $this->db->distinct('tema.id');
      $this->db->select('tema.*,directus_files.filename');
      $this->db->from('tema');
      $this->db->join('directus_files', 'tema.imagen = directus_files.id');
      $this->db->join('pregunta', 'tema.id = pregunta.fk_tema');
      $query=$this->db->get();
      //print_r($query);
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

 function ultimoconsect_sesion() {
  //$query = $this->db->query("SELECT (conset_sesion)+1 AS val FROM convergencia.usuario_tema WHERE conset_sesion IS NOT NULL ORDER BY id DESC LIMIT 1");
  $query = $this->db->query("SELECT CASE
        WHEN COUNT(conset_sesion) = 0 THEN 1		
          ELSE MAX(conset_sesion)+1 
          END AS val
        FROM
          convergencia.usuario_tema
          ORDER BY id DESC LIMIT 1");

  $ret = $query->row();
  return $ret->val;
 }

/**
   * 
   * @param type $usuario
   * inserto en tabla usaurios
   */
  public function insertar($pkuser,$pktema,$consect) {
    $sql = "INSERT INTO 
             usuario_tema(
              fk_usuario,
              fk_tema,
              fecha_modifica,
              conset_sesion
        ) 
        VALUES (?,?, CURRENT_TIMESTAMP(),$consect)";

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
          
          $query2 = $this->db->query("SELECT pregunta.id FROM convergencia.pregunta 
          WHERE fk_tema = $pktema");
         
          if($query2->result() > 0 ){
            
            foreach ($query2->result() as $row)
            {
              //print_r($row);

                  $sql2 = "INSERT INTO 
                  usuario_respuesta(
                    fk_usuario,
                    fk_respuesta,
                    fecha_modifica,
                    conser_sesion
                  ) 
                  VALUES (?,$row->id, CURRENT_TIMESTAMP(),?)";
                
                  $stmt2 = $this->db->conn_id->prepare($sql2);
                  $stmt2->bind_param('ii', $pkuser, $consect);
                  $pkuser = $pkuser;
                  $consect = $consect;
                  $stmt2->execute();
                  $stmt2->close();

            }

          }
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



