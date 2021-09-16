<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_stock_produksi extends CI_Model{

	function list_stock(){
		 $query = $this->db->query("SELECT `stock_produk`.*,
		 								   `produksi`.*,
                       `formula`.*
											FROM
  										   `stock_produk` 
  										    LEFT JOIN
  										   `produksi`
  										    ON 
  										   `stock_produk`.`id_produksi` = `produksi`.`id_produksi`
                         LEFT JOIN
                         formula
                          ON
                          produksi.id_formula = formula.id_formula
                         ;");

      		return $query->result_array();

	}


}