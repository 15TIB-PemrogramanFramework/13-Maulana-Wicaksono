<?php 

/**
* 
*/
class Titip_model extends CI_Model
{

	public $nama_tb = 'titip';
	public $id = 'kode_titip';
	public $order = 'ASC';
	
	function __construct()
	{
		parent::__construct();
	}

	function ambil_datatitip()
	{
		$this->db->order_by($this->id,$this->order);
		return $this->db->get($this->nama_tb)->result();
	}
	function regis($data){
		return $this->db->insert($this->nama_tb,$data);
	}
	function tambah_data($data){
		return $this->db->insert($this->nama_tb,$data);
	}
	function edit_data($id,$data)
	{
		$this->db->where($this->id,$id);
		return $this->db->update($this->nama_tb,$data);
	}
	function hapus_data($id)
	{
		$this->db->where($this->id,$id);
		return $this->db->delete($this->nama_tb);
	}
	
}

 ?>