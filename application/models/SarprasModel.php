<?php
 class SarprasModel extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
 	
 	function get(){
		$this->db->select('*');
		$this->db->from('tb_sarpras');
		return $this->db->get();
 	}

 	function findBy($id){
 		$this->db->where($id);
 		return $this->db->get('tb_sarpras');
 	}

 	function add($data){
 		return $this->db->insert('tb_sarpras',$data);
 	}
 	
 	function update($id,$data){
 		$this->db->where($id);
 		return $this->db->update('tb_sarpras',$data);
 	}

 	function delete($id){
 		$this->db->where($id);
 		return $this->db->delete('tb_sarpras');
 	}
 }
