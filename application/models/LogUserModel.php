<?php
class LogUserModel extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function get()
	{
		$this->db->select('*');
		$this->db->order_by('time', 'DESC');
		return $this->db->get('tb_log_user');
	}

	function findBy($id)
	{
		$this->db->where(['id' => $id]);
		return $this->db->get('tb_log_user');
	}

	function add($data)
	{
		return $this->db->insert('tb_log_user', $data);
	}

	function update($id, $data)
	{
		$this->db->where($id);
		return $this->db->update('tb_log_user', $data);
	}

	function delete($id)
	{
		$this->db->where($id);
		return $this->db->delete('tb_log_user');
	}

}
