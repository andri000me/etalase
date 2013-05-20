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
	
	//EDIT USER
	
	function edit_profil(){
    	$data['title'] = "Edit_Profile";
			if ($this->session->userdata('LOGGED_IN')) {
				$this->load->model('user_model');
				$username = $this->session->userdata("username");
				$data['username'] = $username;
				
				$this->load->view('template/head');
				$this->load->view('template/header_bar');
				$this->load->view('template/content_head');
				$this->load->view('edit_profil',$data); //view yang diganti
				$this->load->view('template/content_foot');
				$this->load->view('template/foot');
				/*
				$username
				$nama_lengkap
				$alamat
				//$provinsi
				//$kabupaten
				$fb
				$yahoo
				$twitter
				$bio
				$tlp
				$pin_bb
				*/
			}else{
				redirect('etalase');
			}
    }
	
	function simpan_edit_profil(){
		if ($this->session->userdata('LOGGED_IN')) {
			$username = $this->session->userdata("username");

			$datauser = $this->user_model->select_user($username);

			$data['username'] = $username;
			
			//melakukan edit data
			$username = $this->input->post('username');
			$nama_lengkap = $this->input->post('nama_lengkap');
			$alamat = $this->input->post('alamat');
			//$provinsi  = $this->input->post('provinsi');
			//$kabupaten  = $this->input->post('kabupaten');
			$fb  = $this->input->post('fb');
			$yahoo = $this->input->post('yahoo');
			$twitter = $this->input->post('twitter');
			$bio = $this->input->post('bio');
			$tlp = $this->input->post('tlp');
			$pin_bb = $this->input->post('pin_bb');
		
			$this->user_model->update_profil($username, $nama_lengkap, $alamat, $fb, $yahoo, $twitter, $bio, $tlp, $pin_bb);
		}
	}
	
	function logout() {
			$this->session->sess_destroy();
			$this->load->view('template/head');
			$this->load->view('template/header_bar_utama');
			$this->load->view('template/content_head');
			$this->load->view('utama');	//view yang diganti
			$this->load->view('template/content_foot');
			$this->load->view('template/foot');
		}

	
}

?>