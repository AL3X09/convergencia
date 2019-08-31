<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidato extends CI_Controller {

	//public function costruct
    public function __construct() {
        parent:: __construct();
        $this->load->helper(array('url', 'form', 'array', 'html'));
        $this->load->model(array('', '',''));
    }

	public function index()
	{
		$this->load->view('header');
		$this->load->view('interno/nav');
		$this->load->view('candidatos/candidato_seleccion');
		$this->load->view('interno/footer');
		
	}
}
