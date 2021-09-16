<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_satuan extends CI_Model{

	function list_satuan(){
		 $query = $this->db->query("SELECT * FROM satuan ORDER BY id_satuan DESC");

      		return $query->result_array();

	}

	function simpan_satuan($satuan){
		$data = array(
			'satuan' => $satuan

		);
		$this->db->insert('satuan',$data);
	}

	function update($id_satuan,$satuan){
		$data = array(
			'satuan' => $satuan

		);
		$this->db->where('id_satuan',$id_satuan);
		$this->db->update('satuan',$data);
	}

	function delete($id_satuan){
		$query = $this->db->query("DELETE FROM satuan WHERE id_satuan = '$id_satuan'");
		return $query;
	}

}