<?php
 class GedungModel extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
 	
 	function get(){
 		return $this->db->get('tb_gedung');
 	}

 	function findBy($id){
 		$this->db->where($id);
 		return $this->db->get('tb_gedung');
 	}

 	function add($data){
 		return $this->db->insert('tb_gedung',$data);
 	}
 	
 	function update($id,$data){
 		$this->db->where($id);
 		return $this->db->update('tb_gedung',$data);
 	}

 	function delete($id){
 		$this->db->where($id);
 		return $this->db->delete('tb_gedung');
 	}
 }
