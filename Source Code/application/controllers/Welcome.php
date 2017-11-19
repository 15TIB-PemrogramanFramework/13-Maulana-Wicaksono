<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('Awal');
	}

	public function home()
	{
		$this->load->view('Home');
	}

	public function homeadmin()
	{
		$this->load->view('Homeadmin');
	}

	public function titip()
	{
		$this->load->view('Titip');
	}

	public function belanja()
	{
		$this->load->view('Belanja');
	}

	public function tentang()
	{
		$this->load->view('Tentang');
	}

	public function awal()
	{
		$this->load->view('Awal');
	}

	public function awalmember()
	{
		$this->load->view('Awalmember');
	}

	public function register()
	{
		$this->load->view('Register');
	}

	public function memberadmin()
	{
		$this->load->view('Memberadmin');
	}

	public function pelayan()
	{
		$this->load->view('Pelayanadmin');
	}

	public function titipadmin()
	{
		$this->load->view('Titipadmin');
	}
}
