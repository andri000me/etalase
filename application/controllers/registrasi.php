<?php

class Registrasi extends CI_Controller {
	
	public function __construct(){
		parent::__construct();   

			//load model database user
			$this->load->model('user_model');
			$this->load->library('session');
		}
	
	public function index()
    {
        $data['judul'] = 'Web Portal › SIMATIK';
        $this->load->view('template/head');
		$this->load->view('template/header_bar');
		$this->load->view('template/content_head');
		$this->load->view('login'); //view yang diganti
		$this->load->view('template/content_foot');
		$this->load->view('template/foot');    
    }
 
    public function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->load->model('user_model');
		
		if ($this->user_model->cek_username_password($username,$password)) {
			//data untuk kebutuhan session
			$userdata = array('username'=>$username,
							  'LOGGED_IN'=>true);
			$this->session->set_userdata($userdata);
			$data['error']='eh error';
			$data['title'] = "etalase";
				
			//redirect('utama');

		} else {
			$data['error']='Tidak ada username atau password tersebut';
			$this->load->view('template/head');
			$this->load->view('template/header_bar');
			$this->load->view('template/content_head');
			$this->load->view('login'); //view yang diganti
			$this->load->view('template/content_foot');
			$this->load->view('template/foot');
		}
	}
	//daftar
	function daftar()
    {
        $data['judul'] = 'Insert Data User';
        $this->load->view('template/head');
		$this->load->view('template/header_bar');
		$this->load->view('template/content_head');
		$this->load->view('daftar'); //view yang diganti
		$this->load->view('template/content_foot');
		$this->load->view('template/foot');
    }
	
	function user_daftar()
    {   
		$this->load->model('user_model');
        $this->user_model->simpan_user();
        $data['notifikasi'] = 'Data berhasil disimpan';
        $data['judul']='Insert Data Berhasil';
        $this->load->view('notifikasi', $data);
    }

	
}

?>