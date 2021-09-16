<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_bahan_baku extends CI_Model{

	function list_bahan_baku(){
		 $query = $this->db->query("SELECT `bahan_baku`.*,
		 								   `barang`.*,
		 								   `satuan`.*
											FROM
  										   `bahan_baku`
  										    LEFT JOIN
  										   `barang` 
  										   	ON 
  										   `bahan_baku`.`id_barang` = `barang`.`id_barang`
  										   	LEFT JOIN
  										   `satuan`
  										   	ON
  										   `barang`.`id_satuan` = `satuan`.`id_satuan`
  										   	;");

      		return $query->result_array();

	}
	function list_barang(){

		 $query = $this->db->query("SELECT `barang`.*,
		 								   `satuan`.*
											FROM
  										   `barang` 
  										   	LEFT JOIN
  										   `satuan` 
  										   ON 
  										   `barang`.`id_satuan` = `satuan`.`id_satuan`;");

      		return $query->result_array();

	}

	function simpan($id_barang,$jumlah){
		 $data = array(
			'id_barang' => $id_barang,
			'jumlah' => $jumlah

		);
		$this->db->insert('bahan_baku',$data);

		

	}
	function delete($id_bahan_baku){
		$query = $this->db->query("DELETE FROM bahan_baku WHERE id_bahan_baku = '$id_bahan_baku'");
		return $query;
	}

}