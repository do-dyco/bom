<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_report_produksi extends CI_Model{

	function list_report_produksi(){
		 $query = $this->db->query("SELECT  `hasil_produksi`.*, 
                      `produksi`.*,
                      `formula`.*,
                      `kirim_produk`.*
                      FROM
                      `hasil_produksi`
                      LEFT JOIN
                      `produksi` ON
                      `hasil_produksi`.`id_produksi` =`produksi`.`id_produksi` 
                      LEFT JOIN 
                      formula ON
                      produksi.id_formula = formula.id_formula
                      LEFT JOIN
                      kirim_produk ON
                      kirim_produk.id_produksi = produksi.id_produksi
                      ORDER BY produksi.id_produksi DESC");

      		return $query->result_array();

	}

	function detail_report($tgl1, $tgl2){
		 $query = $this->db->query("SELECT  `hasil_produksi`.*, 
                      `produksi`.*,
                      `formula`.*,
                      `kirim_produk`.*
                      FROM
                      `hasil_produksi`
                      LEFT JOIN
                      `produksi` ON
                      `hasil_produksi`.`id_produksi` =`produksi`.`id_produksi` 
                      LEFT JOIN 
                      formula ON
                      produksi.id_formula = formula.id_formula
                      LEFT JOIN
                      kirim_produk ON
                      kirim_produk.id_produksi = produksi.id_produksi WHERE produksi.id_produksi
  										    BETWEEN '$tgl1' AND '$tgl2' ;");

      		return $query->result_array();

	}

  function report_produksi($tgl1,$tgl2){
     $query = $this->db->query("SELECT  `hasil_produksi`.*, 
                      `produksi`.*,
                      `formula`.*,
                      `kirim_produk`.*
                      FROM
                      `hasil_produksi`
                      LEFT JOIN
                      `produksi` ON
                      `hasil_produksi`.`id_produksi` =`produksi`.`id_produksi` 
                      LEFT JOIN 
                      formula ON
                      produksi.id_formula = formula.id_formula
                      LEFT JOIN
                      kirim_produk ON
                      kirim_produk.id_produksi = produksi.id_produksi WHERE hasil_produksi.tgl_cek
                          BETWEEN '$tgl1' AND '$tgl2' ;");

          return $query->result_array();

  }
	
}