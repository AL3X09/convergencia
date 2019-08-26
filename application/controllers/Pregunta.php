<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pregunta extends CI_Controller {

	//public function costruct
    public function __construct() {
        parent:: __construct();
        $this->load->helper(array('url', 'form', 'array', 'html'));
        $this->load->model(array('PreguntaModel', '',''));
    }

	public function index()
	{
		$this->load->view('header');
		$this->load->view('interno/nav');
		$this->load->view('preguntas/preguntas');
		$this->load->view('interno/footer');
	}

	public function listarPreguntas()
	{
		$result = $this->PreguntaModel->listarPreguntas();
		header('Content-type: application/json; charset=utf8');
		echo json_encode($result);
		
	}

	public function listarPreguntasXTema() 
	{
		$result = $this->PreguntaModel->listarPreguntasXTema();
		header('Content-type: application/json; charset=utf8');
		echo json_encode($result);
		
	}
}
