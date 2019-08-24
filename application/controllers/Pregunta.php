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
		$this->load->view('headercontent');
		$this->load->view('navsesion');
		$this->load->view('pregunta/pregunta');
		$this->load->view('footersesion');
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
