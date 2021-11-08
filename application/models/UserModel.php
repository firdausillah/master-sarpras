<?php
 class UserModel extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
 	
 	function get(){
 		return $this->db->get('tb_user');
 	}

 	function findBy($id){
 		$this->db->where($id);
 		return $this->db->get('tb_user');
 	}

 	function add($data){
 		return $this->db->insert('tb_user',$data);
 	}
 	
 	function update($id,$data){
 		$this->db->where($id);
 		return $this->db->update('tb_user',$data);
 	}

 	function delete($id){
 		$this->db->where($id);
 		return $this->db->delete('tb_user');
 	}
 }
