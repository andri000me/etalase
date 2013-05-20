<?php
	class login extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('user_model');
			$this->load->library('session');
		}


		public function index(){
			$data['title'] = 'Iklan Etalase';
			//Menampilkan View
			$this->load->view('template/head', $data);
			$this->load->view('template/content_head', $data);
			$this->load->view('login', $data);
			$this->load->view('template/content_foot', $data);
			$this->load->view('template/foot', $data);
			}



	    public function proses_login(){
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
				
				redirect("user/profil");
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


	}



?>
