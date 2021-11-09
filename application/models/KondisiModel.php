<?php
 class KondisiModel extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
 	
 	function get(){
 		$this->db->select('*');
 		return $this->db->get('tb_kondisi');
 	}

 	function findBy($id){
 		$this->db->where($id);
 		return $this->db->get('tb_kondisi');
 	}

 	function add($data){
 		return $this->db->insert('tb_kondisi',$data);
 	}
 	
 	function update($id,$data){
 		$this->db->where($id);
 		return $this->db->update('tb_kondisi',$data);
 	}

 	function delete($id){
 		$this->db->where($id);
 		return $this->db->delete('tb_kondisi');
 	}
 }
