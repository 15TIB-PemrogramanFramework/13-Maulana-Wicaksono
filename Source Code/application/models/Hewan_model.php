<?php 

/**
* 
*/
class Hewan_model extends CI_Model
{

	public $nama_tb = 'hewan';
	public $id = 'kode_hewan';
	public $order = 'ASC';
	
	function __construct()
	{
		parent::__construct();
	}

	function ambil_datahewan()
	{
		$this->db->order_by($this->id,$this->order);
		return $this->db->get($this->nama_tb)->result();
	}

	function hapus_data($id)
	{
		$this->db->where($this->id,$id);
		return $this->db->delete($this->nama_tb);
	}

	function tambah_data($data)
	{
		return $this->db->insert($this->nama_tb,$data);
	}

	function edit_data($id,$data)
	{
		$this->db->where($this->id,$id);
		return $this->db->update($this->nama_tb,$data);
	}

	function get_option()
	{
		$this->db->select('*');
		$this->db->from('hewan');
		$query=$this->db->get();
		return $query->result();
	}
}

 ?>