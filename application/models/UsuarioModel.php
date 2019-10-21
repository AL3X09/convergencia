<?php
include 'application/vo/tbusuarios.php';

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
        VALUES (?,?,?,?,?,?,?,?, CURRENT_TIMESTAMP())";

    try {
      
      //$mysqli->set_charset('utf8');
      $stmt = $this->db->conn_id->prepare($sql);
      $stmt->bind_param('sssissss', $Nombres, $Apellidos, $Correo, $Fklocalidad, $Usuario, $Contrasenia, $Img, $Estado);
      $Nombres = $usuario->Nombres;
      $Apellidos = $usuario->Apellidos;
      $Correo = $usuario->Correo;
      $Fklocalidad = $usuario->Fklocalidad;
      $Usuario = $usuario->Usuario;
      $Contrasenia = $this->encryption->encrypt($usuario->Contrasenia);
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

  /**
   * @param type $id_aspirante
   * @return type
   * @author Alex Cifeuntes Sanchez
   * metodo lista aspirantes faltantaes por decicion en junta
   */

  function verificarAspirante($Cuenta_User) {
    $usuario = new tbusuarios();
    

    $sql = "SELECT *
            FROM usuarios
            WHERE usuario = ?  
            AND estado = 'Activo'";

    try {
      $stmt = $this->db->conn_id->prepare($sql);
      $stmt->bind_param('s', $Cuenta_User);
      $stmt->execute();
      $stmt->bind_result($usuario->id, $usuario->nombres, $usuario->apellidos, $usuario->correo, $usuario->localidad, $usuario->usuario, $usuario->contrasenia, $usuario->imagen, $usuario->estado, $usuario->fecha);
      //$stmt->bind_result($id, $nombres, $apellidos, $correo, $localidad, $usuario, $contrasenia, $imagen, $estado, $fecha);
      $stmt->fetch();
      $stmt->close();
    } catch (Exception $ex) {
      print_r("Excepcion");
      print $ex;
    }
    return $usuario;
  }

 
}