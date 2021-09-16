<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_user extends CI_Model{

	function list_user(){
		 $query = $this->db->query("SELECT * FROM users ORDER BY id_user DESC;");

      		return $query->result_array();



	}

	function simpan_user($fullname, $username, $password, $level){
		 $data = array(

			'fullname' => $fullname,
			'username' => $username,
			'password' => md5($password),
			'level' => $level,

		);
		$this->db->insert('users',$data);

	}

	function update($id_user, $fullname, $username, $password, $level){
		 $data = array(

			'fullname' => $fullname,
			'username' => $username,
			'password' => md5($password),
			'level' => $level,

		);
		$this->db->where('id_user',$id_user);
		$this->db->update('users',$data);

	}
	function delete($id_user){
		$query = $this->db->query("DELETE FROM users WHERE id_user = '$id_user'");
		return $query;
	}

	

}