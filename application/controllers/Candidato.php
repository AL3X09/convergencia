<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidato extends CI_Controller {

	//public function costruct
    public function __construct() {
        parent:: __construct();
        $this->load->helper(array('url', 'form', 'array', 'html'));
        $this->load->model(array('UsuarioModel','CandidatoModel'));
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
		
		$this->load->helper('url');
		$this->load->view('candidatos/header');
		$this->load->view('interno/nav');
		$this->load->view('candidatos/candidato_seleccion',$data);
		$this->load->view('interno/footer');
	}

	public function listarValCandidatoSeleccion()
	{
		$fk_usuario = $_POST['pkusuario'];
		$conser = $_POST['conser'];
		$data = $this->CandidatoModel->listarCandidatoSeleccion($fk_usuario,$conser);
		$result['total'] = array();
		$result['datos'] = array();
		$result['nombres'] = array();
		$cont=0;
		$porce=0;
		foreach ($data as $key => $value) {
			
				$cont+=$value->val;
			
		}
		array_push($result['total'],$cont);
		foreach ($data as $key => $value) {
			$porce=(($value->val*($cont*10))/100);
			array_push($result['datos'],$porce);
		
		}
		foreach ($data as $key => $value) {
			$nn=$value->nombres;
			array_push($result['nombres'],"$nn");
		
		}
		//array_push($result['datos'],$cont);
		header('Content-type: application/json; charset=utf8');
		echo json_encode($result);
	}

	public function listarCandidatoSeleccion()
	{
		$fk_usuario = $_POST['pkusuario'];
		$conser = $_POST['conser'];
		$data = $this->CandidatoModel->listarCandidatoSeleccion($fk_usuario,$conser);
		$result = array();
		$cont=0;
		foreach ($data as $key => $value) {
			
			if($value->val >= $cont){
				$cont=$value->val;
				array_push($result,$value);
			}
		}
		header('Content-type: application/json; charset=utf8');
		echo json_encode($result);
	}

	public function getCandidato()
	{
		$fk_candidato = $_POST['fk_candidato'];
		$result = $this->CandidatoModel->getCandidato($fk_candidato);
		header('Content-type: application/json; charset=utf8');
		echo json_encode($result);
	}

	
}
