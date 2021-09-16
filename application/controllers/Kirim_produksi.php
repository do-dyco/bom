<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kirim_produksi extends CI_Controller {

	function __construct(){
		parent:: __construct();

		if($this->session->userdata('status') != "login" OR $this->session->userdata('level') == 'kasir'){
      redirect(base_url("login"));
    } 
		$this->load->model('M_kirim_produksi');
	}
	
	public function index()
	{
		$data['judul'] = 'Data Kirim produksi';

		$data['list_kirim'] = $this->M_kirim_produksi->list_kirim();

		$data['list_produksi'] = $this->M_kirim_produksi->list_produksi();

		$this->load->view('header');
		$this->load->view('v_kirim_barang',$data);
		$this->load->view('footer');

	}

	function simpan(){
		$id_produksi = $this->input->post('id_produksi');
		$tanggal_kirim = $this->input->post('tanggal_kirim');
		$jumlah_kirim = $this->input->post('jumlah_kirim');

		$cek = $this->db->query("SELECT id_produksi, jumlah FROM stock_produk WHERE id_produksi = '$id_produksi' ")->row();
		$cek1 = $cek->id_produksi;
		$total = $cek->jumlah-$jumlah_kirim;

		if ($jumlah_kirim > $cek->jumlah) {
			echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
			  Stock kurang ! Silahkan hubungi bagian QC..
			</div>');

		redirect('kirim_produksi');
		}else{
		
		$update = $this->db->query("UPDATE stock_produk SET jumlah = $total WHERE id_produksi = '$id_produksi'");

		$this->M_kirim_produksi->simpan($id_produksi, $tanggal_kirim, $jumlah_kirim);
		redirect('kirim_produksi');
		}
	}

	function delete(){
		$id_kirim_produk = $this->input->post('id_kirim_produk');
		$id_produksi = $this->input->post('id_produksi');
		$tanggal_kirim = $this->input->post('tanggal_kirim');
		$jumlah_kirim = $this->input->post('jumlah_kirim');

		$cek = $this->db->query("SELECT id_produksi, jumlah FROM stock_produk WHERE id_produksi = '$id_produksi' ")->row();
		$cek1 = $cek->id_produksi;
		$total = $cek->jumlah+$jumlah_kirim;
		
		$update = $this->db->query("UPDATE stock_produk SET jumlah = $total WHERE id_produksi = '$id_produksi'");

		$this->M_kirim_produksi->delete($id_kirim_produk);
		redirect('kirim_produksi');
	}

	function get_data($id_produksi){
		$q = $this->db->query("SELECT * FROM stock_produk where id_produksi = '$id_produksi'")->row();

		echo json_encode($q);
	}

}
