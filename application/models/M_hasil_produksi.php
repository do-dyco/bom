<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_hasil_produksi extends CI_Model{

	function list_hasil_produksi(){
		 $query = $this->db->query("SELECT  `hasil_produksi`.*, 
		 									`produksi`.*,
		 									`formula`.*
											FROM
 											`hasil_produksi`
 											LEFT JOIN
 											`produksi` ON
 											`hasil_produksi`.`id_produksi` =`produksi`.`id_produksi` 
 											LEFT JOIN 
 											formula ON
 											produksi.id_formula = formula.id_formula
 											ORDER BY produksi.id_produksi DESC; ");

      		return $query->result_array();

	}
	function list_produksi(){
		 $query = $this->db->query("SELECT `produksi`.*,
		 									`formula`.*
		 									FROM
 											`produksi`
 											LEFT JOIN 
 											formula ON
 											produksi.id_formula = formula.id_formula
		 									;");

      		return $query->result_array();

	}

	function simpan_hasil_produksi($id_produksi,$tgl_cek,$reject,$result){
		 $data = array(

			'id_produksi' => $id_produksi,
			'tgl_cek' => $tgl_cek,
			'reject' => $reject,
			'result' => $result,

		);
		$this->db->insert('hasil_produksi',$data);

	}
	function delete($id_hasil_produksi){
		 $query = $this->db->query("DELETE FROM hasil_produksi WHERE id_hasil_produksi = '$id_hasil_produksi'");
    return $query;
	}

}