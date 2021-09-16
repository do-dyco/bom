<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent:: __construct();

		if($this->session->userdata('status') != "login" OR $this->session->userdata('level') == 'kasir'){
      redirect(base_url("login"));
    } 
		$this->load->model('M_dashboard');
	}
	
	public function index()
	{
		$data['judul'] = 'Dashboard';

		$data['control'] = $this;

		$this->load->view('header');
		$this->load->view('v_dashboard',$data);
		$this->load->view('footer');

	}


	public function hitungbarang($id)
	{
		// $hasilok = $this->M_dashboard->list_dashboard($id);
		$query = $this->db->query("SELECT `produksi`.*,
                      DATE_FORMAT(`hasil_produksi`.tgl_cek, '%m') AS okok,
		 								   `hasil_produksi`.id_produksi,
                       SUM(hasil_produksi.result) AS bagus,
                       SUM(hasil_produksi.reject) AS jelek
											FROM
  										   `produksi` 
  										   LEFT JOIN
  										   `hasil_produksi` 
  										   ON 
  										   `produksi`.`id_produksi` = `hasil_produksi`.`id_produksi`
                          WHERE DATE_FORMAT(`hasil_produksi`.tgl_cek, '%m') = '$id'
                         ")->row();
		echo  $query->bagus;

	}

	public function hitungbarangreject($id)
	{
		// $hasilok = $this->M_dashboard->list_dashboard($id);
		$query = $this->db->query("SELECT `produksi`.*,
                      DATE_FORMAT(`hasil_produksi`.tgl_cek, '%m') AS okok,
		 								   `hasil_produksi`.id_produksi,
                       SUM(hasil_produksi.result) AS bagus,
                       SUM(hasil_produksi.reject) AS jelek
											FROM
  										   `produksi` 
  										   LEFT JOIN
  										   `hasil_produksi` 
  										   ON 
  										   `produksi`.`id_produksi` = `hasil_produksi`.`id_produksi`
                          WHERE DATE_FORMAT(`hasil_produksi`.tgl_cek, '%m') = '$id'
                         ")->row();
		echo  $query->jelek;

	}
}
