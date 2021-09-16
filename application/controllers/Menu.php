<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	function __construct(){
		parent:: __construct();

		if($this->session->userdata('status') != "login" OR $this->session->userdata('level') == 'kasir'){
      redirect(base_url("login"));
    } 
		$this->load->model('M_menu');
	}
	
	public function index()
	{
		$this->load->view('header');
		$this->load->view('footer');

	}
}
