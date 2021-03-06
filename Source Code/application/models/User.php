<?php 
/**
* 
*/
class User extends CI_Model
{
	public $nama_table='member';
	public $username='username_member';
	public $order='ASC';
	
	function __construct()
	{
		parent::__construct();
	}

	function cek($username,$pass)
	{
		$this->db->where('username_member',$username);
		$this->db->where('password_member',$pass);
		return $this->db->get($this->nama_table)->row();

	}

	function regis($data){
		return $this->db->insert($this->nama_table,$data);
	}

	function ambildata()
	{
		$this->db->order_by($this->username,$this->order);
		return $this->db->get($this->nama_table)->result();
	}
	function hapus_data($id)
	{
		$this->db->where($this->username,$id);
		return $this->db->delete($this->nama_table);
	}

	function edit_data($id,$data)
	{
		$this->db->where($this->username,$id);
		return $this->db->update($this->nama_table,$data);
	}

	function ambil_data_id($id)
	{
		$this->db->where($this->username,$id);
		return $this->db->get($this->nama_table)->row();
	}


}
 ?>