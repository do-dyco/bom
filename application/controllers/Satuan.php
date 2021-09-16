<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan extends CI_Controller {

	function __construct(){
		parent:: __construct();

		if($this->session->userdata('status') != "login" OR $this->session->userdata('level') == 'kasir'){
      redirect(base_url("login"));
    } 
		$this->load->model('M_satuan');
	}
	
	public function index()
	{
		$data['judul'] = 'Data Satuan';

		$data['list_satuan'] = $this->M_satuan->list_satuan();

		$this->load->view('header');
		$this->load->view('v_satuan',$data);
		$this->load->view('footer');

	}

	function simpan_satuan(){
		$satuan = $this->input->post('satuan');

		$this->M_satuan->simpan_satuan($satuan);
		redirect('satuan');
	}

	function edit_satuan(){
		$id_satuan = $this->input->post('id_satuan');
		$satuan = $this->input->post('satuan');

		$this->M_satuan->update($id_satuan,$satuan);
		redirect('satuan');
	}

	function delete(){
		$id_satuan = $this->input->post('id_satuan');

		$this->M_satuan->delete($id_satuan);
		redirect('satuan');
	}
}
