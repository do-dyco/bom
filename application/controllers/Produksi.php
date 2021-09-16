<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi extends CI_Controller {

	function __construct(){
		parent:: __construct();

		if($this->session->userdata('status') != "login" OR $this->session->userdata('level') == 'kasir'){
      redirect(base_url("login"));
    } 
		$this->load->model('M_produksi');
	}
	
	public function index()
	{
		$data['judul'] = 'Produksi';

		$data['list_produksi'] = $this->M_produksi->list_produksi();
		$data['list_formula'] = $this->M_produksi->list_formula();
		$data['invoice'] =  $this->M_produksi->get_kode();
		// $data['invoice'] = $this->db->query("SELECT MAX(id_produksi) as kd_produksi from produksi")->num_rows();

		$this->load->view('header');
		$this->load->view('v_produksi',$data);
		$this->load->view('footer');

	}

	function data($id_formula)
	{

		$data['id_formula'] = $id_formula;
		$data['judul'] = 'Data Detail Formula';


		$data['list_detail_formula'] = $this->M_produksi->list_detail_formula($id_formula);
		$data['list_barang'] = $this->M_produksi->list_barang();
		$data['list_satuan'] = $this->M_produksi->list_satuan();
        
		$this->load->view('header');
		$this->load->view('v_detail',$data);
		$this->load->view('footer');

	}

	function simpan_produksi(){
		$kode_produksi =$this->input->post('kode_produksi');
		$id_formula = $this->input->post('id_formula');
		$tanggal_produksi = $this->input->post('tanggal_produksi');
		$qty_produksi = $this->input->post('qty_produksi');

		$cek = $this->db->query("SELECT
									detail_formula.*,
									barang.*
									FROM
									detail_formula
									LEFT JOIN barang
									ON barang.id_barang=detail_formula.id_barang
									WHERE detail_formula.id_formula = '$id_formula'
								")->result();
		foreach($cek AS $ceks){
			$id_barang = $ceks->id_barang;
			$pakai = $ceks->jumlah_barang;
			$stock = $ceks->stock;

				$jumlah_potong = $pakai*$qty_produksi;
				$hitung = $stock-$jumlah_potong;
			if ($jumlah_potong > $stock) {
				echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
			  Stock kurang ! Silahkan hubungi bagian gudang..
			</div>');
			redirect('produksi');
			}else{
					$this->db->query("UPDATE barang SET
										stock = '$hitung'
										WHERE id_barang = '$id_barang'
						");
				}
		}
		$this->M_produksi->simpan_produksi($kode_produksi,$id_formula,$tanggal_produksi,$qty_produksi);
		redirect('produksi');
		



		// 	$cek = $this->db->query("SELECT `produksi`.*,
		// 					`formula`.*,
		// 					`detail_formula`.*,
		// 					`barang`.*
		// 					FROM
	 //  						`produksi` 
	 //  						LEFT JOIN
		// 					`formula` 
		// 					ON 
		// 					`produksi`.`id_formula` = `formula`.`id_formula` 
		// 					LEFT JOIN
	 //  						`detail_formula` 
	 //  						ON `produksi`.`id_formula` = `detail_formula`.`id_formula`
	 //  						LEFT JOIN
	 //  						`barang` ON `detail_formula`.`id_barang` = `barang`.`id_barang`
  // 						WHERE detail_formula.id_formula = '$id_formula';")->row();
			
		// $hitung = $cek->stock - $qty_produksi;
			
		// $update = $this->db->query("UPDATE barang 
		// 								   LEFT JOIN 
		// 								   detail_formula
		// 								   ON barang.id_barang = detail_formula.id_barang
		// 								   SET stock = '$hitung' ");

		
	}

	function delete(){
		$id_produksi = $this->input->post('id_produksi');
		$kode_produksi =$this->input->post('kode_produksi');
		$id_formula = $this->input->post('id_formula');
		$tanggal_produksi = $this->input->post('tanggal_produksi');
		$qty_produksi = $this->input->post('qty_produksi');

		$cek = $this->db->query("SELECT
									detail_formula.*,
									barang.*
									FROM
									detail_formula
									LEFT JOIN barang
									ON barang.id_barang=detail_formula.id_barang
									WHERE detail_formula.id_formula = '$id_formula'
								")->result();
		foreach($cek AS $ceks){
			$id_barang = $ceks->id_barang;
			$pakai = $ceks->jumlah_barang;
			$stock = $ceks->stock;

				$jumlah_potong = $pakai*$qty_produksi;
				$hitung = $stock+$jumlah_potong;
				
					$this->db->query("UPDATE barang SET
										stock = '$hitung'
										WHERE id_barang = '$id_barang'
						");
		}
		$this->M_produksi->delete($id_produksi);
		redirect('produksi');
	}
}
