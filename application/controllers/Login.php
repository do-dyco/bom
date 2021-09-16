<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
public function __construct(){
		parent::__construct();
		$this->load->model('M_login');
	}
  
  
	public function index(){
		$this->load->view('v_login');
	}
	
  
  public function check(){
		$username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
		$where = array(
				'username' => $username,
				'password' => md5($password)
			);
		$cek = $this->M_login->cek_login("users",$where)->num_rows();
		if($cek > 0){
			
			$sess = $this->M_login->cek_login("users",$where)->row();
			$data_session = array(
				'id_user' => $sess->id_user,
				'fullname' => $sess->fullname,
				'username' => $sess->username,
				'level' => $sess->level,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
			redirect(base_url('dashboard'));
 
		}else{
			$url=base_url('login');
			echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
			  Username Atau Password Salah
			</div>');
			redirect($url);
		}
	}
  
	function logout(){
        $this->session->sess_destroy();
        $url=base_url('login');
        redirect($url);
    }
  
}