<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}


	/* DISINI CUMA PREVIEW
	 */

	public function utama(){
		$this->load->view('template/head');
		$this->load->view('template/header_bar_utama');
		$this->load->view('template/content_head');
		$this->load->view('utama');	//view yang diganti
		$this->load->view('template/content_foot');
		$this->load->view('template/foot');
	}


	public function daftar(){
		$this->load->view('template/head');
		$this->load->view('template/header_bar');
		$this->load->view('template/content_head');
		$this->load->view('daftar'); //view yang diganti
		$this->load->view('template/content_foot');
		$this->load->view('template/foot');
	}

	public function edit_profil(){
		$this->load->view('template/head');
		$this->load->view('template/header_bar');
		$this->load->view('template/content_head');
		$this->load->view('edit_profil'); //view yang diganti
		$this->load->view('template/content_foot');
		$this->load->view('template/foot');
	}

	public function iklan(){
		$this->load->view('template/head');
		$this->load->view('template/header_bar');
		$this->load->view('template/content_head');
		$this->load->view('iklan'); //view yang diganti
		$this->load->view('template/content_foot');
		$this->load->view('template/foot');
	}

	public function list_iklan(){
		$this->load->view('template/head');
		$this->load->view('template/header_bar');
		$this->load->view('template/content_head');
		$this->load->view('list_iklan'); //view yang diganti
		$this->load->view('template/content_foot');
		$this->load->view('template/foot');
	}

	public function login(){
		$this->load->view('template/head');
		$this->load->view('template/header_bar');
		$this->load->view('template/content_head');
		$this->load->view('login'); //view yang diganti
		$this->load->view('template/content_foot');
		$this->load->view('template/foot');
	}

	public function pasang_iklan(){
		$this->load->view('template/head');
		$this->load->view('template/header_bar');
		$this->load->view('template/content_head');
		$this->load->view('pasang_iklan'); //view yang diganti
		$this->load->view('template/content_foot');
		$this->load->view('template/foot');
	}

	public function profil(){
		$this->load->view('template/head');
		$this->load->view('template/header_bar');
		$this->load->view('template/content_head');
		$this->load->view('profil'); //view yang diganti
		$this->load->view('template/content_foot');
		$this->load->view('template/foot');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */