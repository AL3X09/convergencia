<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	//public function costruct
    public function __construct() {
        parent:: __construct();
        $this->load->helper(array('url', 'form', 'array', 'html'));
        $this->load->model(array('', '',''));
    }

	public function index()
	{
		$this->load->view('sesion/headersesion');
		$this->load->view('sesion/navsesion');
		$this->load->view('sesion/login');
		$this->load->view('sesion/footersesion');
		
	}

	public function acceder()
	{
		header('Location: ' . base_url() . 'Tema');
		
	}

	function cerrarSesion() {
		session_start();
		unset($_SESSION['usuario']);
		header("Location: " . base_url() . "Welcome");
	  }
	
}
