<?php
 class BarangModel extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
 	
 	function get(){
		$this->db->select('*');
		return $this->db->get('tb_barang');
 	}

 	function findBy($id){
 		$this->db->where($id);
 		return $this->db->get('tb_barang');
 	}

 	function add($data){
 		return $this->db->insert('tb_barang',$data);
 	}
 	
 	function update($id,$data){
 		$this->db->where($id);
 		return $this->db->update('tb_barang',$data);
 	}

 	function delete($id){
 		$this->db->where($id);
 		return $this->db->delete('tb_barang');
 	}
 }
