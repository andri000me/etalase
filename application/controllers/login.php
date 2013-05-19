<?php
	class login extends CI_Controller{
		public function index(){
			$data['title'] = 'Iklan Etalase';
			//Menampilkan View
			$this->load->view('template/head', $data);
			$this->load->view('template/content_head', $data);
			$this->load->view('login', $data);
			$this->load->view('template/content_foot', $data);
			$this->load->view('template/foot', $data);
			}
	}
?>
