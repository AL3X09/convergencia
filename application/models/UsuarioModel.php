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
  
  function listarTemas()
 {
      $this->db->select('tema.*,directus_files.filename');
      $this->db->from('tema');
      $this->db->join('directus_files', 'tema.imagen = directus_files.id ');
      $query=$this->db->get();
      return $data=$query->result_array();
 }
 function existeNumeroDocumentoProcesoIncorporacionActivo($numerodoc) {

    $this->db->from('usuarios');
    $this->db->where('usuario', $numerodoc);
    $this->db->where('estadoAspirantestado = activo');
    $this->db->limit(1);
    return $this->db->count_all_results();
  }

/**
   * 
   * @param type $aspirante
   * inserto en tabla
   */
  public function insertar($aspirante) {
    $sql = "INSERT INTO 
             tbaspirantes(
             fkNacionalidad,
             fkTipoDocumentoIdntdd,
             Identificacion_Aspirante,
             Primer_Nombre,
             Segundo_Nombre,
             Primer_Apellido,
             Segundo_Apellido,
             pkDistrito,
             FechaNac_Aspirante,
             Email_Aspirante,
             fkSexo,
             fkEdoCivil,
             fkNivelAcademico,
             Telefono_Residencia,
             Telefono_Celular,
             Telefono_Otro,
             fkProcesoIncorporacion,
             Cuenta_Aspirante,
             Contrasena_Aspirante,             
             flEstado,
             fechaInscribe,
             estadoAspiranteProcesoIncorporacion,
             esInfanteMarinaProfesinal
        ) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?, CURDATE(),1,?)";

    try {
      //$mysqli->set_charset('utf8');
      $stmt = $this->db->conn_id->prepare($sql);
      $stmt->bind_param('iisssssissiiisssissii', $fkNacionalidad, $fkTipoDocumentoIdntdd, $Identificacion_Aspirante, $Primer_Nombre, $Segundo_Nombre, $Primer_Apellido, $Segundo_Apellido, $pkDistrito, $FechaNac_Aspirante, $Email_Aspirante, $fkSexo, $fkEdoCivil, $fkNivelAcademico, $Telefono_Residencia, $Telefono_Celular, $Telefono_Otro, $fkProcesoIncorporacion, $Cuenta_Aspirante, $Contrasena_Aspirante, $flEstado, $esInfanteMarinaProfesional);
      $fkNacionalidad = $aspirante->fkNacionalidad;
      $fkTipoDocumentoIdntdd = $aspirante->fkTipoDocumentoIdntdd;
      $Identificacion_Aspirante = $aspirante->Identificacion_Aspirante;
      $Primer_Nombre = $aspirante->Primer_Nombre;
      $Segundo_Nombre = $aspirante->Segundo_Nombre;
      $Primer_Apellido = $aspirante->Primer_Apellido;
      $Segundo_Apellido = $aspirante->Segundo_Apellido;
      $pkDistrito = $aspirante->pkDistrito;
      $FechaNac_Aspirante = $aspirante->FechaNac_Aspirante;
      $Email_Aspirante = $aspirante->Email_Aspirante;
      $fkSexo = $aspirante->fkSexo;
      $fkEdoCivil = $aspirante->fkEdoCivil;
      $fkNivelAcademico = $aspirante->fkNivelAcademico;
      $Telefono_Residencia = $aspirante->Telefono_Residencia;
      $Telefono_Celular = $aspirante->Telefono_Celular;
      $Telefono_Otro = $aspirante->Telefono_Otro;
      $fkProcesoIncorporacion = $aspirante->fkProcesoIncorporacion;
      $Cuenta_Aspirante = $aspirante->Cuenta_Aspirante;
      $Contrasena_Aspirante = $this->encryption->encrypt($aspirante->Contrasena_Aspirante);
      $flEstado = $aspirante->flEstado;
      $esInfanteMarinaProfesional = $aspirante->infanteMarinaProfesional;
      $stmt->execute();
      $ultimo_id_generado = $stmt->insert_id;
      $lineas_afectadas = $stmt->affected_rows;
      $stmt->close();

      if ($lineas_afectadas > 0) {
        $sql2 = "INSERT INTO tbchequeomenu(fkAspirante) VALUES (?)";
        $stmt2 = $this->db->conn_id->prepare($sql2);
        $stmt2->bind_param('i', $ultimo_id_generado);
        $stmt2->execute();
        $lineas_afectadas2 = $stmt2->affected_rows;
        if ($lineas_afectadas2 > 0) {
          $r = true;
        } else {
          $r = false;
        }
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



