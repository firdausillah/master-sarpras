<?php
 class BarangModel extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
 	
 	function get(){
		$this->db->select('tb_barang.id, kode_barang, nama_barang, jenis_sarana, SUM(jumlah) as jumlah');
		$this->db->join('tb_jenis_sarana', 'tb_barang.id_jenis_sarana=tb_jenis_sarana.id');
		$this->db->join('tb_sarpras', 'tb_sarpras.id_barang=tb_barang.id', 'left');
		$this->db->group_by('tb_barang.id');
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
