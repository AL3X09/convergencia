<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Municipio extends CI_Controller {
	
	//public function costruct
    public function __construct() {
        parent:: __construct();
        $this->load->helper(array('url', 'form', 'array', 'html'));
        $this->load->model(array('MunicipioModel',''));
    }
	public function index()
	{
		$Municipio = new MunicipioModel();
	
		$data['contenido'] = $Municipio->listarMunicipios();
		//print_r($data);
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('nav');
		$this->load->view('main',$data);
		$this->load->view('footer');
	}
}
