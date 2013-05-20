<?php

class User extends CI_Controller {
	
	public function __construct(){
		parent::__construct();   

			//load model database user
			$this->load->model('user_model');
			$this->load->library('session');
			$this->load->model('provinsi_model');
		}
	
	public function index()
    {
        $data['judul'] = '';
        $data['provinsi_model'] = "";
        foreach($this->provinsi_model->get_all_provinsi() as $prov){
        	$data['provinsi_model'] .= "<option value='$prov->id_provinsi'>$prov->nama_provinsi</option>";
        }

        $this->load->view('template/head');
		$this->load->view('template/header_bar');
		$this->load->view('template/content_head');
		$this->load->view('login', $data); //view yang diganti
		$this->load->view('template/content_foot');
		$this->load->view('template/foot');    
    }

	//DAFTAR
	function daftar()
    {
    	$data['provinsi_model'] = "";
        foreach($this->provinsi_model->get_all_provinsi() as $prov){
        	$data['provinsi_model'] .= "<option value='$prov->id_provinsi'>$prov->nama_provinsi</option>";
        }
        $data['judul'] = 'Insert Data User';
        $this->load->view('template/head');
		$this->load->view('template/header_bar');
		$this->load->view('template/content_head');
		$this->load->view('daftar', $data); //view yang diganti
		$this->load->view('template/content_foot');
		$this->load->view('template/foot');
    }
	

	//PROSES MEMASUKKAN USER
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
    	$data['provinsi_model'] = "";
        foreach($this->provinsi_model->get_all_provinsi() as $prov){
        	$data['provinsi_model'] .= "<option value='$prov->id_provinsi'>$prov->nama_provinsi</option>";
        }
        $this->load->view('template/head');
		$this->load->view('template/header_bar');
		$this->load->view('template/content_head');
		$this->load->view('profil', $data); //view yang diganti
		$this->load->view('template/content_foot');
		$this->load->view('template/foot'); 
    }

	
}

?>