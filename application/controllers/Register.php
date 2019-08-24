<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	//public function costruct
    public function __construct() {
        parent:: __construct();
        $this->load->helper(array('url', 'form', 'array', 'html'));
        $this->load->model(array('MunicipioModel', '',''));
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

	public function registrar()
	{
		header('Location: ' . base_url() . 'Tema');
	}
}
