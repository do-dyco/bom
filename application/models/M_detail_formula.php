<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_detail_formula extends CI_Model{

	function list_detail_formula($id){
		 $query = $this->db->query("SELECT
											  `detail_formula`.*, 
											  `formula`.*, 
											  `barang`.*,
											  `satuan`.*
											FROM
											  `detail_formula` 
											  LEFT JOIN
											  `formula` 
											  ON 
											  `formula`.`id_formula` = `detail_formula`.`id_formula`
											  LEFT JOIN
											  `barang` 
											  ON 
											  `barang`.`id_barang` = `detail_formula`.`id_barang`
											  LEFT JOIN
											  `satuan` 
											  ON 
											  `satuan`.`id_satuan` = `detail_formula`.`id_satuan`
											  WHERE detail_formula.id_formula = '$id'");

      		return $query->result_array();

	}
	function list_barang(){
		 $query = $this->db->query("SELECT * FROM barang");

      		return $query->result_array();

	}

	function list_satuan(){
		 $query = $this->db->query("SELECT * FROM satuan");

      		return $query->result_array();


	}
	



	function simpan_detail_formula($id_formula,$id_barang,$jumlah_barang,$id_satuan){
		$data = array(
			'id_formula' => $id_formula,
			'id_barang' => $id_barang,
			'jumlah_barang' => $jumlah_barang,
			'id_satuan' => $id_satuan,

		);
		$this->db->insert('detail_formula',$data);
	}

	function edit_detail_formula($id_formula,$id_detail_formula,$id_barang,$jumlah_barang,$id_satuan){
		$data = array(
			'id_formula' => $id_formula,
			'id_barang' => $id_barang,
			'jumlah_barang' => $jumlah_barang,
			'id_satuan' => $id_satuan,

		);
		$this->db->where('id_detail_formula', $id_detail_formula);
		$this->db->update('detail_formula',$data);
	}

	function delete($id_detail_formula){
		$query = $this->db->query("DELETE FROM detail_formula WHERE id_detail_formula = '$id_detail_formula'");
		return $query;
	}

}