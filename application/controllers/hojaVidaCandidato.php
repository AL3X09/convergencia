<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class hojaVidaCandidato extends CI_Controller {

	//public function costruct
    public function __construct() {
        parent:: __construct();
        $this->load->helper(array('url', 'form', 'array', 'html'));
      //  $this->load->model(array('ContenidoPrincipalModel',''));
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
}
