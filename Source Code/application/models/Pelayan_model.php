<?php 

/**
* 
*/
class Pelayan_model extends CI_Model
{

	public $nama_tb = 'pelayan';
	public $id = 'id_pelayan';
	public $order = 'ASC';
	
	function __construct()
	{
		parent::__construct();
	}

	function ambil_datapelayan()
	{
		$this->db->order_by($this->id,$this->order);
		return $this->db->get($this->nama_tb)->result();
	}

	function hapus_data($id)
	{
		$this->db->where($this->id,$id);
		return $this->db->delete($this->nama_tb);
	}

	function edit_data($id,$data)
	{
		$this->db->where($this->id,$id);
		return $this->db->update($this->nama_tb,$data);
	}

	function ambil_data_id($id)
	{
		$this->db->where($this->id,$id);
		return $this->db->get($this->nama_tb)->row();
	}

	function get_option()
	{
		$this->db->select('*');
		$this->db->from('pelayan');
		$query=$this->db->get();
		return $query->result();
	}
}

 ?>