<?php 

/**
* 
*/
class Adopsi_model extends CI_Model
{

	public $nama_tb = 'adposi';
	public $id = 'kode_adopsi';
	public $order = 'ASC';
	
	function __construct()
	{
		parent::__construct();
	}

	function ambil_dataadopsi()
	{
		$this->db->order_by($this->id,$this->order);
		return $this->db->get($this->nama_tb)->result();
	}

	function tambah_data($data){
		return $this->db->insert($this->nama_tb,$data);
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

	function get_option()
	{
		$this->db->select('*');
		$this->db->from('adposi');
		$query=$this->db->get();
		return $query->result();
	}
}

 ?>