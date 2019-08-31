<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	//public function costruct
    public function __construct() {
        parent:: __construct();
        $this->load->helper(array('url', 'form', 'array', 'html'));
        $this->load->model(array('', '',''));
	}
	
	public function removeCache() {
		$this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
		$this->output->set_header('Pragma: no-cache');
	  }

	public function index()
	{
		$this->load->view('sesion/headersesion');
		$this->load->view('sesion/navsesion');
		$this->load->view('sesion/login');
		$this->load->view('sesion/footersesion');
		
	}

	public function acceder()
	{
		header('Location: ' . base_url() . 'Tema');
		
	}

	function cerrarSesion() {
		session_start();
		unset($_SESSION['usuario']);
		header("Location: " . base_url() . "Welcome");
	  }

	function registar() {
	  //$aspirante = new usu();
    //convierto los nombres y apellidos a minusculas
    $aspirante->Nombres = mb_strtolower($_POST['nombres'], 'UTF-8');
    $aspirante->Primer_Apellido = mb_strtolower($_POST['apellidos'], 'UTF-8');
    $aspirante->Correo = mb_strtolower($_POST['correo'], 'UTF-8');
    //$aspirante= array()
	$aspirante->fkNacionalidad = $_POST['fklocalidad'];
	$aspirante->Usuario = mb_strtolower($_POST['usuario'], 'UTF-8');
	$aspirante->Contrasenia = $_POST['contrasenia'];
    $aspirante->fKEstado = 'Activo';
    //cosulto el modelo nuevamente para ratificar que realmente el numero de isentificacion no se encuentre registrado
	$euser = $this->TbaspirantesModel->existeUsuario($aspirante->Usuario);
	$ecorreo = $this->TbaspirantesModel->existeUsuario($aspirante->Correo);
    if ($euser){ // si el numero de identifiacacion del aspirante ya existe no lo dejo insertar
      $mensaje = array(
          'msg' => 'El numero de identificación ya se encuentra inscrito para un proceso de incorporación.',
          'tipo' => 'error'
        );
    }else if($ecorreo) {
		$mensaje = array(
			'msg' => 'No cumple los requisitos para aplicar al proceso.',
			'tipo' => 'error'
		  );
	}// si el numero de identifiacacion del aspirante no existe permito la insercion
    //valido que todos los filtros necesarios tengan datos
	else{

			if ($_POST['nombres'] != NULL and $_POST['apellidos'] != NULL and $_POST['correo'] != NULL and $_POST['fklocalidad'] != NULL and $_POST['usuario'] != NULL and $_POST['contrasenia'] != NULL) {

			$this->TbaspirantesModel->insertar($aspirante);

		  }else {
			$mensaje = array(
			  'msg' => 'Debe seleccionar todos los filtros.',
			  'tipo' => 'error'
			);
		  }
	  }
    
    header('Content-type: application/json; charset=utf8');
    echo json_encode($mensaje);
  }
  
	
}
