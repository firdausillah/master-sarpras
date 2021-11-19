<?php
 class SarprasModel extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
 	
 	function get(){
		$this->db->select('tb_sarpras.id, tb_gedung.id as id_gedung, tb_ruang.id as id_ruang, id_barang, id_status, tb_sarpras.id_kondisi, nama_ruang, nama_barang, tb_status.status, kondisi, kode_sarpras, jumlah, tahun_masuk, tb_sarpras.foto, keterangan');
		$this->db->join('tb_ruang', 'tb_sarpras.id_ruang = tb_ruang.id');
		$this->db->join('tb_barang', 'tb_sarpras.id_barang = tb_barang.id');
		$this->db->join('tb_status', 'tb_sarpras.id_status = tb_status.id');
		$this->db->join('tb_kondisi', 'tb_sarpras.id_kondisi = tb_kondisi.id');
		$this->db->join('tb_gedung', 'tb_ruang.id_gedung = tb_gedung.id');
		$this->db->from('tb_sarpras');
		return $this->db->get();
 	}

 	function findBy($id){
		 $this->db->select('tb_sarpras.id, tb_gedung.id as id_gedung, tb_ruang.id as id_ruang, id_barang, id_status, tb_sarpras.id_kondisi, nama_ruang, nama_barang, tb_status.status, kondisi, kode_sarpras, jumlah, tahun_masuk, tb_sarpras.foto, keterangan');
		 $this->db->join('tb_ruang', 'tb_sarpras.id_ruang = tb_ruang.id');
		 $this->db->join('tb_barang', 'tb_sarpras.id_barang = tb_barang.id');
		 $this->db->join('tb_status', 'tb_sarpras.id_status = tb_status.id');
		 $this->db->join('tb_kondisi', 'tb_sarpras.id_kondisi = tb_kondisi.id');
		 $this->db->join('tb_gedung', 'tb_ruang.id_gedung = tb_gedung.id');
		 $this->db->from('tb_sarpras');
 		$this->db->where($id);
 		return $this->db->get();
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


	// additional
	public function cekUrut()
	{
		$query = $this->db->query("SELECT MAX(id) as urut_kode from tb_sarpras");
		$hasil = $query->row();
		// print_r($hasil->urut_kode); exit();
		return $hasil->urut_kode;
	}
 }
