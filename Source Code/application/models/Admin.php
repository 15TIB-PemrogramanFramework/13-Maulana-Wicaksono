<?php 
/**
* 
*/
class Admin extends CI_Model
{
	public $nama_table='admin';
	public $username='username_admin';
	public $order='ASC';
	
	function __construct()
	{
		parent::__construct();
	}

	function cekadmin($username,$pass)
	{
		$this->db->where('username_admin',$username);
		$this->db->where('password_admin',$pass);
		return $this->db->get($this->nama_table)->row();

	}

}
 ?>