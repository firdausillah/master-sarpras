<?php
 class StatusModel extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
 	
 	function get(){
		$this->db->select('*');
		return $this->db->get('tb_status');
 	}

 	function findBy($id){
 		$this->db->where($id);
 		return $this->db->get('tb_status');
 	}

 	function add($data){
 		return $this->db->insert('tb_status',$data);
 	}
 	
 	function update($id,$data){
 		$this->db->where($id);
 		return $this->db->update('tb_status',$data);
 	}

 	function delete($id){
 		$this->db->where($id);
 		return $this->db->delete('tb_status');
 	}
 }
