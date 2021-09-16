<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_kirim_produksi extends CI_Model{

	function list_kirim(){
		 $query = $this->db->query("SELECT `kirim_produk`.*,
		 								   `produksi`.*, 
		 								   `formula`.*
		 									FROM 
		 								   `kirim_produk`
		 								   LEFT JOIN
		 								   `produksi`
		 								    ON
		 								    produksi.id_produksi = kirim_produk.id_produksi
		 									LEFT JOIN 
		 								   `formula` 
		 									ON 
		 								   `formula`.`id_formula` = `produksi`.`id_formula` ;");

      		return $query->result_array();

	}

	function list_produksi(){
		 $query = $this->db->query("SELECT `produksi`.*, 
		 	`formula`.*
		 	FROM `produksi` 
		 	LEFT JOIN `formula` 
		 	ON `formula`.`id_formula` = `produksi`.`id_formula` ;");

      		return $query->result_array();

	}

	function simpan($id_produksi,$tanggal_kirim,$jumlah_kirim){
		$data = array(
			'id_produksi' => $id_produksi,
			'tanggal_kirim' => $tanggal_kirim,
			'jumlah_kirim' => $jumlah_kirim

		);
		$this->db->insert('kirim_produk',$data);
	}

	function delete($id_kirim_produk){
		$query = $this->db->query("DELETE FROM kirim_produk WHERE id_kirim_produk = '$id_kirim_produk'");
		return $query;
	}

}