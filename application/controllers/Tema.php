<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tema extends CI_Controller {

	//public function costruct
    public function __construct() {
        parent:: __construct();
        $this->load->helper(array('url', 'form', 'array', 'html'));
        $this->load->model(array('TemaModel', '',''));
	}
	
	public function removeCache() {
		$this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
		$this->output->set_header('Pragma: no-cache');
	  }

	public function index()
	{
		$this->removeCache();
		//valido si no existe sesion
		if (!isset($_SESSION['usuario'])) {
			header('Location: ' . base_url() . 'Login');
		  }
		
		$data ['usuario']= (array)unserialize($_SESSION['usuario']);
		$this->load->view('header');
		$this->load->view('interno/nav');
		$this->load->view('temas/temas',$data);
		$this->load->view('interno/footer');
		
	}

	public function listarTemas()
	{
		$result = $this->TemaModel->listarTemas();
		header('Content-type: application/json; charset=utf8');
		echo json_encode($result);
	}

	//public function listarTemasXNombre(idsuer)
	public function listarTemasXNombre()
	{
		$result = $this->TemaModel->listarTemasXNombre();
		header('Content-type: application/json; charset=utf8');
		echo json_encode($result);
	}

	/*public function listarTemasXNombreXUsuario()
	{
		$fk_usuario = $_POST['pkusuario'];
		$result = $this->TemaModel->listarTemasXNombreXUsuario($fk_usuario);
		header('Content-type: application/json; charset=utf8');
		echo json_encode($result);
	}*/

	function insertar() {
		$Tbuario = new TemaModel();
		//print_r($_POST);
				
				if ($_POST['pkusuario'] != NULL) {
					foreach($_POST['checkTema'] as $key => $value)
					{
					if ($Tbuario->insertar($_POST['pkusuario'],$value)) {
						$mensaje = array(
						'msg' => 'Se alamceno la información de manera correcta.',
						'tipo' => 'success'
						);
					} else {
						$mensaje = array(
						'msg' => 'Hubo un error en la base de datos, por favor intente registrarse más tarde.',
						'tipo' => 'error'
						);
					}
					
				}
			}else {
			  $mensaje = array(
				'msg' => 'Se cerro la sesión de manera abrupta.',
				'tipo' => 'error'
			  );
			}
			
		header('Content-type: application/json; charset=utf8');
		echo json_encode($mensaje);
	}
	
}