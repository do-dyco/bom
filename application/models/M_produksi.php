<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_produksi extends CI_Model{

	function list_produksi(){
		 $query = $this->db->query("SELECT `produksi`.*, 
		 	`formula`.*
		 	FROM `produksi` 
		 	LEFT JOIN `formula` 
		 	ON `formula`.`id_formula` = `produksi`.`id_formula` ORDER BY produksi.id_produksi DESC");

      		return $query->result_array();

	}

       
    function get_kode(){
        $q = $this->db->query("SELECT MAX(RIGHT(kode_produksi,4)) AS kd_max FROM produksi");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        return $kd;
    }

	function list_formula(){
		 $query = $this->db->query("SELECT * FROM formula");

      		return $query->result_array();

	}

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

	function simpan_produksi($kode_produksi,$id_formula,$tanggal_produksi,$qty_produksi){
		 $data = array(

			'kode_produksi' => $kode_produksi,
			'id_formula' => $id_formula,
			'tanggal_produksi' => $tanggal_produksi,
			'qty_produksi' => $qty_produksi,

		);
		$this->db->insert('produksi',$data);
	}

	function delete($id_produksi){
		$query = $this->db->query("DELETE FROM produksi WHERE id_produksi = '$id_produksi'");
		return $query;
	}

}