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
		$this->load->view('headersesion');
		$this->load->view('navsesion');
		$this->load->view('login');
		$this->load->view('footersesion');
		
	}
}
