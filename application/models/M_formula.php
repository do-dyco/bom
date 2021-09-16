<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_formula extends CI_Model{

	function list_formula(){
		 $query = $this->db->query("SELECT * FROM formula ORDER BY id_formula DESC");

      		return $query->result_array();

	}

	function simpan_formula($nama_formula){
		$data = array(
			'nama_formula' => $nama_formula

		);
		$this->db->insert('formula',$data);
	}

	function update($id_formula,$nama_formula){
		$data = array(
			'nama_formula' => $nama_formula

		);
		$this->db->where('id_formula',$id_formula);
		$this->db->update('formula',$data);
	}

	function delete($id_formula){
		$query = $this->db->query("DELETE FROM formula WHERE id_formula = '$id_formula'");
		return $query;
	}


}