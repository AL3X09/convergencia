<?php

/*
 *
 * @author Alex Cifuentes S.
 *
 */

class UsuarioModel extends CI_Model {
  
  public function __construct() {
    parent:: __construct();
  }
  
  function listarUser(){
      $this->db->select('usuarios.*,directus_files.filename');
      $this->db->from('tema');
      $this->db->join('directus_files', 'tema.imagen = directus_files.id ');
      $query=$this->db->get();
      return $data=$query->result_array();
 }
 
  function existeUsuario($nmuser) {

    $this->db->from('usuarios');
    $this->db->where('usuario', $nmuser);
    $this->db->where('estado = "Activo"');
    $this->db->limit(1);
    return $this->db->count_all_results();
  }

  function existeCorreo($correo) {

    $this->db->from('usuarios');
    $this->db->where('correo', $correo);
    $this->db->where('estado = "Activo"');
    $this->db->limit(1);
    return $this->db->count_all_results();
  }

  /**
   * 
   * @param type $usuario
   * inserto en tabla usaurios
   */
  public function insertar($usuario) {
    $sql = "INSERT INTO 
             usuarios(
             nombres,
             apellidos,
             correo,
             fklocalidad,
             usuario,
             contrasenia,
             imagen,
             estado,
             fecha_modifica
        ) 
        VALUES (?,?,?,?,?,?,?,?, CURDATE())";

    try {
      
      //$mysqli->set_charset('utf8');
      $stmt = $this->db->conn_id->prepare($sql);
      $stmt->bind_param('sssissss', $Nombres, $Apellidos, $Correo, $Fklocalidad, $Usuario, $Contrasenia, $Img, $Estado);
      $Nombres = $usuario->Nombres;
      $Apellidos = $usuario->Apellidos;
      $Correo = $usuario->Correo;
      $Fklocalidad = $usuario->Fklocalidad;
      $Usuario = $usuario->Usuario;
      $Contrasenia = $this->encrypt->encode($usuario->Contrasenia);
      $Img = $usuario->Imagen;
      $Estado = $usuario->Estado;
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



