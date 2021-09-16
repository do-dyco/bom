<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent:: __construct();

		if($this->session->userdata('status') != "login" OR $this->session->userdata('level') == 'kasir'){
      redirect(base_url("login"));
    } 
		$this->load->model('M_user');
	}
	
	public function index()
	{
		$data['judul'] = 'Data User';

		$data['list_user'] = $this->M_user->list_user();

		$this->load->view('header');
		$this->load->view('v_user',$data);
		$this->load->view('footer');

	}

	function simpan_user(){
		$fullname = $this->input->post('fullname');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');

		$this->M_user->simpan_user($fullname, $username, $password, $level);
		redirect('user');
	}
	function edit(){
		$id_user = $this->input->post('id_user');
		$fullname = $this->input->post('fullname');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');

		$this->M_user->update($id_user, $fullname, $username, $password, $level);
		redirect('user');
	}

	function delete(){
		$id_user = $this->input->post('id_user');

		$this->M_user->delete($id_user);
		redirect('user');
	}
}
