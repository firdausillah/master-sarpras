<?php
 class Jenis_saranaModel extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
 	
 	function get(){
		$this->db->select('*');
		return $this->db->get('tb_jenis_sarana');
 	}

 	function findBy($id){
 		$this->db->where($id);
 		return $this->db->get('tb_jenis_sarana');
 	}

 	function add($data){
 		return $this->db->insert('tb_jenis_sarana',$data);
 	}
 	
 	function update($id,$data){
 		$this->db->where($id);
 		return $this->db->update('tb_jenis_sarana',$data);
 	}

 	function delete($id){
 		$this->db->where($id);
 		return $this->db->delete('tb_jenis_sarana');
 	}
 }
