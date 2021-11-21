<?php
 class RuangModel extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
 	
 	function get(){
		$this->db->select('tb_ruang.id, tb_ruang.id_gedung, tb_gedung.nama_gedung, kode_ruang, nama_ruang, tb_ruang.panjang, tb_ruang.lebar, tb_ruang.tinggi, tb_ruang.foto, kondisi');
		$this->db->from('tb_ruang');
		$this->db->join('tb_kondisi', 'tb_ruang.id_kondisi = tb_kondisi.id', 'left');
		$this->db->join('tb_gedung', 'tb_ruang.id_gedung = tb_gedung.id', 'left');
		return $this->db->get();
 	}

 	function findBy($id){
		$this->db->select('tb_ruang.id, tb_ruang.id_gedung, tb_gedung.nama_gedung, kode_ruang, nama_ruang, tb_ruang.panjang, tb_ruang.lebar, tb_ruang.tinggi, tb_ruang.foto, kondisi');
		$this->db->join('tb_gedung', 'tb_ruang.id_gedung = tb_gedung.id', 'left');
		$this->db->join('tb_kondisi', 'tb_ruang.id_kondisi = tb_kondisi.id', 'left');
		$this->db->from('tb_ruang');
 		$this->db->where($id);
 		return $this->db->get();
 	}

 	function add($data){
 		return $this->db->insert('tb_ruang',$data);
 	}
 	
 	function update($id,$data){
 		$this->db->where($id);
 		return $this->db->update('tb_ruang',$data);
 	}

 	function delete($id){
 		$this->db->where($id);
 		return $this->db->delete('tb_ruang');
 	}
 }
