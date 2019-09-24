<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class hojaVidaCandidato extends CI_Controller {

	//public function costruct
    public function __construct() {
        parent:: __construct();
        $this->load->helper(array('url', 'form', 'array', 'html'));
      //  $this->load->model(array('ContenidoPrincipalModel',''));
    }
	public function index()
	{
		//$ContenidoPrincipal = new ContenidoPrincipalModel();
	
		//$data['contenido'] = $ContenidoPrincipal->listarContenidos();
		//print_r($data);
		$this->load->helper('url');
		$this->load->view('candidatos/header');
		$this->load->view('interno/nav');
		$this->load->view('candidatos/candidato_seleccion');
		$this->load->view('interno/footer');
	}
}
