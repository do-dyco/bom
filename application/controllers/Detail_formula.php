<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_formula extends CI_Controller {

	function __construct(){
		parent:: __construct();

		if($this->session->userdata('status') != "login" OR $this->session->userdata('level') == 'kasir'){
      redirect(base_url("login"));
    } 
		$this->load->model('M_detail_formula');
	}
	
	public function index()
	{

		$id = $this->input->post('id_formula');
		$data['judul'] = 'Data Detail Formula';

		$data['list_detail_formula'] = $this->M_detail_formula->list_detail_formula();
		$data['list_barang'] = $this->M_detail_formula->list_barang();
		$data['list_satuan'] = $this->M_detail_formula->list_satuan();


		$this->load->view('header');
		$this->load->view('v_detail_formula',$data);
		$this->load->view('footer');

	}

	function data($id)
	{

		$data['id'] = $id;
		$data['judul'] = 'Data Detail Formula';

		$data['list_detail_formula'] = $this->M_detail_formula->list_detail_formula($id);
		$data['list_formula'] = $this->db->query("SELECT * FROM formula WHERE id_formula = '$id'")->result_array(); 
		$data['list_barang'] = $this->M_detail_formula->list_barang();
		$data['list_satuan'] = $this->M_detail_formula->list_satuan();


		$this->load->view('header');
		$this->load->view('v_detail_formula',$data);
		$this->load->view('footer');

	}

	function simpan_detail_formula(){
		

		$id_formula = $this->input->post('id_formula');
		$id_barang = $this->input->post('id_barang');
		$jumlah_barang = $this->input->post('jumlah_barang');
		$id_satuan = $this->input->post('id_satuan');

		$this->M_detail_formula->simpan_detail_formula($id_formula,$id_barang,$jumlah_barang,$id_satuan);
		redirect('detail_formula/data/'.$id_formula);
	}

	function edit_detail_formula(){
		
		$id_detail_formula = $this->input->post('id_detail_formula');
		$id_formula = $this->input->post('id_formula');
		$id_barang = $this->input->post('id_barang');
		$jumlah_barang = $this->input->post('jumlah_barang');
		$id_satuan = $this->input->post('id_satuan');

		$this->M_detail_formula->edit_detail_formula($id_detail_formula,$id_formula,$id_barang,$jumlah_barang,$id_satuan);
		redirect('detail_formula/data/'.$id_formula);
	}

	function delete_detail_formula(){
		$id_formula = $this->input->post('id_formula');
		$id_detail_formula = $this->input->post('id_detail_formula');

		$this->M_detail_formula->delete($id_detail_formula);
		redirect('detail_formula/data/'.$id_formula);
	}


}
