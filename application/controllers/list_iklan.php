<?php
	class list_iklan extends CI_Controller{
		public function index(){
			$data['title'] = 'Iklan Etalase';
			//Menampilkan View
			$this->load->view('template/head', $data);
			$this->load->view('template/content_head', $data);
			$this->load->view('list_iklan', $data);
			$this->load->view('template/content_foot', $data);
			$this->load->view('template/foot', $data);
			}
	}
?>
