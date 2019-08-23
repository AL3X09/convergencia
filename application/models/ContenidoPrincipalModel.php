<?php

/*
 *
 * @author Alex Cifuentes S.
 *
 */

class ContenidoPrincipalModel extends CI_Model {
  
  public function __construct() {
    parent:: __construct();
  }
  
 public function insertar($ids_usuarios, $usuario_logueado) {
   
  $contar_aspirantes = count ( $ids_usuarios );
  $valor_positivo = 1;
  $stored_exc = null;
  try {
   
   for($i = 0; $i < $contar_aspirantes; $i ++) {
    
    $stmt = $this->db->conn_id->prepare ( "
              INSERT INTO 
                     tbmedicinageneralaspirante (
      
                          fkAspirante,
                          fkUsuario,
                          nCabezaCara,
                          nNariz,
                          nEstauraPeso,                 
                          nOidoGral,                          
                          nOjosGral,                          
                          nTensionArterial,                          
                          nMovilidadOcular,
                          nPulmones,
                          nCorazon,
                          nSisVascular,                          
                          nAbdomen,
                          nAnoRecto,
                          nSisEndocrino,
                          nGenitoUrinario,
                          nExtreSuperiores,
                          nExtreInferiores,
                          nPies,
                          nColumnaVertebral,
                          nCicatrices,
                          nPielFaneras,
                          nPecho,
                          nTemperatura,
                          nPelvis,
                          nVagina,
                          nRectal,
                          FechaMedicinaGeneral
               )
  				VALUES(
              ?,
              ?,
              ?,
              ?,
              ?,
              ?,
              ?,
              ?,
              ?,
              ?,
              ?,
              ?,
              ?,
              ?,
              ?,
              ?,
              ?,
              ?,
              ?,
              ?,
              ?,
              ?,
              ?,
              ?,
              ?,
              ?,
              ?,                                        
              CURDATE()
      
      )" );
    
    $stmt->bind_param ( 'iiiiiiiiiiiiiiiiiiiiiiiiiii', 
      $ids_usuarios [$i], 
      $usuario_logueado, 
      $valor_positivo, 
      $valor_positivo, 
      $valor_positivo, 
      $valor_positivo, 
      $valor_positivo, 
      $valor_positivo, 
      $valor_positivo, 
      $valor_positivo, 
      $valor_positivo, 
      $valor_positivo, 
      $valor_positivo, 
      $valor_positivo, 
      $valor_positivo, 
      $valor_positivo, 
      $valor_positivo, 
      $valor_positivo, 
      $valor_positivo, 
      $valor_positivo, 
      $valor_positivo, 
      $valor_positivo, 
      $valor_positivo, 
      $valor_positivo, 
      $valor_positivo, 
      $valor_positivo, 
      $valor_positivo 
      );

    
    $stmt->execute ();
    $stmt->close ();
    $r = true;
   }
   
  
  } catch ( Exception $ex ) {
   $stored_exc = $ex;
   print $ex;
   $r = false;
  }
  if ($stored_exc) {
  }
  
  return $r;
 }

 function listarContenidos()
 {
     $query = $this->db->get('contenido');
     return $query->row();
 }

 public function listarContenidos1() {

  $listadoContenido = array ();
  try {
   
    $stmt = $this->db->conn_id->prepare ( "
      	      SELECT
               acerca_nosotros,
               politica_privacidad,
               terminos_condiciones,
               introduccion,
               objetivo,
               contenido_1,
               contenido_2,
               contenido_3
              FROM contenido  
      " );
    $stmt->execute ();
    $stmt->bind_result ( $acerca_nosotros, 
    $politica_privacidad, 
    $terminos_condiciones,
    $introduccion,
    $objetivo, 
    $contenido_1,
    $contenido_2,
    $contenido_3);
    while ( $stmt->fetch () ) {
     $listadoAspirantes [] = array (
       'acerca_nosotros' => $acerca_nosotros,
       'politica_privacidad' => $politica_privacidad,
       'terminos_condiciones'=>$terminos_condiciones,
       'introduccion'=>$introduccion,
       'objetivo' => $objetivo,
       'contenido_1' => $contenido_1,
       'contenido_2' => $contenido_2,
       'contenido_3' => $contenido_3
     );
    }
   
   $stmt->close ();
  } catch ( Exception $ex ) {
   print $ex;
  }
  return $listadoContenido;
 }
 
}



