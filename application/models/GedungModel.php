<?php
 class GedungModel extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
 	
 	function get(){
		$this->db->select('tb_gedung.id, nama_gedung, kode_gedung, panjang, lebar, tinggi, lantai, foto, kondisi');
		$this->db->from('tb_gedung');
		$this->db->join('tb_kondisi', 'tb_gedung.id_kondisi = tb_kondisi.id', 'left');
		return $this->db->get();
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
