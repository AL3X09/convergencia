<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	//public function costruct
    public function __construct() {
        parent:: __construct();
        $this->load->helper(array('url', 'form', 'array', 'html'));
		$this->load->model(array('MunicipioModel', 'UsuarioModel',''));
	}
	
	public function index()
	{
		$Municipio = new MunicipioModel();
		$data['municipio'] = $Municipio->listarMunicipio();
		$this->load->view('sesion/headersesion');
		$this->load->view('sesion/navsesion');
		$this->load->view('sesion/register', $data);
		$this->load->view('sesion/footersesion');
		
	}

	function registrar() {
	  $Tbuario = new UsuarioModel();
	  //$Usuario= array();
	  //convierto los nombres y apellidos a minusculas
	  $Tbuario->Nombres = mb_strtolower($_POST['nombres'], 'UTF-8');
	  //var_dump($_POST['nombres']);
	  $Tbuario->Apellidos = mb_strtolower($_POST['apellidos'], 'UTF-8');
	  $Tbuario->Correo = mb_strtolower($_POST['correo'], 'UTF-8');
	  $Tbuario->Fklocalidad = $_POST['localidad'];
	  $Tbuario->Usuario = mb_strtolower($_POST['usuario'], 'UTF-8');
	  $Tbuario->Contrasenia = $_POST['password'];
	  $Tbuario->Estado = 'Activo';
	  $Tbuario->Imagen = 'Img/Avatar.jpg';
	  //cosulto el modelo nuevamente para ratificar que realmente el numero de isentificacion no se encuentre registrado
	  $existuser = $Tbuario->existeUsuario($Tbuario->Usuario);
	  $ecorreo = $Tbuario->existeCorreo($Tbuario->Correo);

	  if ($existuser){ // si el numero de identifiacacion del aspirante ya existe no lo dejo insertar
		$mensaje = array(
			'msg' => 'El Usuario ya se encuentra resgitrado.',
			'tipo' => 'error'
		  );
	  }else if($ecorreo) {
		  $mensaje = array(
			  'msg' => 'El Correo ya se encuentra registrado.',
			  'tipo' => 'error'
			);
	  }// si el numero de identifiacacion del aspirante no existe permito la insercion
	  //valido que todos los filtros necesarios tengan datos
	  else{
			  if ($_POST['nombres'] != NULL and $_POST['apellidos'] != NULL and $_POST['correo'] != NULL and $_POST['localidad'] != NULL and $_POST['usuario'] != NULL and $_POST['password'] != NULL) {
					if ($Tbuario->insertar($Tbuario)) {
						$mensaje = array(
						'msg' => 'Señor usuario su registro ha sido exitoso.',
						'tipo' => 'success'
						);
					} else {
						$mensaje = array(
						'msg' => 'Hubo un error en la base de datos, por favor intente registrarse más tarde.',
						'tipo' => 'error'
						);
					}
			}else {
			  $mensaje = array(
				'msg' => 'Debe seleccionar todos los filtros.',
				'tipo' => 'error'
			  );
			}
		}
	  
		$this->session->set_flashdata('success', $mensaje['msg']);
	  //$this->load->view('register');
	  //header('Content-type: application/json; charset=utf8');
	  //echo json_encode($mensaje);
	  $this->index();
	}
}
