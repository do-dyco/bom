<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_produksi extends CI_Controller {

	function __construct(){
		parent:: __construct();

		if($this->session->userdata('status') != "login" OR $this->session->userdata('level') == 'kasir'){
      redirect(base_url("login"));
    } 
		$this->load->model('M_report_produksi');
	}
	
	public function index()
	{
		$data['judul'] = 'Report Produksi';

		$data['list_report_produksi'] = $this->M_report_produksi->list_report_produksi();

		$this->load->view('header');
		$this->load->view('v_report_produksi',$data);
		$this->load->view('footer');

	}

	function detail_report()
	{
		$data['judul'] = 'Report Produksi';
		$tgl1 = $this->input->post('tgl1'); 
        $tgl2 = $this->input->post('tgl2');
		$data['detail_report'] = $this->M_report_produksi->detail_report($tgl1,$tgl2);
		$data['list_report_produksi'] = $this->M_report_produksi->report_produksi($tgl1,$tgl2);

		
		$this->load->view('v_detail_report_produksi',$data);

	}

}
