<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User');
    }

    public function index()
    {
		if($this->session->userdata('logined') && $this->session->userdata('logined') == true)
		{
			redirect('Welcome/home');
		}
		
		if(!$this->input->post())
		{
			$this->load->view('Welcome/home');
		}
		else
		{
			$chek=$this->User->cek(
				$this->input->post('username_member'),
				$this->input->post('password_member'));
			
			if (!empty($chek)) {
				$this->session->set_userdata('logined',true);
				$this->session->set_userdata('nama_member',$chek->nama_member);
				$this->session->set_userdata('username',$chek->username_member);
				redirect('Welcome/home');
			}else{
				redirect("Welcome/awalmember");
			}
		}
        
    } 
	
	public function logout()
    {
		$this->session->unset_userdata('logined');
		$this->session->unset_userdata('nama_member');
		
		redirect("Welcome/awalmember");
    } 

    public function logoutadmin()
    {
		$this->session->unset_userdata('logined');
		$this->session->unset_userdata('nama_admin');
		redirect("Welcome/awal");
    } 
}

/* End of file Workflows.php */
/* Location: ./application/controllers/Workflows.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-15 00:43:10 */
/* http://harviacode.com */