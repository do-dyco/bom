<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class formula extends CI_Controller {

	function __construct(){
		parent:: __construct();

		if($this->session->userdata('status') != "login" OR $this->session->userdata('level') == 'kasir'){
      redirect(base_url("login"));
    } 
		$this->load->model('M_formula');
	}
	
	public function index()
	{
		$data['judul'] = 'Data Formula';

		$data['list_formula'] = $this->M_formula->list_formula();

		$this->load->view('header');
		$this->load->view('v_formula',$data);
		$this->load->view('footer');

	}

	function simpan_formula(){
		$nama_formula = $this->input->post('nama_formula');

		$cek = $this->db->query("SELECT nama_formula FROM formula WHERE nama_formula = '$nama_formula'")->row_array();
		$formula = $cek['nama_formula'];
		if ($nama_formula == $formula) {
				echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
			  Formula sudah ada ! silahkan input formula lain...
			</div>');
			redirect('formula');
			}
			if ($nama_formula != $formula) {
				$this->M_formula->simpan_formula($nama_formula);
				redirect('formula');
			}

		
	}

	function edit(){
		$id_formula = $this->input->post('id_formula');
		$nama_formula = $this->input->post('nama_formula');

		$this->M_formula->update($id_formula,$nama_formula);
		redirect('formula');
	}

	function delete(){
		$id_formula = $this->input->post('id_formula');

		$this->M_formula->delete($id_formula);
		redirect('formula');
	}
}
