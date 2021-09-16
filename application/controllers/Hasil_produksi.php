<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_produksi extends CI_Controller {

	function __construct(){
		parent:: __construct();

		if($this->session->userdata('status') != "login" OR $this->session->userdata('level') == 'kasir'){
      redirect(base_url("login"));
    } 
		$this->load->model('M_hasil_produksi');
	}
	
	public function index()
	{
		$data['judul'] = 'Hasil Produksi';

		$data['list_hasil_produksi'] = $this->M_hasil_produksi->list_hasil_produksi();
		$data['list_produksi'] = $this->M_hasil_produksi->list_produksi();

		$this->load->view('header');
		$this->load->view('v_hasil_produksi',$data);
		$this->load->view('footer');

	}

	function simpan_hasil(){
		$id_produksi =$this->input->post('id_produksi');
		$tgl_cek = $this->input->post('tgl_cek');
		$reject = $this->input->post('reject');
		$result = $this->input->post('result');

		$cek = $this->db->query("SELECT id_produksi,jumlah	 FROM stock_produk WHERE id_produksi = '$id_produksi'")->row();
		$cek1 = $cek->id_produksi;
		$total = $cek->jumlah+$result;
		
		if ($cek1 == $id_produksi){
			$this->db->query("UPDATE stock_produk set jumlah = $total WHERE id_produksi = $id_produksi ");

		}
		if ($cek1 != $id_produksi){
			$data = array(

			'id_produksi' => $id_produksi,
			'jumlah' => $result,

		);
		$this->db->insert('stock_produk',$data);
		}

		$this->M_hasil_produksi->simpan_hasil_produksi($id_produksi,$tgl_cek,$reject,$result);
		redirect('hasil_produksi');
	}

	function delete_hasil_produksi(){
		$id_hasil_produksi = $this->input->post('id_hasil_produksi');
		$id_produksi =$this->input->post('id_produksi');
		$tgl_cek = $this->input->post('tgl_cek');
		$reject = $this->input->post('reject');
		$result = $this->input->post('result');

		$cek = $this->db->query("SELECT id_produksi, jumlah FROM stock_produk WHERE id_produksi = '$id_produksi'")->row();
		$cek1 = $cek->id_produksi;
		$total = $cek->jumlah-$result;
		
		if ($cek1 == $id_produksi){
			$this->db->query("UPDATE stock_produk set jumlah = $total WHERE id_produksi = $id_produksi ");

		}

		$this->M_hasil_produksi->delete($id_hasil_produksi);
		redirect('hasil_produksi');
	}
	function get_data($id_produksi)
	{
		$q = $this->db->query("SELECT * FROM produksi where id_produksi = '$id_produksi'")->row();
		echo json_encode($q);
	}
}
