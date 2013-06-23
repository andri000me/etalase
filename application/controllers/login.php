<?php
	class login extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('user_model');
			$this->load->model('provinsi_model');
			$this->load->library('session');
			$this->load->model('kategori_model');
		}


		public function index(){
			//data buat search
	        $data['kategori_list_search'] = $this->kategori_model->get_all_kategori();
	        $data['provinsi_list_search'] = $this->provinsi_model->get_all_provinsi();

			$data['title'] = 'Iklan Etalase';
			//Menampilkan View
			$data['error']='';
			$this->load->view('template/head', $data);
			$this->load->view('template/header_bar_utama', $data);
			$this->load->view('template/content_head', $data);
			$this->load->view('template/search_bar', $data);
			$this->load->view('login', $data);
			$this->load->view('template/content_foot', $data);
			$this->load->view('template/foot', $data);
			}



	    public function proses_login(){
	    	//data buat search
	        $data['kategori_list_search'] = $this->kategori_model->get_all_kategori();
	        $data['provinsi_list_search'] = $this->provinsi_model->get_all_provinsi();
	    	
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			if ($this->user_model->cek_username_password($username,$password)) {

				$id_user = $this->user_model->get_id_by_username($username);

				//data untuk kebutuhan session
				$userdata = array('username'=>$username,
								  'LOGGED_IN'=>true,
								  'uid'=>$id_user);
				$this->session->set_userdata($userdata);
				$data['error']='';
				$data['title'] = "etalase";
				
				redirect("user/profil");
				
			} else {
				$data['error']='Tidak ada username atau password tersebut';
				$this->load->view('template/head', $data);
				$this->load->view('template/header_bar', $data);
				$this->load->view('template/content_head', $data);
				$this->load->view('template/search_bar', $data);
				$this->load->view('login', $data); //view yang diganti
				$this->load->view('template/content_foot', $data);
				$this->load->view('template/foot', $data);
			}
		}


	}



?>
