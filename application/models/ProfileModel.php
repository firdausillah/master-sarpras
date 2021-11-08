<?php
 class ProfileModel extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
 	
 	function get(){
 		return $this->db->get('tb_profile');
 	}

 	function findBy($id){
 		$this->db->where($id);
 		return $this->db->get('tb_profile');
 	}

 	function add($data){
 		return $this->db->insert('tb_profile',$data);
 	}
 	
 	function update($id,$data){
 		$this->db->where($id);
 		return $this->db->update('tb_profile',$data);
 	}

 	function delete($id){
 		$this->db->where($id);
 		return $this->db->delete('tb_profile');
 	}
 }
