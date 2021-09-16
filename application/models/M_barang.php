<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_barang extends CI_Model{

	function list_barang(){
		 $query = $this->db->query("SELECT `barang`.*,
		 								   `satuan`.*
											FROM
  										   `barang`
  										    LEFT JOIN
  										   `satuan` 
  										    ON
  										    `barang`.`id_satuan` = `satuan`.`id_satuan`
  										    ;");

      		return $query->result_array();



	}

	function list_satuan(){
		 $query = $this->db->query("SELECT * FROM satuan ORDER BY id_satuan DESC");

      		return $query->result_array();

	}

	function simpan_barang($kode_barang,$nama_barang,$id_satuan){
		$data = array(
			'kode_barang' => $kode_barang,
			'nama_barang' => $nama_barang,
			'stock' => 0,
			'id_satuan' => $id_satuan


		);
		$this->db->insert('barang',$data);
	}

	function update($id_barang,$kode_barang,$nama_barang,$id_satuan){
		$data = array(
			'kode_barang' => $kode_barang,
			'nama_barang' => $nama_barang,
			'stock' => 0,
			'id_satuan' => $id_satuan


		);
		$this->db->where('id_barang',$id_barang);
		$this->db->update('barang',$data);
	}

	function delete($id_barang){
		 $query = $this->db->query("DELETE FROM barang WHERE id_barang = '$id_barang'");
    return $query;
	}
}