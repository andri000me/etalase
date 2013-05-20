<?php

class User extends CI_Controller {
	
	public function __construct(){
		parent::__construct();   

			//load model database user
			$this->load->model('user_model');
			$this->load->library('session');
		}
	
	public function index()
    {
        $data['judul'] = '';
        $this->load->view('template/head');
		$this->load->view('template/header_bar');
		$this->load->view('template/content_head');
		$this->load->view('login'); //view yang diganti
		$this->load->view('template/content_foot');
		$this->load->view('template/foot');    
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
        redirect('login');
    }

    function profil(){
    	$data['judul'] = '';
        $this->load->view('template/head');
		$this->load->view('template/header_bar');
		$this->load->view('template/content_head');
		$this->load->view('profil'); //view yang diganti
		$this->load->view('template/content_foot');
		$this->load->view('template/foot'); 
    }

	
}

?>