<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	function __construct(){
		parent:: __construct();

		if($this->session->userdata('status') != "login" OR $this->session->userdata('level') == 'kasir'){
      redirect(base_url("login"));
    } 
		$this->load->model('M_barang');
	}
	
	public function index()
	{
		$data['judul'] = 'Data Barang';

		$data['list_barang'] = $this->M_barang->list_barang();
		$data['list_satuan'] = $this->M_barang->list_satuan();

		$this->load->view('header');
		$this->load->view('v_barang',$data);
		$this->load->view('footer');

	}

	function simpan_barang(){
		$kode_barang = $this->input->post('kode_barang');
		$nama_barang = $this->input->post('nama_barang');
		$id_satuan = $this->input->post('id_satuan');

		$this->M_barang->simpan_barang($kode_barang, $nama_barang, $id_satuan);
		redirect('barang');
	}

	function edit_barang(){
		$id_barang = $this->input->post('id_barang');
		$kode_barang = $this->input->post('kode_barang');
		$nama_barang = $this->input->post('nama_barang');
		$id_satuan = $this->input->post('id_satuan');

		$this->M_barang->update($id_barang, $kode_barang, $nama_barang, $id_satuan);
		redirect('barang');
	}

	function delete_barang(){
		$id_barang = $this->input->post('id_barang');

		$this->M_barang->delete($id_barang);
		redirect('barang');
	}
}
