<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tema extends CI_Controller {

	//public function costruct
    public function __construct() {
        parent:: __construct();
        $this->load->helper(array('url', 'form', 'array', 'html'));
        $this->load->model(array('TemaModel', '',''));
    }

	public function index()
	{
		$this->load->view('header');
		$this->load->view('interno/nav');
		$this->load->view('temas/temas');
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

	
}
