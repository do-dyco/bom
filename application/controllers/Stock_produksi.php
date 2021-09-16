<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_produksi extends CI_Controller {

	function __construct(){
		parent:: __construct();

		if($this->session->userdata('status') != "login" OR $this->session->userdata('level') == 'kasir'){
      redirect(base_url("login"));
    } 
		$this->load->model('M_stock_produksi');
	}
	
	public function index()
	{
		$data['judul'] = 'Data Stock produksi';
		$data['control']= $this;
		$data['list_stock'] = $this->M_stock_produksi->list_stock() ;

		$this->load->view('header');
		$this->load->view('v_stock_produksi',$data);
		$this->load->view('footer');

	}

	function hitung($id){
		// $jumlah = "SELECT SUM(qty_produksi) as qty FROM produksi WHERE id_produksi = '$id'";
		// $hasil = $this->db->query($jumlah)->num_rows();
		$hasil1 = $this->db->query("SELECT SUM(qty_produksi) as qty_produksi FROM produksi WHERE id_formula = '$id'")->row();

		return $hasil1;
	}

}
