<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahan_baku extends CI_Controller {

	function __construct(){
		parent:: __construct();

		if($this->session->userdata('status') != "login" OR $this->session->userdata('level') == 'kasir'){
      redirect(base_url("login"));
    } 
		$this->load->model('M_bahan_baku');
	}
	
	public function index()
	{
		$data['judul'] = 'Material Masuk';

		$data['list_bahan_baku'] = $this->M_bahan_baku->list_bahan_baku();
		$data['list_barang'] = $this->M_bahan_baku->list_barang();

		$this->load->view('header');
		$this->load->view('v_bahan_baku',$data);
		$this->load->view('footer');

	}

	function simpan(){
		$id_barang = $this->input->post('id_barang');
		$jumlah = $this->input->post('jumlah');

		$this->M_bahan_baku->simpan($id_barang,$jumlah);

		$cek = $this->db->query("SELECT stock FROM barang WHERE id_barang = $id_barang")->row();
		$total = $cek->stock + $jumlah ;

		$update = $this->db->query("UPDATE barang SET stock = $total WHERE id_barang = $id_barang ");

		redirect('bahan_baku'); 

	}

	function delete(){
		$id_bahan_baku = $this->input->post('id_bahan_baku');
		$id_barang = $this->input->post('id_barang');
		$jumlah = $this->input->post('jumlah');
		
		$cek = $this->db->query("SELECT stock FROM barang WHERE id_barang = $id_barang")->row();
		$total = $cek->stock-$jumlah ;

		$update = $this->db->query("UPDATE barang SET stock = $total WHERE id_barang = $id_barang ");

		$this->M_bahan_baku->delete($id_bahan_baku);

		

		redirect('bahan_baku'); 

	}
}
